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
use \src\site\entity\entityMailer;

class ModelMailer extends Model{
		
	private $_tableName;

// Constructeur et séquence de vérification	
	public function __construct(){
		$this->MySQLConnect();
		$this->_tableName = "nxs_mailer";
	}

	public function setTable($entity){
		$table = array(
			':email'	=> $entity->getEmail(),
			':name'		=> $entity->getName(),
			':smtp'		=> $entity->getSmtp(),
			':host'		=> $entity->getHost(),
			':port'		=> $entity->getPort(),
			':user'		=> $entity->getUser(),
			':pass'		=> $entity->getPass()
		);
		return $table;
	}

	public function add(Entity $entity){
		$sql = 'INSERT INTO '.$this->_tableName.' (email,name,smtp,host,port,user,pass) VALUES (:email,:name,:smtp,:host,:port,:user,:pass)';
		$req = $this->_connect->prepare($sql);
		$inquire = $this->setTable($entity);
		
		$back=$req->execute($inquire) or die($connect->errorInfo());
		$req->closeCursor(); // Termine le traitement de la requête
		return;
	}

	public function update(Entity $entity, $target){
		$sql = 'UPDATE '.$this->_tableName.' SET  email = :email, name = :name, smtp = :smtp, host = :host,port = :port,user = :user,pass = :pass WHERE id = '.$target;
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

	public function getAll(){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash = 0';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityMailer($data);
	}
	
	public function isExist(){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash = 0 AND id = 1';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		$req->closeCursor(); // Termine le traitement de la requête		
		
		$exists = (!empty($data)) ? true : false;
		return $exists;
	}
}