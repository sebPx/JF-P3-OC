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

namespace src\site\entity;
use \NxsFram\component\Entity;

class EntityLog extends Entity{
		
// -- Définition des variables --
	private $_id;	
	private $_actor;
	private $_object;
	private $_date;
	private $_action;
	
	private $_data;
	
	public function __construct($item){
		if (!empty($item)) {
			$count = count($item);
			$i = 0;
			while ($i < $count) {
				$this->setEntity($item[$i]);
				$this->setData($i);
				$i++;
			}
		}
	}

// -- Setters --
	public function setId($var){
		$this->_id = $var;
	}	
	
	public function setActor($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_actor = $var;
	    }else{
	      	echo "Erreur actor.";
	    }
	}
	
	public function setObject($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_object = $var;
	    }else{
	      	echo "Erreur object.";
	    }
	}

	public function setDate($var)	{
	    if ($this->exist($var)){
	    	$this->_date = $var;
	    }else{
	      	echo "Erreur date.";
	    }
	}

	public function setAction($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_action = $var;
	    }else{
	      	echo "Erreur action.";
	    }
	}
	
	public function setData($i){
		$this->_data[$i] = array (
			'id' 		=> $this->_id,
			'actor' 	=> $this->_actor,
			'object' 	=> $this->_object,
			'date' 		=> $this->_date,
			'action' 	=> $this->_action	
		);
	}
// -- Getters --
	public function getData($i)		{return $this->_data[$i];	}
	public function getEntities()	{return $this->_data;		}
	public function getId()			{return $this->_id;			}
	public function getActor()		{return $this->_actor;		}
	public function getObject()		{return $this->_object;		}
	public function getDate()		{return $this->_date;		}
	public function getAction()		{return $this->_action;		}

}