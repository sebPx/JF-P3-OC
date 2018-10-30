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

abstract class Entity {
	protected $_cleared;
	use Hydrator;
	
	protected function setEntity($data)	{	
		$this->hydrate($data);
	}

	protected function exist($var){
		if (!empty($var)) {
			return TRUE;
		}
	}

	protected function isString($var){
		if (is_string($var)) {
			$this->_cleared = htmlspecialchars($var);
			return true;
		}
	}

	protected function isHTMLContent($var){
		if (is_string($var)) {
			return TRUE;
		}
	}
}



