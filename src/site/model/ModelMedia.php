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
use \src\site\entity\EntityMedia;
use \NxsFram\component\Tracker;

class ModelMedia extends Model{
		
	private $_tableName;
	private $_tracker;

// Constructeur et séquence de vérification	
	public function __construct(){
		$this->MySQLConnect();
		$this->_tableName = "nxs_media";
		$this->_tracker = new Tracker("media");
	}

	public function setTable($entity){
		$table = array(
			':alt'	=> $entity->getAlt()
		);
		return $table;
	}

	public function add(Entity $entity){
		$var = $_FILES["uploadCase"]["name"];
		$sql = 'INSERT INTO '.$this->_tableName.' (name,alt) VALUES ("'.$var.'",:alt)';
		$req = $this->_connect->prepare($sql);
		$inquire = $this->setTable($entity);
		
		$back=$req->execute($inquire) or die($connect->errorInfo());
		$req->closeCursor(); // Termine le traitement de la requête
		$this->count();	
		
		$this->_tracker->log($_SESSION['user']['login'],'1021', $var);
		if ($inquire['state'] == 1) {
			$this->_tracker->notification($_SESSION['user']['login'],'2021', $var, "6");
		}
		return;
	}

	public function update(Entity $entity, $target){
		$sql = 'UPDATE '.$this->_tableName.' SET alt = :alt  WHERE id = '.$target;
		$req = $this->_connect->prepare($sql);
		$inquire = $this->setTable($entity);
		
		$back=$req->execute($inquire) or die($connect->errorInfo());
		$req->closeCursor(); // Termine le traitement de la requête
		
		$this->_tracker->log($_SESSION['user']['login'],'1022',  $entity->getName());
		return;
	}

	public function delete($target){
		$sql = 'UPDATE '.$this->_tableName.' SET trash = 1 WHERE id ='.$target;
		$req = $this->execRequest($sql);
		$this->count();
		
		$this->_tracker->log($_SESSION['user']['login'],'1023', $target);
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
		
		$this->_tracker->log($_SESSION['user']['login'],'1024', $target);
		return;
	}

	public function getAll(){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash = 0 ';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityMedia($data);
	}

	public function getTrashBy($name, $target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =1 AND '.$name.' = "'.$target.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityMedia($data);
	}

	public function getAllTrash(){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash = 1';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityMedia($data);
	}
	
	public function getBy($name, $target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =0 AND '.$name.' = "'.$target.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityMedia($data);
	}

	public function getLatest($nb){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =0 ORDER BY id DESC LIMIT '.$nb;
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityMedia($data);
	}


	public function isExist($attribute){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash = 0 AND name = "'.$attribute.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);	
		
		$exists = (!empty($data)) ? "true" : "false";
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