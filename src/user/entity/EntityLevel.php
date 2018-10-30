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

namespace src\user\entity;
use \NxsFram\component\Entity;

class EntityLevel extends Entity{

	private $_id;	
	private $_level;
	private $_name;	
	private $_alt;
	private $_color;

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
		if ($this->exist($var)){
			$this->_id = $var;
		}else{
			echo "Erreur 1";
		}
	}	
	
	public function setLevel($var){
		$this->_level = $var;
	}

	public function setName($var){
		if ($this->exist($var) && $this->isString($var)){
			$this->_name = $var;
		}else{
			echo "Erreur sur le nom de la catégorie.";
		}
	}

	public function setAlt($var){
		if ($this->exist($var) && $this->isString($var)){
			$this->_alt = $var;
		}else{
			$this->_alt = "Aucun.";
		}
	}

	public function setColor($var){
		if ($this->exist($var)){
			$this->_color = $var;
		}else{
			echo "Erreur sur la couleur du grade.";
		}
	}

	public function setData($i){
		$this->_data[$i] = array (
			'id' 			=> $this->_id,
			'level' 		=> $this->_level,
			'name' 			=> $this->_name,
			'alt' 			=> $this->_alt,
			'color' 		=> $this->_color
		);
	}

// -- Getters --
	public function getData($i)			{return $this->_data[$i];		}
	public function getEntities()		{return $this->_data;			}	
	public function getId()				{return $this->_id;				}
	public function getLevel()			{return $this->_level;			}
	public function getName()			{return $this->_name;			}
	public function getAlt()			{return $this->_alt;			}
	public function getColor()			{return $this->_color;			}
}



