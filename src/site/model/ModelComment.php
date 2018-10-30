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
use \NxsFram\component\Entity;
use \NxsFram\component\Model;
use \src\site\entity\EntityComment;
use \NxsFram\component\Tracker;

class ModelComment extends Model{
	
	private $_tableName;
	private $_tracker;

// Constructeur et séquence de vérification	
	public function __construct(){
		$this->MySQLConnect();
		$this->_tableName = "nxs_comment";
		$this->_tracker = new Tracker("comment");
	}

	public function setTable($entity){
		$table = array(
			':postTitle'	=> $entity->getPostTitle(),
			':post'			=> $entity->getPost(),
			':comment'		=> $entity->getComment(),
			':author'		=> $entity->getAuthor(),
			':content'		=> $entity->getContent()
		);
		return $table;
	}

	public function add(Entity $entity, $target){
		$sql = 'INSERT INTO '.$this->_tableName.' (postTitle,author,content,post,comment) VALUES (:postTitle,:author,:content,:post,:comment)';
		$req = $this->_connect->prepare($sql);
		$inquire = $this->setTable($entity);
		
		$back=$req->execute($inquire) or die($connect->errorInfo());
		$req->closeCursor(); // Termine le traitement de la requête
		$this->count();	
		
		$this->_tracker->log($inquire[':author'],'1031', $inquire[':postTitle']);
		$this->_tracker->notification($inquire[':author'],'2031', $inquire[':postTitle'], "3");
		return;
	}

	public function update(Entity $post, $target){
		$sql = 'UPDATE '.$this->_tableName.' SET postTitle = :postTitle, author = :author, content = :content WHERE id = '.$target;
		$req = $this->_connect->prepare($sql);
		$inquire = $this->setTable($entity);
		
		$back=$req->execute($inquire) or die($connect->errorInfo());
		$req->closeCursor(); // Termine le traitement de la requête
		
		$this->_tracker->log($_SESSION['user']['login'],'1032', $inquire[':postTitle']);
		return;
	}
		
	public function delete($target){
		$sql = 'UPDATE '.$this->_tableName.' SET trash = 1 WHERE id ='.$target;
		$req = $this->execRequest($sql);
		$this->count();
		
		$this->_tracker->log($_SESSION['user']['login'],'1033', $target);
		return;
	}

	public function erase($target){
		$sql = 'DELETE FROM '.$this->_tableName.' WHERE id ='.$target;
		$req = $this->execRequest($sql);
		return;
	}

	public function restaure($target){
		$sql = 'UPDATE '.$this->_tableName.' SET trash = 0 WHERE id ='.$target;
		$req = $this->execRequest($sql);
		
		$this->_tracker->log($_SESSION['user']['login'],'1034', $target);
		return;
	}
	
	public function check($target){
		$sql = 'UPDATE '.$this->_tableName.' SET tracker = 1 WHERE id ='.$target;
		$req = $this->execRequest($sql);
		return;
	}
	
	public function unCheck($target){
		$sql = 'UPDATE '.$this->_tableName.' SET tracker = 0 WHERE id ='.$target;
		$req = $this->execRequest($sql);
		return;
	}

	public function approve($target){
		$sql = 'UPDATE '.$this->_tableName.' SET approve = 1 , reported = 0 WHERE id ='.$target;
		$req = $this->execRequest($sql);
		
		$this->_tracker->log($_SESSION['user']['login'],'1035', $target);
		return;
	}

	public function unApprove($target){
		$sql = 'UPDATE '.$this->_tableName.' SET approve = 0 WHERE id ='.$target;
		$req = $this->execRequest($sql);
		
		$this->_tracker->log($_SESSION['user']['login'],'1036', $target);
		return;
	}

	public function classify($target){
		$sql = 'UPDATE '.$this->_tableName.' SET archive = 1 WHERE id ='.$target;
		$req = $this->execRequest($sql);

		$this->_tracker->log($_SESSION['user']['login'],'1037', $target);
		return;
	}

	public function unClassify($target){
		$sql = 'UPDATE '.$this->_tableName.' SET archive = 0 WHERE id ='.$target;
		$req = $this->execRequest($sql);

		$this->_tracker->log($_SESSION['user']['login'],'1038', $target);
		return;
	}
	
	public function getAll($attribute){
		if ($attribute != "") {
			$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash = 0 AND archive = 0 AND post = '.$attribute;
		}else{
			$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash = 0 AND archive = 0';
		}
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityComment($data);
	}
	
	public function getTrashBy($name, $target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =1 AND '.$name.' = "'.$target.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityComment($data);
	}

	public function getAllTrash(){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =1';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityComment($data);
	}

	public function getArchiveBy($name, $target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE archive =1 AND '.$name.' = "'.$target.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityComment($data);
	}

	public function getAllArchive(){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE archive = 1 ';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityComment($data);
	}
	
	public function getLatest($nb){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash = 0 ORDER BY id DESC LIMIT '.$nb;
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityComment($data);
	}
	
	public function getBy($name, $target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =0 AND '.$name.' = "'.$target.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityComment($data);
	}

	public function up($target){
		$sql = 'UPDATE '.$this->_tableName.' SET up = up + 1 WHERE id = '.$target;
		$req = $this->execRequest($sql);
		return $out  = array(
			'content' => $this->getOddsById($target),
			'target'  => 'total-'.$target
		);
	}

	public function down($target){
		$sql = 'UPDATE '.$this->_tableName.' SET down = down + 1 WHERE id = '.$target;
		$req = $this->execRequest($sql);
		return $out  = array(
			'content' => $this->getOddsById($target),
			'target'  => 'total-'.$target
		);
	}

	public function report($target){
		$sql = 'UPDATE '.$this->_tableName.' SET reported = reported + 1 WHERE id = '.$target;
		$req = $this->execRequest($sql);
	
		$this->_tracker->log($_SESSION['user']['login'],'1039', $target);	
		return $out  = array(
			'content' => 'Ce commentaire à été signalé et fera l\'objet d\'un contrôle de la part d\'un modérateur trés prochainement.',
			'target'  => 'reported-'.$target
		);
	}

	public function getOddsById($target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE id = '.$target;
		$req = $this->_connect->prepare($sql);
		$req->execute() or die($connect->errorInfo());
		$back = $req->fetch();
		$req->closeCursor(); // Termine le traitement de la requête
		$odds = $back['up'] - $back['down'];
		return $odds;
	}
	
	public function isExist($author,$content){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash = 0 AND author = "'.$author.'" AND content = "'.$content.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);	
		
		$exists = (!empty($data)) ? true : false;
		return $exists;	
	}

	public function count(){
		$sql = 'SELECT COUNT(*) FROM '.$this->_tableName.' WHERE trash = 0 ';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);	
			
		$this->_tracker->stat($data['0']['COUNT(*)']);
		return;
	}

}