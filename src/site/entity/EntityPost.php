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

class EntityPost extends Entity{
		
// -- Définition des variables --
	private $_id;	
	private $_title;
	private $_image;
	private $_content;	
	private $_author;
	private $_resume;
	private $_date;
	private $_modified;
	private $_type;
	private $_comment;
	private $_category;
	private $_state;
	private $_view;
	private $_apply;

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
	
	public function setTitle($var){
		if ($this->exist($var) && $this->isString($var)){
			$this->_title = htmlspecialchars($var);
		}else{
			echo "Erreur titre.";
		}
	}

	public function setImage($var){
		if ($this->exist($var) && $this->isString($var)){
			$this->_image = $var;
		}else{
			echo "Erreur image.";
		}
	}

	public function setContent($var){
		if ($this->exist($var) && $this->isHTMLContent($var)){
			$this->_content = $var;
		}else{
			echo "Erreur contenu.";
		}
	}

	public function setAuthor($var){
		if ($this->exist($var) && $this->isString($var)){
			$this->_author = $var;
		}else{
			echo "Erreur auteur.";
		}
	}

	public function setResume($var){
		if ($this->exist($var) && $this->isString($var)){
			$this->_resume = htmlspecialchars($var);
		}else{
			echo "Erreur résumé.";
		}
	}

	public function setDate($var){
		if ($this->exist($var)){
			$this->_date = $var;
		}else{
			echo "Erreur date de création.";
		}
	}

	public function setModified($var){
		if ($this->exist($var)){
			$this->_modified = $var;
		}else{
			echo "Erreur date de modification.";
		}
	}

	public function setType($var){
		if ($this->exist($var)){
			$this->_type = $var;
		}else{
			echo "Erreur type de post.";
		}
	}

	public function setComment($var){
		if ($this->exist($var)){
			$this->_comment = $var;
		}else{
			echo "Erreur statu des comentaires.";
		}
	}

	public function setCategory($var){
		if ($this->exist($var) && $this->isString($var)){
			$this->_category = $var;
		}else{
			echo "Erreur catégorie.";
		}
	}

	public function setState($var){
		if ($this->exist($var) && $this->isString($var)){
			$this->_state = $var;
		}else{
			echo "Erreur etat.";
		}
	}

	public function setView($var){
		if ($this->exist($var) && $this->isString($var)){
			$this->_view = $var;
		}else{
			echo "Erreur visibilité.";
		}
	}

	public function setApply($var){
		if ($this->exist($var)){
			$this->_apply = $var;
		}else{
			echo "Erreur date de publication.";
		}
	}


	public function setData($i){
		$this->_data[$i] = array (
			'id' 		=> $this->_id,
			'title' 	=> $this->_title,
			'image' 	=> $this->_image,
			'content' 	=> $this->_content,
			'author' 	=> $this->_author,
			'resume' 	=> $this->_resume,
			'date' 		=> $this->_date,
			'modified' 	=> $this->_modified,
			'type' 		=> $this->_type,
			'comment' 	=> $this->_comment,
			'category' 	=> $this->_category,
			'state' 	=> $this->_state,
			'view' 		=> $this->_view,
			'release' 	=> $this->_apply
		);
	}

// -- Getters --
	public function getData($i)		{return $this->_data[$i];		}
	public function getEntities()	{return $this->_data;			}
	public function getId()			{return $this->_id;				}
	public function getImage()		{return $this->_image;			}
	public function getTitle()		{return $this->_title;			}
	public function getContent()	{return $this->_content;		}
	public function getAuthor()		{return $this->_author;			}
	public function getComment()	{return $this->_comment;		}
	public function getResume()		{return $this->_resume;			}
	public function getDate()		{return $this->_date;			}
	public function getCategory()	{return $this->_category;		}
	public function getType()		{return $this->_type;			}
	public function getState()		{return $this->_state;			}
	public function getView()		{return $this->_view;			}
	public function getApply()		{return $this->_apply;			}
	public function getModified()	{return $this->_modified;		}
}



