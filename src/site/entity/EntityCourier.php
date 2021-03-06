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

class EntityCourier extends Entity{
		
// -- Définition des variables --
	private $_id;	
	private $_name;
	private $_surname;
	private $_email;
	private $_subject;
	private $_content;
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
	
	public function setName($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_name = htmlspecialchars($var);
	    }else{
	      	echo "Erreur prénom.";
	    }
	}

	public function setSurname($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_surname = htmlspecialchars($var);
	    }else{
	      	echo "Erreur nom.";
	    }
	}

	public function setEmail($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_email = htmlspecialchars($var);
	    }else{
	      	echo "Erreur email.";
	    }
	}

	public function setSubject($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_subject = htmlspecialchars($var);
	    }else{
	      	echo "Erreur sujet.";
	    }
	}

	public function setContent($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_content = $var;
	    }else{
	      	echo "Erreur contenu.";
	    }
	}

	public function setDate($var)	{
	    if ($this->exist($var)){
	    	$this->_date = $var;
	    }else{
	      	echo "Erreur date.";
	    }
	}

	public function setTracker($var)	{
	    $this->_tracker = htmlspecialchars($var);
	}

	public function setData($i){
		$this->_data[$i] = array (
			'id' 		=> $this->_id,
			'name' 		=> $this->_name,
			'surname' 	=> $this->_surname,
			'email' 	=> $this->_email,
			'subject' 	=> $this->_subject,
			'content' 	=> $this->_content,
			'date' 		=> $this->_date,
			'tracker' 	=> $this->_tracker
		);
	}
// -- Getters --
	public function getData($i)			{return $this->_data[$i];	}
	public function getEntities()		{return $this->_data;		}
	public function getId()				{return $this->_id;			}
	public function getName()			{return $this->_name;		}
	public function getSurname()		{return $this->_surname;	}
	public function getEmail()			{return $this->_email;		}
	public function getSubject()		{return $this->_subject;	}
	public function getContent()		{return $this->_content;	}
	public function getDate()			{return $this->_date;		}
	public function getTracker()		{return $this->_tracker;	}

}