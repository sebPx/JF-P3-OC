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
use \src\site\entity\entityLog;

class ModelLog extends Model{
		
	private $_tableName;

// Constructeur et séquence de vérification	
	public function __construct(){
		$this->MySQLConnect();
		$this->_tableName = "Nxs_logs";
	}

	public function addLog(Entity $log){
		$sql = 'INSERT INTO '.$this->_tableName.' (actor,object,action) VALUES (:actor,:object,:action)';
		$req = $this->_connect->prepare($sql);
		$back=$req->execute(array(
			':actor'	=> $log->getActor(),
			':object'	=> $log->getObject(),
			':action'	=> $log->getAction()
		)) or die($connect->errorInfo());

		$req->closeCursor(); // Termine le traitement de la requête
	}

	public function getAll(){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash = 0 ';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new entityLog($data);
	}

	public function getLatest($nb){
		$sql = 'SELECT * FROM '.$this->_tableName.' ORDER BY id DESC LIMIT '.$nb;
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new entityLog($data);
	}
}