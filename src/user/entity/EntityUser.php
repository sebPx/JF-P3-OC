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

class EntityUser extends Entity{

	private $_id;	
	private $_login;
	private $_pass;	
	private $_name;
	private $_surname;
	private $_email;
	private $_date;
	private $_level;
	private $_avatar;
	private $_LastCo;
	private $_token;
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
	
	public function setLogin($var){
		if ($this->exist($var) && $this->isString($var)){
			$this->_login = $var;
		}else{
			echo "Erreur 2";
		}
	}

	public function setPass($var){
			$this->_pass = $var;
	}

	public function setName($var){
		if ($this->exist($var) && $this->isString($var)){
			$this->_name = $var;
		}else{
			$this->_name = "Indéfini.";
		}
	}

	public function setSurname($var){
		if ($this->exist($var) && $this->isString($var)){
			$this->_surname = $var;
		}else{
			$this->_surname = "Indéfini.";
		}
	}
	
	public function setEmail($var){
		if ($this->exist($var)){
			$this->_email = $var;
		}else{
			echo "Erreur 6";
		}
	}

	public function setDate($var){
		if ($this->exist($var)){
			$this->_date = $var;
		}else{
			echo "Erreur 7";
		}
	}

	public function setLevel($var){
			$this->_level = $var;
	}

	public function setAvatar($var){
		if ($this->exist($var)){
			$this->_avatar = $var;
		}else{
			$this->_name = "Default.png.";
		}
	}
	
	public function setToken($var){
		if ($this->exist($var)){
			$this->_token = $var;
		}else{
			echo "Erreur 10";
		}
	}
	
	public function setLastCo($var){
		if ($this->exist($var)){
			$this->_lastCo = $var;
		}else{
			echo "Erreur 11";
		}
	}


	public function setData($i){
		$this->_data[$i] = array (
			'id' 			=> $this->_id,
			'login' 		=> $this->_login,
			'pass' 			=> $this->_pass,
			'name' 			=> $this->_name,
			'surname' 		=> $this->_surname,
			'email' 		=> $this->_email,
			'date' 			=> $this->_date,
			'level' 		=> $this->_level,
			'avatar' 		=> $this->_avatar,
			'token' 		=> $this->_token,
			'lastCo' 		=> $this->_lastCo
		);
	}

// -- Getters --
	public function getData($i)			{return $this->_data[$i];		}
	public function getEntities()		{return $this->_data;			}	
	public function getId()				{return $this->_id;				}
	public function getLogin()			{return $this->_login;			}
	public function getPass()			{return $this->_pass;			}
	public function getName()			{return $this->_name;			}
	public function getSurname()		{return $this->_surname;		}
	public function getEmail()			{return $this->_email;			}
	public function getDate()			{return $this->_date;			}
	public function getLevel()			{return $this->_level;			}
	public function getAvatar()			{return $this->_avatar;			}
	public function getToken()			{return $this->_token;			}
	public function getLastCo()			{return $this->_lastCo;			}
}



