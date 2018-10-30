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
use \src\site\entity\EntityContact;
use \NxsFram\component\Tracker;

class ModelContact extends Model{
		
	private $_tableName;
	private $_tracker;

// Constructeur et séquence de vérification	
	public function __construct(){
		$this->MySQLConnect();
		$this->_tableName = "nxs_contact";
		$this->_tracker = new Tracker("contact");
	}

	public function setTable($entity){
		$table = array(
			':name'		=> $entity->getName(),
			':surname'	=> $entity->getSurname(),
			':email'	=> $entity->getEmail(),
			':note'		=> $entity->getNote()
		);
		return $table;
	}

	public function add(Entity $entity){
		$sql = 'INSERT INTO '.$this->_tableName.' (name,surname,email,note) VALUES (:name,:surname,:email,:note)';
		$req = $this->_connect->prepare($sql);
		$inquire = $this->setTable($entity);
		
		$back=$req->execute($inquire) or die($connect->errorInfo());
		$req->closeCursor(); // Termine le traitement de la requête
		$this->count();	
		
		$this->_tracker->log($_SESSION['user']['login'],'1051', $inquire[':name'].$inquire[':surname']);
		if ($inquire[':state'] == 'true') {
			$this->_tracker->notification($_SESSION['user']['login'],'2051', $inquire[':name'].$inquire[':surname'], "6");
		}
		return;
	}

	public function update(Entity $entity, $target){
		$sql = 'UPDATE '.$this->_tableName.' SET  name = :name, surname = :surname, email = :email, note = :note WHERE id = '.$target;
		$req = $this->_connect->prepare($sql);
		$inquire = $this->setTable($entity);
		
		$back=$req->execute($inquire) or die($connect->errorInfo());
		$req->closeCursor(); // Termine le traitement de la requête
		
		$this->_tracker->log($_SESSION['user']['login'],'1052', $inquire[':name'].$inquire[':surname']);
		return;
	}

	public function delete($target){
		$sql = 'UPDATE '.$this->_tableName.' SET trash = 1 WHERE id ='.$target;
		$req = $this->execRequest($sql);
		$this->count();

		$this->_tracker->log($_SESSION['user']['login'],'1053', $target);
		return;
	}

	public function restaure($target){
		$sql = 'UPDATE '.$this->_tableName.' SET trash = 0 WHERE id ='.$target;
		$req = $this->execRequest($sql);

		$this->_tracker->log($_SESSION['user']['login'],'1054', $target);
		return;
	}

	public function getAll(){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash = 0';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityContact($data);
	}
	
	public function getTrashBy($name, $target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =1 AND '.$name.' = "'.$target.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityContact($data);
	}

	public function getAllTrash(){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =1';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityContact($data);
	}

	public function getBy($name, $target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =0 AND '.$name.' = "'.$target.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityContact($data);
	}
	
	public function isExist($attribute){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash = 0 AND email = "'.$attribute.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		$req->closeCursor(); // Termine le traitement de la requête		
		
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