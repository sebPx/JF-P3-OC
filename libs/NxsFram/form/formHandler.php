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

namespace NxsFram\form;
use \NxsFram\component\Model;

class FormHandler{
	private $_target;
	private $_model;
	private $_form;
	private $_request;
	private $_entity;
	private $_inquired;
	
	public function __construct(Form $form){
		$this->setForm($form);
	}

	public function process($formContent){
		$this->_inquired = $this->_form->formAddValues($formContent);
		if($this->_inquired->isValid()){
			$entity[0] = $formContent;
			$this->_entity = $entity;
			return true;
		}else{
			return false;
		}
	}

	public function setForm($form){
		$this->_form = $form;
	}

	public function getEntity(){
		return $this->_entity;
	}
	
	public function getFormInquired(){
		return $this->_inquired;
	}

}
