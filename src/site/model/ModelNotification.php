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
use \src\site\entity\EntityNotification;
use \NxsFram\component\Tracker;

class ModelNotification extends Model{
		
	private $_tableName;

// Constructeur et séquence de vérification	
	public function __construct(){
		$this->MySQLConnect();
		$this->_tableName = "nxs_notification";
		$this->_tracker = new Tracker("notification");
	}

	public function setTable($entity){
		$table = array(
			':subject'		=> $entity->getSubject(),
			':sender'		=> $entity->getSender(),
			':content'		=> $entity->getContent(),
			':receiver'		=> $entity->getReceiver()
		);
		return $table;
	}

	public function add(Entity $entity){
		$sql = 'INSERT INTO '.$this->_tableName.' (subject,sender,content,receiver) VALUES (:subject,:sender,:content,:receiver)';
		$req = $this->_connect->prepare($sql);
		$inquire = $this->setTable($entity);
		
		$back=$req->execute($inquire) or die($connect->errorInfo());
		$req->closeCursor(); // Termine le traitement de la requête
		return;
	}

	public function delete($target){
		$sql = 'UPDATE '.$this->_tableName.' SET trash = 1 WHERE id ='.$target;
		$req = $this->execRequest($sql);
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

	public function classify($target){
		$sql = 'UPDATE '.$this->_tableName.' SET archive = 1 WHERE id ='.$target;
		$req = $this->execRequest($sql);

		$this->_tracker->log($_SESSION['user']['login'],'1091', $target);
		return;
	}

	public function unClassify($target){
		$sql = 'UPDATE '.$this->_tableName.' SET archive = 0 WHERE id ='.$target;
		$req = $this->execRequest($sql);

		$this->_tracker->log($_SESSION['user']['login'],'1092', $target);
		return;
	}

	public function getAll(){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash = 0 AND archive = 0';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityNotification($data);
	}

	public function getTrashBy($name, $target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =1 AND '.$name.' = "'.$target.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityNotification($data);
	}

	public function getAllTrash(){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =1';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityNotification($data);
	}

	public function getArchiveBy($name, $target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE archive =1 AND '.$name.' = "'.$target.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityNotification($data);
	}

	public function getAllArchive(){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE archive = 1 ';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityNotification($data);
	}

	public function getBy($name, $target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =0 AND '.$name.' = "'.$target.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityNotification($data);
	}

	public function getLatest($nb){
		$sql = 'SELECT * FROM '.$this->_tableName.' ORDER BY id DESC LIMIT '.$nb;
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityNotification($data); 
	}
	
}