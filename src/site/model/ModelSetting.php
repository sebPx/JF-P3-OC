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
use \src\site\entity\entityComment;

class ModelComment extends Model{
		
	private $_tableName;

// Constructeur et séquence de vérification	
	public function __construct(){
		$this->MySQLConnect();
		$this->_tableName = "Nxs_comment";
	}

	public function addComment(Entity $comment){
		$sql = 'INSERT INTO '.$this->_tableName.' (author,content,post) VALUES (:author,:content,:post)';
		$req = $this->_connect->prepare($sql);
		$back=$req->execute(array(
			':author'	=> $comment->getAuthor(),
			':content'	=> $comment->getContent(),
			':post'		=> $comment->getPost()
		)) or die($connect->errorInfo());

		$req->closeCursor(); // Termine le traitement de la requête
	}

	public function updateByCell($column ,$idCom){
		$sql = 'UPDATE '.$this->_tableName.' SET '.$column.' = '.$column.' + 1 WHERE id = '.$idCom;
		$req = $this->execRequest($sql);
		if ($column == "up" || $column == "down") {
			$out = $this->getOddsById($idCom);
		}else{
			$out = "reported";
		}
		return $out;
	}

	public function getByPost($id){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash = 0 AND post = '.$id;
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new entityComment($data);
	}

	public function getOddsById($idCom){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE id = '.$idCom;
		$req = $this->_connect->prepare($sql);
		$req->execute() or die($connect->errorInfo());
		$back = $req->fetch();
		$req->closeCursor(); // Termine le traitement de la requête
		$odds = $back['up'] - $back['down'];
		return $odds;
	}
	
	public function isExist($author,$content){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash = 0 AND author = "'.$author.'" AND content = "'.$content.'"';
		$req = $this->_connect->prepare($sql);
		$req->execute() or die($bdd->errorInfo());
		$back = $req->fetch();
		
		if (!empty($back)){ 
			return TRUE; 
		}else{ 
			return FALSE; 
		}

		$req->closeCursor(); // Termine le traitement de la requête
	}
}