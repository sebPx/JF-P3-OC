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
use \src\site\entity\EntityCourier;
use \NxsFram\component\Tracker;

class ModelCourier extends Model{
		
	private $_tableName;
	private $_tracker;

// Constructeur et séquence de vérification	
	public function __construct(){
		$this->MySQLConnect();
		$this->_tableName = "nxs_courier";
		$this->_tracker = new Tracker("courier");
	}

	public function setTable($entity){
		$table = array(
			':name'			=> $entity->getName(),
			':surname'		=> $entity->getSurname(),
			':email'		=> $entity->getEmail(),
			':subject'		=> $entity->getSubject(),
			':content'		=> $entity->getContent()
		);
		return $table;
	}

	public function add(Entity $entity){
		$sql = 'INSERT INTO '.$this->_tableName.' (name,surname,email,subject,content) VALUES (:name,:surname,:email,:subject,:content)';
		$req = $this->_connect->prepare($sql);
		$inquire = $this->setTable($entity);
		
		$back=$req->execute($inquire) or die($connect->errorInfo());
		$req->closeCursor(); // Termine le traitement de la requête
		$this->count();	
		
		$this->_tracker->log($inquire[':name'],'1041', $inquire[':subject']);
		$this->_tracker->notification($inquire[':name'],'2041', $inquire[':subject'], "6");
		return;
	}

	public function delete($target){
		$sql = 'UPDATE '.$this->_tableName.' SET trash = 1 WHERE id ='.$target;
		$req = $this->execRequest($sql);
		$this->count();
		
		$this->_tracker->log($_SESSION['user']['login'],'1042', $target);
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
		
		$this->_tracker->log($_SESSION['user']['login'],'1043', $target);
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

		$this->_tracker->log($_SESSION['user']['login'],'1044', $target);
		return;
	}

	public function unClassify($target){
		$sql = 'UPDATE '.$this->_tableName.' SET archive = 0 WHERE id ='.$target;
		$req = $this->execRequest($sql);

		$this->_tracker->log($_SESSION['user']['login'],'1045', $target);
		return;
	}
	
	public function getAll(){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash = 0 AND archive = 0';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityCourier($data);
	}

	public function getTrashBy($name, $target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =1 AND '.$name.' = "'.$target.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityCourier($data);
	}

	public function getAllTrash(){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =1';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityCourier($data);
	}

	public function getArchiveBy($name, $target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE archive =1 AND '.$name.' = "'.$target.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityCourier($data);
	}

	public function getAllArchive(){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE archive = 1 ';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityCourier($data);
	}

	public function getBy($name, $target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =0 AND '.$name.' = "'.$target.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityCourier($data);
	}

	public function getLatest($nb){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =0 ORDER BY id DESC LIMIT '.$nb;
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityCourier($data);
	}

	public function count(){
		$sql = 'SELECT COUNT(*) FROM '.$this->_tableName.' WHERE trash = 0 ';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);	
			
		$this->_tracker->stat($data['0']['COUNT(*)']);
		return;
	}
}