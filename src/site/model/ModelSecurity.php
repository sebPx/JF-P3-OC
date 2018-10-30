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
use \src\site\entity\entityPost;
use \NxsFram\component\Entity;

class ModelPost extends Model{
		
	private $_tableName;
	private $_post;

// Constructeur et séquence de vérification	
	public function __construct(){
		$this->MySQLConnect();
		$this->_tableName = "Nxs_post";
	}

// Requete de récupération par type de posts
		public function add(Entity $post ,$target){
			$sql = 'INSERT INTO '.$this->_tableName.' (title,content,author,resume,category,type,state,view,date,modified) VALUES (:title,:content,:author,:resume,:category,:type,:state,:view,NOW(),NOW())';
			$req = $this->_connect->prepare($sql);
			$back=$req->execute(array(
				':title'	=> $post->getTitle(),
				':content'	=> $post->getContent(),
				':author'	=> $post->getAuthor(),
				':resume'	=> $post->getResume(),
				':category'	=> $post->getCategory(),
				':type'		=> $target,
				':state'	=> $post->getState(),
				':view'		=> $post->getView()
			)) or die($connect->errorInfo());

			$req->closeCursor(); // Termine le traitement de la requête
		}

		public function delete($target){
			$sql = 'UPDATE '.$this->_tableName.' SET trash = 1 WHERE id ='.$target;
			$req = $this->execRequest($sql);

		}

		public function update(Entity $post, $target){
			$sql = 'UPDATE '.$this->_tableName.' SET title = :title, content = :content, author = :author, resume = :resume, category = :category, state = :state, view = :view, modified = NOW() WHERE id = '.$target;
			$req = $this->_connect->prepare($sql);
			$back=$req->execute(array(
				':title'	=> $post->getTitle(),
				':content'	=> $post->getContent(),
				':author'	=> $post->getAuthor(),
				':resume'	=> $post->getResume(),
				':category'	=> $post->getCategory(),
				':state'	=> $post->getState(),
				':view'		=> $post->getView()
			)) or die($connect->errorInfo());

			$req->closeCursor(); // Termine le traitement de la requête	
		}

		public function getByType($type){
			$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =0 AND type ="'.$type.'"';
			$req = $this->execRequest($sql);
			$data = $this->getRequestData($req);
			return new entityPost($data);
		}

		public function getByTitle($title){
			$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =0 AND title ="'.$title.'"';
			$req = $this->execRequest($sql);
			$data = $this->getRequestData($req);
			return new entityPost($data);
		}
		
		public function getById($id){
			$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =0 AND id = '.$id;
			$req = $this->execRequest($sql);
			$data = $this->getRequestData($req);
			return new entityPost($data);
		}

		public function getByCat($cat){
			$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =0 AND category = "'.$cat.'"';
			$req = $this->execRequest($sql);
			$data = $this->getRequestData($req);
			return new entityPost($data);
		}

		public function getLatest($nb){
			$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =0 AND type = 1 ORDER BY id DESC LIMIT '.$nb;
			$req = $this->execRequest($sql);
			$data = $this->getRequestData($req);
			return new entityPost($data);
		}

}



