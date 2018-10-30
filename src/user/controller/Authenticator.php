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
use \NxsFram\component\Entity;
use \NxsFram\component\Model;
use \src\user\model\modelUser;

class Authenticator{
	private $_sessionID;

    public function setAuthenticated(Model $model, Entity $user){
        if (!empty($user->getLogin())) {
            $this->setToken();
            $model->updateToken($user,$this->Token());
    		
    		$_SESSION['user'] = array(
				'login'	    => $user->getLogin(),
				'level'	    => $user->getLevel(),
                'lastCo'    => $user->getLastCo(),
                'avatar'    => $user->getAvatar(),
				'token'	    => $this->Token()
			); 
    	}
    }

    public function isAuthenticated(){
    	if (!empty($_SESSION) && !empty($_SESSION['user']['login']) && !empty($_SESSION['user']['token'])) {
    		return true;
    	}else{
    		return false;
    	}
    }

    public function setToken(){
    	session_regenerate_id();
    	$this->_sessionID = session_id();
    }
    
    public function Token(){
    	return $this->_sessionID;
    }

}

   
