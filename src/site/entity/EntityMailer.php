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

class EntityMailer extends Entity{
		
// -- Définition des variables --	
	private $_name;
	private $_email;
	private $_smtp;
	private $_host;
	private $_port;
	private $_user;
	private $_pass;

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
	
	public function setName($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_name = htmlspecialchars($var);
	    }else{
	      	echo "Erreur name.";
	    }
	}
	
	public function setEmail($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_email = htmlspecialchars($var);
	    }else{
	      	echo "Erreur email.";
	    }
	}

	public function setSmtp($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_smtp = $var;
	    }else{
	      	echo "Erreur smtp.";
	    }
	}

	public function setHost($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_host = $var;
	    }else{
	      	echo "Erreur hote.";
	    }
	}

	public function setPort($var)	{
	    if ($this->exist($var)){
	    	$this->_port = $var;
	    }else{
	      	echo "Erreur port.";
	    }
	}

	public function setUser($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_user = htmlspecialchars($var);
	    }else{
	      	echo "Erreur identifiant.";
	    }
	}

	public function setPass($var)	{
	    if ($this->exist($var) && $this->isString($var)){
	    	$this->_pass = htmlspecialchars($var);
	    }else{
	      	echo "Erreur mot de passe.";
	    }
	}

	public function setData($i){
		$this->_data[$i] = array (
			'name' 		=> $this->_name,
			'email' 	=> $this->_email,
			'smtp' 		=> $this->_smtp,
			'host' 		=> $this->_host,
			'port' 		=> $this->_port,
			'user' 		=> $this->_user,
			'pass' 		=> $this->_pass
		);
	}
// -- Getters --
	public function getData($i)			{return $this->_data[$i];	}
	public function getEntities()		{return $this->_data;		}
	public function getName()			{return $this->_name;		}
	public function getEmail()			{return $this->_email;		}
	public function getSmtp()			{return $this->_smtp;		}
	public function getHost()			{return $this->_host;		}
	public function getPort()			{return $this->_port;		}
	public function getUser()			{return $this->_user;		}
	public function getPass()			{return $this->_pass;		}

}