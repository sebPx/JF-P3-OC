<?PHP
/*
Template:       Noxus
Theme URL:      https://noxus.fr
Author:         Sebastien P.
Author URL:     https://noxus.fr/creator
Description:    Noxus engine production ©
Contact:        contact@noxus.fr
Version:        1.0
License:        GNU General Public License v3 or later
License URI:    http://www.gnu.org/licenses/gpl-3.0.html
Text Domain:    Noxus ©
Mention légale: Textes codés et utilisés par Noxus engine © ayant droit d'auteur sur le contenu suivant.
*/

namespace src\site\model;
use \NxsFram\component\Model;
use \NxsFram\component\Tracker;
use \src\site\entity\EntityPost;
use \NxsFram\component\Entity;

class ModelPost extends Model{
		
	private $_tableName;
	private $_post;
	private $_tracker;

	public function __construct(){
		$this->MySQLConnect();
		$this->_tableName = "nxs_post";
		$this->_tracker = new Tracker("post");
	}

	public function setTable($entity){
		$table = array(
			':title'		=> $entity->getTitle(),
			':content'		=> $entity->getContent(),
			':author'		=> $entity->getAuthor(),
			':resume'		=> $entity->getResume(),
			':category'		=> $entity->getCategory(),
			':state'		=> $entity->getState(),
			':view'			=> $entity->getView(),
			':apply'		=> $entity->getApply(),
			':comment'		=> $entity->getComment(),
			':image'		=> $entity->getImage()
		);
		return $table;
	}

// Requete de récupération par type de posts
		public function add(Entity $entity ,$target){
			$this->_post = $target;
			$sql = 'INSERT INTO '.$this->_tableName.' (title,content,author,resume,category,type,state,view,date,modified,apply,comment,image) VALUES (:title,:content,:author,:resume,:category,"'.$target.'",:state,:view,NOW(),NOW(),:apply,:comment,:image)';
			$req = $this->_connect->prepare($sql);
			$inquire = $this->setTable($entity);
		
			$back=$req->execute($inquire) or die($connect->errorInfo());
			$req->closeCursor(); // Termine le traitement de la requête
			$type = ($target == 1 ) ? "article" : "page";
			$this->_tracker->setTarget($type);
			$this->count();

			$this->_tracker->log($_SESSION['user']['login'],'1001', $inquire[':title']);
			if ($inquire[':state'] == "true") { $this->_tracker->notification($_SESSION['user']['login'],'2001', $inquire[':title'], "3"); }
			return;
		}

		public function update(Entity $entity, $target){
			$sql = 'UPDATE '.$this->_tableName.' SET title = :title, content = :content, author = :author, resume = :resume, category = :category, state = :state, view = :view, modified = NOW() , apply = :apply , comment = :comment , image = :image WHERE id = '.$target;
			$req = $this->_connect->prepare($sql);
			$inquire = $this->setTable($entity);
		
			$back=$req->execute($inquire) or die($connect->errorInfo());
			$req->closeCursor(); // Termine le traitement de la requête	

			$this->_tracker->log($_SESSION['user']['login'],'1002', $inquire[':title']);
			if ($inquire[':state'] == "true") { $this->_tracker->notification($_SESSION['user']['login'],'2002', $inquire[':title'], "3"); }
			return;
		}

		public function delete($target){
			$sql = 'UPDATE '.$this->_tableName.' SET trash = 1, archive = 0 WHERE id ='.$target;
			$req = $this->execRequest($sql);

			$this->_tracker->setTarget("article");
			$this->_post = 1;
			$this->count();

			$this->_tracker->setTarget("page");
			$this->_post = 2;
			$this->count();

			$this->_tracker->log($_SESSION['user']['login'],'1003', $target);
			return;
		}

		public function erase($target){
			$sql = 'DELETE '.$this->_tableName.', nxs_comment FROM '.$this->_tableName.' LEFT JOIN nxs_comment ON ('.$this->_tableName.'.id = nxs_comment.post) WHERE '.$this->_tableName.'.id ='.$target;
			$req = $this->execRequest($sql);
			return;
		}

		public function restaure($target){
			$sql = 'UPDATE '.$this->_tableName.' SET trash = 0 WHERE id ='.$target;
			$req = $this->execRequest($sql);
			
			$this->_tracker->setTarget("aticle");
			$this->_post = 1;
			$this->count();

			$this->_tracker->setTarget("page");
			$this->_post = 2;
			$this->count();

			$this->_tracker->log($_SESSION['user']['login'],'1004', $target);
			return;
		}

		public function classify($target){
			$sql = 'UPDATE '.$this->_tableName.' SET archive = 1 WHERE id ='.$target;
			$req = $this->execRequest($sql);

			$this->_tracker->log($_SESSION['user']['login'],'1005', $target);
			return;
		}

		public function unClassify($target){
			$sql = 'UPDATE '.$this->_tableName.' SET archive = 0 WHERE id ='.$target;
			$req = $this->execRequest($sql);

			$this->_tracker->log($_SESSION['user']['login'],'1006', $target);
			return;
		}

		public function getAll($type){
			$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =0 AND archive =0 AND type ="'.$type.'"';
			$req = $this->execRequest($sql);
			$data = $this->getRequestData($req);
			return new EntityPost($data);
		}

		public function getBy($name, $target,$type){
			$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =0 AND '.$name.' = "'.$target.'" AND type ="'.$type.'"';
			$req = $this->execRequest($sql);
			$data = $this->getRequestData($req);
			return new EntityPost($data);
		}

		public function getTrashBy($name, $target,$type){
			$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =1 AND '.$name.' = "'.$target.'" AND type ="'.$type.'"';
			$req = $this->execRequest($sql);
			$data = $this->getRequestData($req);
			return new EntityPost($data);
		}

		public function getAllTrash($type){
			$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =1 AND type ="'.$type.'"';
			$req = $this->execRequest($sql);
			$data = $this->getRequestData($req);
			return new EntityPost($data);
		}

		public function getArchiveBy($name, $target, $type){
			$sql = 'SELECT * FROM '.$this->_tableName.' WHERE archive =1 AND '.$name.' = "'.$target.'" AND type ="'.$type.'"';
			$req = $this->execRequest($sql);
			$data = $this->getRequestData($req);
			return new EntityPost($data);
		}

		public function getAllArchive($type){
			$sql = 'SELECT * FROM '.$this->_tableName.' WHERE archive = 1  AND type ="'.$type.'"';
			$req = $this->execRequest($sql);
			$data = $this->getRequestData($req);
			return new EntityPost($data);
		}

		public function getLatest($nb){
			$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =0 AND type = 1 ORDER BY id DESC LIMIT '.$nb;
			$req = $this->execRequest($sql);
			$data = $this->getRequestData($req);
			return new EntityPost($data);
		}
		public function count(){
			$sql = 'SELECT COUNT(*) FROM '.$this->_tableName.' WHERE trash = 0 AND type = '.$this->_post;
			$req = $this->execRequest($sql);
			$data = $this->getRequestData($req);	
			
			$this->_tracker->stat($data['0']['COUNT(*)']);
			return;
		}	
}



