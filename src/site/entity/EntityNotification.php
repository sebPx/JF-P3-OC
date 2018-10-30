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

class EntityNotification extends Entity{
		
// -- Définition des variables --
	private $_id;	
	private $_subject;
	private $_sender;
	private $_content;
	private $_receiver;
	private $_date;
	private $_tracker;

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
	
	public function setSubject($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_subject = $var;
	    }else{
	      	echo "Erreur sujet de la notification.";
	    }
	}

	public function setSender($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_sender = $var;
	    }else{
	      	echo "Erreur expéditeur de la notification.";
	    }
	}

	public function setContent($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_content = $var;
	    }else{
	      	echo "Erreur contenu de la notification.";
	    }
	}

	public function setReceiver($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_receiver = $var;
	    }else{
	      	echo "Erreur destinataire de la notification.";
	    }
	}

	public function setDate($var)	{
	    if ($this->exist($var)){
	    	$this->_date = $var;
	    }else{
	      	echo "Erreur date de la notification.";
	    }
	}

	public function setTracker($var)	{
	    	$this->_tracker = $var;
	}

	public function setData($i){
		$this->_data[$i] = array (
			'id' 		=> $this->_id,
			'subject' 	=> $this->_subject,
			'sender' 	=> $this->_sender,
			'content' 	=> $this->_content,
			'receiver' 	=> $this->_receiver,
			'date' 		=> $this->_date,
			'tracker' 	=> $this->_tracker
		);
	}
// -- Getters --
	public function getData($i)			{return $this->_data[$i];		}
	public function getEntities()		{return $this->_data;			}
	public function getId()				{return $this->_id;				}
	public function getSubject()		{return $this->_subject;		}
	public function getSender()			{return $this->_sender;			}
	public function getContent()		{return $this->_content;		}
	public function getReceiver()		{return $this->_receiver;		}
	public function getDate()			{return $this->_date;			}
	public function getTracker()		{return $this->_tracker;		}
}