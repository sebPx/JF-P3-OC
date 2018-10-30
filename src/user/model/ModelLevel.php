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
use \src\user\entity\EntityLevel;
use \NxsFram\component\Tracker;

class ModelLevel extends Model{
		
	private $_tableName;

	public function __construct(){
		$this->MySQLConnect();
		$this->_tableName = "nxs_level";
		$this->_tracker = new Tracker("user");
	}

	public function setTable($entity){
		$table = array(
			':level'		=> $entity->getLevel(),
			':name'			=> $entity->getName(),
			':alt'			=> $entity->getAlt(),
			':color'		=> $entity->getColor(),
		);
		return $table;
	}

	public function add(Entity $entity){
		$sql = 'INSERT INTO '.$this->_tableName.' (level,name,alt,color) VALUES (:level,:name,:alt,:color)';
		$req = $this->_connect->prepare($sql);
		$inquire = $this->setTable($entity);
		
		$back=$req->execute($inquire) or die($connect->errorInfo());
		$req->closeCursor(); // Termine le traitement de la requête
		
		$this->_tracker->log($_SESSION['user']['login'],'3011', $inquire[':name']);
		$this->_tracker->notification("noxus.fr",'4011', $inquire[':name'], "3");
		return;
	}

	public function update(Entity $entity, $target){
		$sql = 'UPDATE '.$this->_tableName.' SET  level = :level, name = :name,alt = :alt,color = :color WHERE id = '.$target;
		$req = $this->_connect->prepare($sql);
		$inquire = $this->setTable($entity);
		
		$back=$req->execute($inquire) or die($connect->errorInfo());
		$req->closeCursor(); // Termine le traitement de la requête

		$this->_tracker->log($_SESSION['user']['login'],'3012', $inquire[':name']);
		return;
	}

	public function delete($target){
		$sql = 'UPDATE '.$this->_tableName.' SET trash = 1 WHERE id ='.$target;
		$req = $this->execRequest($sql);
		
		$this->_tracker->log($_SESSION['user']['login'],'3013', $target);
		return;
	}

	public function restaure($target){
		$sql = 'UPDATE '.$this->_tableName.' SET trash = 0 WHERE id ='.$target;
		$req = $this->execRequest($sql);
		
		$this->_tracker->log($_SESSION['user']['login'],'3014', $target);
		return;
	}
	
	public function getAll(){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash = 0';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityLevel($data);
	}

	public function getTrashBy($name, $target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =1 AND '.$name.' = "'.$target.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityLevel($data);
	}

	public function getAllTrash(){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =1';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityLevel($data);
	}

	public function getBy($name, $target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =0 AND '.$name.' = "'.$target.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityLevel($data);
	}
}



