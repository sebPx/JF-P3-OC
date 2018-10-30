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
use \src\site\entity\EntityIndex;

class ModelIndex extends Model{
		
	private $_tableName;

// Constructeur et séquence de vérification	
	public function __construct(){
		$this->MySQLConnect();
		$this->_tableName = "nxs_index";
	}

	public function update($target, $count){
		$sql = 'UPDATE '.$this->_tableName.' SET value = '.$count.' WHERE object = "'.$target.'"';
		$req = $this->execRequest($sql);
		return;	
	}

	public function getAll(){
		$sql = 'SELECT * FROM '.$this->_tableName;
		$req = $this->execRequest($sql);
		$data = $this->getRequestData($req);
		return new EntityIndex($data);
	}
}