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

class EntityCategory extends Entity{
		
// -- Définition des variables --
	private $_id;	
	private $_name;
	private $_alt;
	private $_base;
	
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
	      	echo "Erreur nom de la catégorie.";
	    }
	}
	
	public function setAlt($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_alt = $var;
	    }else{
	      	echo "Erreur description de la catégorie.";
	    }
	}

	public function setbase($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_base = $var;
	    }else{
	      	echo "Erreur bit de base des categories.";
	    }
	}
	
	public function setData($i){
		$this->_data[$i] = array (
			'id' 		=> $this->_id,
			'name' 		=> $this->_name,
			'alt' 		=> $this->_alt,
			'base' 		=> $this->_base
		);
	}
// -- Getters --
	public function getData($i)			{return $this->_data[$i];	}
	public function getEntities()		{return $this->_data;		}
	public function getId()				{return $this->_id;			}
	public function getName()			{return $this->_name;		}
	public function getAlt()			{return $this->_alt;		}
	public function getBase()			{return $this->_base;		}
}