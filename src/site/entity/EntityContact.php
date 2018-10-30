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

class EntityContact extends Entity{
		
// -- Définition des variables --
	private $_id;	
	private $_name;
	private $_surname;
	private $_email;
	private $_note;

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

	public function setNote($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_note = htmlspecialchars($var);
	    }else{
	      	$this->_note = "Aucune.";
	    }
	}
	
	public function setData($i){
		$this->_data[$i] = array (
			'id' 		=> $this->_id,
			'name' 		=> $this->_name,
			'surname' 	=> $this->_surname,
			'email' 	=> $this->_email,
			'note' 		=> $this->_note
		);
	}
// -- Getters --
	public function getData($i)			{return $this->_data[$i];	}
	public function getEntities()		{return $this->_data;		}
	public function getId()				{return $this->_id;			}
	public function getName()			{return $this->_name;		}
	public function getSurname()		{return $this->_surname;	}
	public function getEmail()			{return $this->_email;		}
	public function getNote()			{return $this->_note;		}
}