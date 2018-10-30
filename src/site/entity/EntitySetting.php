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

class EntityComment extends Entity{
		
// -- Définition des variables --
	private $_id;	
	private $_author;
	private $_post;
	private $_content;
	private $_date;
	private $_up;
	private $_down;
	private $_reported;
	private $_comData;
	private $_trash;
	
	public function __construct($item){
		if (!empty($item)) {
			$count = count($item);
			$i = 0;
			while ($i < $count) {
				$this->setEntity($item[$i]);
				$this->setCom($i);
				$i++;
			}
		}
	}

// -- Setters --
	public function setId($var){
		$this->_id = $var;
	}	
	
	public function setAuthor($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_author = $var;
	    }else{
	      	echo "Erreur auteur";
	    }
	}
	
	public function setPost($var)	{
	    if ($this->exist($var)){
	    	$this->_post = $var;
	    }else{
	      	echo "Erreur post";
	    }
	}

	public function setContent($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_content = $var;
	    }else{
	      	echo "Erreur contenu";
	    }
	}

	public function setDate($var)	{
	      	$this->_date = $var;
	}

	public function setUp($var){
		$this->_up = $var;
	}

	public function setDown($var){
		$this->_down = $var;
	}

	public function setReported($var){
		$this->_reported = $var;
	}
	
	public function setTrash($var){
		$this->_trash = $var;
	}
	
	public function setCom($i){
		$this->_comData[$i] = array (
			'id' 		=> $this->_id,
			'author' 	=> $this->_author,
			'post' 		=> $this->_post,
			'content' 	=> $this->_content,
			'up' 		=> $this->_up,
			'down' 		=> $this->_down,
			'reported' 	=> $this->_reported,
			'odds' 		=> $this->_up - $this->_down,
			'date' 		=> $this->_date		
		);
	}
// -- Getters --
	public function getComData($i)	{return $this->_comData[$i];	}
	public function getComments()	{return $this->_comData;		}
	public function getAuthor()		{return $this->_author;			}
	public function getContent()	{return $this->_content;		}
	public function getPost()		{return $this->_post;			}
}