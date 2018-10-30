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
use \NxsFram\component\Entity;
use \src\site\entity\EntityNavigation;
use \NxsFram\component\Tracker;

class ModelNavigation extends Model{
		
	private $_tableName;
	private $_tracker;

// Constructeur et séquence de vérification	
	public function __construct(){
		$this->MySQLConnect();
		$this->_tableName = "nxs_navigation";
		$this->_tracker = new Tracker("navigation");
	}

	public function setTable($entity){
		$table = array(
			':alt'		=> $entity->getAlt(),
			':nav'		=> $entity->getNav()
		);
		return $table;
	}

	public function add(Entity $entity){
		$links = $_POST;
		$i = 0;
		
		while ($i < $links['count']) {
			$sql = 'INSERT INTO '.$this->_tableName.' (alt,nav,url,link,name) VALUES (:alt,:nav,"'.$links['url-'.$i].'","'.$links['link-'.$i].'","'.$links['name-'.$i].'")';
			$req = $this->_connect->prepare($sql);
			$inquire = $this->setTable($entity);

			$back=$req->execute($inquire) or die($connect->errorInfo());
			$req->closeCursor(); // Termine le traitement de la requête
			
			$i ++;
		}
				
		$this->_tracker->log($_SESSION['user']['login'],'1071', $inquire[':alt']);
		$this->_tracker->notification($_SESSION['user']['login'],'2071', $inquire[':alt'], "6");
		return;
	}

	public function update(Entity $entity, $target){
		$links = $_POST;
		$i = 0;

		$sql1 = 'DELETE FROM '.$this->_tableName.' WHERE nav = "'.$links['nav'].'"';
		$req = $this->execRequest($sql1);
		
		while ($i < $links['count']) {
			$sql = 'INSERT INTO '.$this->_tableName.' (alt,nav,url,link,name) VALUES (:alt,:nav,"'.$links['url-'.$i].'","'.$links['link-'.$i].'","'.$links['name-'.$i].'")';
			$req = $this->_connect->prepare($sql);
			$inquire = $this->setTable($entity);

			$back=$req->execute($inquire) or die($connect->errorInfo());
			$req->closeCursor(); // Termine le traitement de la requête
			
			$i ++;
		}

		$this->_tracker->log($_SESSION['user']['login'],'1072', $target);
		return;
	}

	public function delete($target){
		$sql = 'UPDATE '.$this->_tableName.' SET trash = 1 WHERE nav ="'.$target.'"';
		$req = $this->execRequest($sql);
		
		$this->_tracker->log($_SESSION['user']['login'],'1073', $target);
		return;
	}

	public function restaure($target){
		$sql = 'UPDATE '.$this->_tableName.' SET trash = 0 WHERE nav = "'.$target.'"';
		$req = $this->execRequest($sql);
		
		$this->_tracker->log($_SESSION['user']['login'],'1074', $target);
		return;
	}

	public function erase($target){
		$sql = 'DELETE FROM '.$this->_tableName.' WHERE id ='.$target;
		$req = $this->execRequest($sql);
		return;
	}

	public function getAll(){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash = 0';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		
		$sql2 ='SELECT DISTINCT nav FROM '.$this->_tableName.' WHERE trash = 0';
		$req2 = $this->execRequest($sql2);
		$data2 = $this->getRequestData($req2);

		$sql3 ='SELECT DISTINCT alt FROM '.$this->_tableName.' WHERE trash = 0';
		$req3 = $this->execRequest($sql3);
		$data3 = $this->getRequestData($req3);
		
		$entity = new EntityNavigation($data);
		$entity->setDistinctNav($data2);
		$entity->setDistinctAlt($data3);
		return $entity;
	}

	public function getTrashBy($name, $target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =1 AND '.$name.' = "'.$target.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityNavigation($data);
	}

	public function getAllTrash(){
		$sql ='SELECT DISTINCT nav FROM '.$this->_tableName.' WHERE trash = 1';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		
		$entity = new EntityNavigation($data);
		return $entity;
	}

	public function getBy($name, $target){
		$sql = 'SELECT * FROM '.$this->_tableName.' WHERE trash =0 AND nav = "'.$target.'"';
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityNavigation($data);
	}
}



