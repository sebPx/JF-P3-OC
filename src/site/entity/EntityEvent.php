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

class EntityEvent extends Entity{
		
// -- Définition des variables --
	private $_id;
	private $_title;
	private $_resume;
	private $_eventDate;
	private $_location;
	private $_content;
	private $_author;
	private $_date;
	private $_modified;
	private $_state;
	private $_view;
	private $_apply;
	private $_comment;

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
	
	public function setTitle($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_title = htmlspecialchars($var);
	    }else{
	      	echo "Erreur titre.";
	    }
	}

	public function setResume($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_resume = htmlspecialchars($var);
	    }else{
	      	echo "Erreur résumé.";
	    }
	}

	public function setEventDate($var)	{
	    if ($this->exist($var)){
	    	$this->_eventDate = $var;
	    }else{
	      	echo "Erreur date de l'évènement.";
	    }
	}

	public function setLocation($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_location = htmlspecialchars($var);
	    }else{
	      	echo "Erreur emplacement.";
	    }
	}

	public function setContent($var)	{
	    if ($this->exist($var) && $this->isHTMLContent($var)){
	    	$this->_content = $var;
	    }else{
	      	echo "Erreur contenu.";
	    }
	}

	public function setAuthor($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_author = htmlspecialchars($var);
	    }else{
	      	echo "Erreur auteur.";
	    }
	}

	public function setDate($var)	{
	    if ($this->exist($var)){
	    	$this->_date = $var;
	    }else{
	      	echo "Erreur date de création.";
	    }
	}

	public function setModified($var)	{
	    if ($this->exist($var)){
	    	$this->_modified = $var;
	    }else{
	      	echo "Erreur date de modification.";
	    }
	}

	public function setState($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_state = $var;
	    }else{
	      	echo "Erreur etat.";
	    }
	}

	public function setView($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_view = $var;
	    }else{
	      	echo "Erreur visibilité.";
	    }
	}

	public function setApply($var)	{
	    if ($this->exist($var)){
	    	$this->_apply = $var;
	    }else{
	      	echo "Erreur date de publication.";
	    }
	}

	public function setComment($var)	{
	    $this->_comment = $var;
	}
	
	
	public function setData($i){
		$this->_data[$i] = array (
			'id' 			=> $this->_id,
			'title' 		=> $this->_title,
			'resume' 		=> $this->_resume,
			'eventDate' 	=> $this->_eventDate,
			'location' 		=> $this->_location,
			'content' 		=> $this->_content,
			'author' 		=> $this->_author,
			'date' 			=> $this->_date,
			'modified' 		=> $this->_modified,
			'state' 		=> $this->_state,
			'view' 			=> $this->_view,
			'apply' 		=> $this->_apply,
			'comment' 		=> $this->_comment,

		);
	}
// -- Getters --
	public function getData($i)			{return $this->_data[$i];	}
	public function getEntities()		{return $this->_data;		}
	public function getId()				{return $this->_id;			}
	public function getTitle()			{return $this->_title;		}
	public function getResume()			{return $this->_resume;		}
	public function getEventDate()		{return $this->_eventDate;	}
	public function getLocation()		{return $this->_location;	}
	public function getContent()		{return $this->_content;	}
	public function getAuthor()			{return $this->_author;		}
	public function getDate()			{return $this->_date;		}
	public function getModified()		{return $this->_modified;	}
	public function getState()			{return $this->_state;		}
	public function getView()			{return $this->_view;		}
	public function getApply()			{return $this->_apply;		}
	public function getComment()		{return $this->_comment;	}

}