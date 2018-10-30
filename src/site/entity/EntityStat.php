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

class EntityStat extends Entity{
		
// -- Définition des variables --
	private $_id;	
	private $_object;
	private $_value;
	private $_selected;
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
	
	public function setObject($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_object = $var;
	    }else{
	      	echo "Erreur de l'objet des statistiques.";
	    }
	}
	
	public function setValue($var)	{
	    $this->_value = $var;
	}

	public function setSelected($var)	{
	    $this->_selected = $var;
	}
	
	public function setData($i){
		$this->_data[$i] = array (
			'id' 		=> $this->_id,
			'object' 	=> $this->_object,
			'value' 	=> $this->_value,
			'selected' 	=> $this->_selected	
		);
	}
// -- Getters --
	public function getData($i)		{return $this->_data[$i];		}
	public function getEntities()	{return $this->_data;			}
	public function getId()			{return $this->_id;				}
	public function getObject()		{return $this->_object;			}
	public function getValue()		{return $this->_value;			}
	public function getSelected()	{return $this->_selected;		}

}