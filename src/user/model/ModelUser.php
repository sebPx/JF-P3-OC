<?PHP
/*
	Template:       Noxus
	Theme URL:      https://noxus.fr
	name:         Sebastien P.
	name URL:     https://noxus.fr/creator
	Description:    Noxus engine production ©
	Contact:        contact@noxus.fr
	Version:        1.0
	License:        GNU General Public License v3 or later
	License URI:    http://www.gnu.org/licenses/gpl-3.0.html
	Text Domain:    Noxus ©
	Mention légale: Textes codés et utilisés par Noxus engine © ayant droit d'auteur sur le contenu suivant.
*/

namespace src\user\model;
use \NxsFram\component\Model;
use \NxsFram\component\Entity;
use \src\user\entity\EntityUser;
use \NxsFram\component\Tracker;

class ModelUser extends Model{
		
	private $_tableName;

	public function __construct(){
		$this->MySQLConnect();
		$this->_tableName = "nxs_user";
		$this->_tracker = new Tracker("user");
	}

	public function setTable($entity){
		$table = array(
			':login'		=> $entity->getLogin(),
			':email'		=> $entity->getEmail(),
			':level'		=> $entity->getLevel(),
			':pass'			=> $entity->getPass()
		);
		return $table;
	}

	public function add(Entity $entity){
		$sql = 'INSERT INTO '.$this->_tableName.' (login,email,level,date,pass) VALUES (:login,:email,:level,NOW(),:pass)';
		$req = $this->_connect->prepare($sql);
		$inquire = $this->setTable($entity);
		
		$back=$req->execute($inquire) or die($connect->errorInfo());
		$req->closeCursor(); // Termine le traitement de la requête
		$this->count();	
		
		$this->_tracker->log("noxus.fr",'3001', $inquire[':login']);
		$this->_tracker->notification("noxus.fr",'4001', $inquire[':login'], "3");
		return;
	}

	public function update(Entity $entity, $target){
		$sql = 'UPDATE '.$this->_tableName.' SET  login = :login,email = :email,level = :level,pass = :pass WHERE id = '.$target;
		$req = $this->_connect->prepare($sql);
		$inquire = $this->setTable($entity);
		
		$back=$req->execute($inquire) or die($connect->errorInfo());
		$req->closeCursor(); // Termine le traitement de la requête

		$this->_tracker->log($_SESSION['user']['login'],'3002', $inquire[':login']);
		return;
	}

	public function delete($target){
		$sql = 'UPDATE '.$this->_tableName.' SET trash = 1 WHERE id ='.$target;
		$req = $this->execRequest($sql);
		$this->count();
		
		$this->_tracker->log($_SESSION['user']['login'],'3003', $target);
		return;
	}

	public function restaure($target){
		$sql = 'UPDATE '.$this->_tableName.' SET trash = 0 WHERE id ='.$target;
		$req = $this->execRequest($sql);
		
		$this->_tracker->log($_SESSION['user']['login'],'3004', $target);
		return;
	}
	
	public function getAll(){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash = 0 AND level > 1';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityUser($data);
	}

	public function getAllUsers(){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash = 0 ';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityUser($data);
	}

	public function getTrashBy($name, $target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =1 AND '.$name.' = "'.$target.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityUser($data);
	}

	public function getAllTrash(){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =1';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityUser($data);
	}

	public function getBy($name, $target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =0 AND '.$name.' = "'.$target.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityUser($data);
	}

	public function getByAdmin(Entity $entity, $target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =0 AND level > 1 AND  login = "'.$target.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityUser($data);
	}

	public function getByUser(Entity $entity, $target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =0 AND level = 1 AND  login = "'.$target.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityUser($data);
	}

	public function getLatest($nb){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =0 ORDER BY id DESC LIMIT '.$nb;
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityUser($data);
	}
	
	public function isExist($attribute){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash = 0 AND login = "'.$attribute.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);	
		
		$exists = (!empty($data)) ? true : false;
		return $exists;
	}

	//A VERIFER FONCTIONNEMENT DE UPDATE ET LA RECEPTION DU TOKEN
	public function updateToken(Entity $entity, $token){
		$sql = 'UPDATE '.$this->_tableName.' SET token = "'.$token.'" WHERE trash = 0 AND id = '. $entity->getId();
		$req = $this->execRequest($sql);
	}

	public function getToken(Entity $entity){
		$sql = 'SELECT token FROM '.$this->_tableName.' WHERE trash = 0 AND id ='.$entity->getId();
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return $data;
	}

	public function count(){
		$sql = 'SELECT COUNT(*) FROM '.$this->_tableName.' WHERE trash = 0 ';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);	
			
		$this->_tracker->stat($data['0']['COUNT(*)']);
		return;
	}
}



