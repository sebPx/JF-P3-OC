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
	private $_postTitle;
	private $_content;
	private $_date;
	private $_up;
	private $_down;
	private $_reported;
	private $_approve;
	private $_tracker;
	private $_archive;
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
	
	public function setAuthor($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_author = htmlspecialchars($var);
	    }else{
	      	echo "Erreur auteur.";
	    }
	}
	
	public function setPost($var)	{
	    if ($this->exist($var)){
	    	$this->_post = $var;
	    }else{
	      	echo "Erreur post.";
	    }
	}

	public function setPostTitle($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_postTitle = $var;
	    }else{
	      	echo "Erreur titre du post.";
	    }
	}

	public function setContent($var)	{
	    if ($this->exist($var) && $this->isHTMLContent($var)){
	    	$this->_content = $var;
	    }else{
	      	echo "Erreur contenu.";
	    }
	}

	public function setDate($var)	{
	    if ($this->exist($var)){
	      	$this->_date = $var;
	    }else{
	      	echo "Erreur date de création.";
	    }
	}

	public function setUp($var){
		$this->_up = htmlspecialchars($var);
	}

	public function setDown($var){
		$this->_down = htmlspecialchars($var);
	}

	public function setReported($var){
		$this->_reported = htmlspecialchars($var);
	}

	public function setTracker($var){
		$this->_tracker = htmlspecialchars($var);
	}

	public function setApprove($var){
		$this->_approve = htmlspecialchars($var);
	}

	public function setArchive($var){
		$this->_archive = htmlspecialchars($var);
	}

	public function setComment($var){
		$this->_comment = htmlspecialchars($var);
	}

	public function setData($i){
		$this->_data[$i] = array (
			'id' 			=> $this->_id,
			'author' 		=> $this->_author,
			'post' 			=> $this->_post,
			'postTitle' 	=> $this->_postTitle,
			'content' 		=> $this->_content,
			'up' 			=> $this->_up,
			'down' 			=> $this->_down,
			'reported' 		=> $this->_reported,
			'odds' 			=> $this->_up - $this->_down,
			'date' 			=> $this->_date,
			'tracker' 		=> $this->_tracker,
			'approve' 		=> $this->_approve,
			'archive' 		=> $this->_archive,
			'comment' 		=> $this->_comment
		);
	}
// -- Getters --
	public function getData($i)		{return $this->_data[$i];		}
	public function getEntities()	{return $this->_data;			}
	public function getAuthor()		{return $this->_author;			}
	public function getContent()	{return $this->_content;		}
	public function getPost()		{return $this->_post;			}
	public function getPostTitle()	{return $this->_postTitle;		}
	public function getUp()			{return $this->_up;				}
	public function getDown()		{return $this->_down;			}
	public function getReported()	{return $this->_reported;		}
	public function getOdds()		{return $this->_up - $this->_down;		}
	public function getDate()		{return $this->_date;			}
	public function getTracker()	{return $this->_tracker;		}
	public function getApprove()	{return $this->_approve;		}
	public function getArchive()	{return $this->_archive;		}
	public function getComment()	{return $this->_comment;		}
}