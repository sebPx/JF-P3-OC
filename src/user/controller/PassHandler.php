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

namespace src\user\controller;

class PassHandler{
	private $_pass;

    public function passEncode($pass){
    	if (!empty($pass)) {
    		$this->_pass = md5($pass);
    		return $this->_pass;
    	}
    }

    public function isValid(Entity $user){
    	if ($this->_pass == $user->getPass()) {
    		return true;
    	}else{
    		return false;
    	}
    }

}
