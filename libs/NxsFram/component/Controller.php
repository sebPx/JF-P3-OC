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

namespace NxsFram\component;
use \NxsFram\http\httpRequest;

class Controller{
	protected $httpRequest;
	protected $part;
	protected $method;
	protected $content;


	public function __construct($method ,$part){
		$this->httpRequest = new httpRequest();
		$this->part = "site/".$part;
		$this->method = $method;
	}

	public function release(){
		$create = new \app\builder($this->part);
		return $create->buildStructure($this->structure,$this->content);
	}

	public function setStructure($structure = []){
		if (!empty($structure)){
			$this->structure = $structure;
		}
	}
	public function resetStructure(){
		if (!empty($structure)){
			$this->structure = "";
		}
	}

	public function setContent($content = []){
		if (!empty($content)){
			$this->content = $content;
		}
	}

	public function structure(){
		return $this->structure;
	}

	public function content(){
		return $this->content;
	}

	public function addContent($content = []){
		if (!empty($content)){
			$this->content = $this->content + $content;
		}	
	}

	public function returnJSON($content){
		echo $content;
		exit;
	}
}

