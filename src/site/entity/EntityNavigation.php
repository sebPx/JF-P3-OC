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

class EntityNavigation extends Entity{
		
// -- Définition des variables --
	private $_id;	
	private $_name;
	private $_link;
	private $_url;
	private $_alt;
	private $_nav;
	
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
	public function setId($id){
		$this->_id = $id;
	}	
	
	public function setName($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_name = $var;
	    }else{
	      	echo "Erreur nom du lien.";
	    }
	}
	
	public function setLink($var)  {
	   	if ($this->exist($var) && $this->isString($var)){
	    	$this->_link = $var;
	    }else{
	    	echo "Erreur de lien.";
	    }
	}
	public function setUrl($var)  {
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_url = $var;
	    }else{
	    	echo "Erreur d'url.";
	    }
	}
	
	public function setAlt($var){
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_alt = htmlspecialchars($var);
	    }else{
	    	echo "Erreur de description.";
	    }
	}
	
	public function setNav($var){
		if ($this->exist($var) && $this->isString($var)){
			$this->_nav = $var;
	    }else{
	    	echo "Erreur identifiant du menu.";
	    }			
	}

	public function setDistinctNav($var){
		if ($this->exist($var)){
			$this->_data['nav'] = $var;
	    }else{
	    	echo "Erreur nom des menus.";
	    }			
	}

	public function setDistinctAlt($var){
		if ($this->exist($var)){
			$this->_data['alt'] = $var;
	    }else{
	    	echo "Erreur description des menus.";
	    }			
	}

	public function setData($i){
		$this->_data['link'][$i] = array (
			'id' 		=> $this->_id,
			'name' 		=> $this->_name,
			'link' 		=> $this->_link,
			'nav' 		=> $this->_nav,
			'alt' 		=> $this->_alt,
			'url' 		=> $this->_url				
		);
	}
// -- Getters --
	public function getData($i)		{return $this->_data[$i];		}
	public function getEntities()	{return $this->_data;			}
	public function getId()			{return $this->_id;				}
	public function getName()		{return $this->_name;			}
	public function getLink()		{return $this->_link;			}
	public function getNav()		{return $this->_nav;			}
	public function getAlt()		{return $this->_alt;			}
	public function getUrl()		{return $this->_url;			}


}



