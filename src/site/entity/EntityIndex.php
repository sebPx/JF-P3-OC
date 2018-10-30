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

class EntityIndex extends Entity{
		
// -- Définition des variables --
	private $_id;	
	private $_code;
	private $_content;
	private $_related;
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

	public function setCode($var)	{
	    if ($this->exist($var)){
	    	$this->_code = $var;
	    }else{
	      	echo "Erreur sur le code de l'index.";
	    }
	}
	
	public function setContent($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_content = $var;
	    }else{
	      	echo "Erreur sur le contenu de l'index.";
	    }
	}
	
	public function setRelated($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_related = $var;
	    }else{
	      	echo "Erreur sur l'argument de relation de l'index.";
	    }
	}

	public function setData($i){
		$this->_data[$i] = array (
			'id' 		=> $this->_id,
			'code' 		=> $this->_code,
			'content' 	=> $this->_content,
			'related' 	=> $this->_related	
		);
	}
// -- Getters --
	public function getData($i)		{return $this->_data[$i];		}
	public function getEntities()	{return $this->_data;			}
	public function getId()			{return $this->_id;				}
	public function getCode()		{return $this->_object;			}
	public function getContent()	{return $this->_value;			}
	public function getRelated()	{return $this->_selected;		}

}