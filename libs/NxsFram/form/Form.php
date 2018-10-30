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
use \NxsFram\field\Field;
use \NxsFram\component\Entity;

class Form{
 
  protected $fields = [];

	public function formAddValues($request){
		foreach ($this->fields as $key => $field) {
		    if (empty($field->value())) {
		    	$field->setValue($request[$field->name()]);
		    }		
		} 
		return $this;
	}

	public function formInquire(Entity $entity){
		foreach ($this->fields as $key => $field) {
			$getter = "get".ucfirst($field->name());
			if (is_callable([$entity, $getter])) {
		    	$field->setValue($entity->$getter());
		    }		    	
		} 
		return $this;
	}

	public function add(Field $field){
	    $this->fields[] = $field;
	    return $this;
	}  
	  
	public function isValid(){
	    $valid = true;
	    foreach ($this->fields as $key => $field){
	      if (!$field->isValid()){
	        $valid = false;
	      }
	    }
	    return $valid;
	}

	public function createView(){
	    $view = array();
	    foreach ($this->fields as $field){
			$view[$field->name()] = $field->buildField();
	    }
	    return $view;
	}
	  
}