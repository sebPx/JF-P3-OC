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
use \NxsFram\excpetion\ExcpetionHandler;
use \NxsFram\component\Entity;
use \NxsFram\compone;
use \src\site\model\ModelStat;
use \src\site\model\ModelLog;
use \src\site\model\ModelNotification;
use \src\site\entity\EntityLog;
use \src\site\entity\EntityNotification;

class Tracker{
	private $_target;
	private $_count;

	Public function __construct($target){
		if (isset($target)) {
			$this->_target = $target;
		}else{
			throw new ExcpetionHandler('La methode ou l\'entité est inexistante !');
		}
	}

	Public function stat($value){
		$stat = new ModelStat;
		$stat->update($this->_target, $value);
		return;
	}
	
	Public function log($actor, $action, $object){
		$log = new ModelLog;
		$data['0'] = array(
			'actor' => $actor,
			'object' => $object,
			'action' => $action
		);

		$entity = new EntityLog($data);
		$log->add($entity);
		return;		
	}
	
	Public function notification($actor, $action, $object, $receiver){
		$notification = new ModelNotification;
		$data['0'] = array(
			'sender' 	=> $actor,
			'subject' 	=> $object,
			'content' 	=> $action,
			'receiver' 	=> $receiver
		);

		$entity = new EntityNotification($data);
		$notification->add($entity);
		return;			
	}

	Public function setTarget($target){
		$this->_target = $target;
	}

}

