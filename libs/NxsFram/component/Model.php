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

namespace NxsFram\component;
use \PDO;

class Model{

	protected $_connect;
	private $_request;

	Public function MySQLConnect(){
		$this->_connect = \app\DBFactory::connexionPDO();
	}


	public function execRequest($sql){
		$this->_request = $this->_connect->prepare($sql);
		$this->_request->execute() or die($bdd->errorInfo());
		return ;
	}

	public function getRequestData($req){
		$back = $this->_request->fetchAll(PDO::FETCH_ASSOC);
		$this->_request->closeCursor(); // Termine le traitement de la requête
		return $back;
	}
}

