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

class EntityMedia extends Entity{
		
// -- Définition des variables --
	private $_id;	
	private $_name;
	private $_alt;
	private $_link;
	private $_date;
	
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
	      	echo "Erreur nom de l'image.";
	    }
	}
	
	public function setAlt($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_alt = htmlspecialchars($var);
	    }else{
	      	echo "Erreur description de l'image.";
	    }
	}

	public function setLink($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_link = $var;
	    }else{
	      	echo "Erreur lien de l'image.";
	    }
	}
	
	public function setDate($var)	{
	    if ($this->exist($var)){
	    	$this->_date = $var;
	    }else{
	      	echo "Erreur date de création.";
	    }
	}
	
	public function setData($i){
		$this->_data[$i] = array (
			'id' 		=> $this->_id,
			'name' 		=> $this->_name,
			'alt' 		=> $this->_alt,
			'link' 		=> $this->_link,
			'date' 		=> $this->_date
		);
	}
// -- Getters --
	public function getData($i)			{return $this->_data[$i];	}
	public function getEntities()		{return $this->_data;		}
	public function getId()				{return $this->_id;			}
	public function getName()			{return $this->_name;		}
	public function getAlt()			{return $this->_alt;		}
	public function getLink()			{return $this->_link;		}
	public function getDate()			{return $this->_date;		}
}