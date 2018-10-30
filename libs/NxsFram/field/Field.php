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

namespace NxsFram\field;
use \NxsFram\validator\Validator;

abstract class Field{
	use \NxsFram\component\Hydrator;
	  
	protected $errorMessage;
	protected $label;
	protected $name;
	protected $options = [];
	protected $selected;
	protected $validators = [];
	protected $value;
	  
	public function __construct(array $options = []){
		if (!empty($options)){
	    	$this->hydrate($options);
	    }
	}
	  
	abstract public function buildField();
	  
	public function label(){
	    return $this->label;
	}
	  
	public function name(){
	    return $this->name;
	}

	public function options(){
	    return $this->options;
	}

	public function selected(){
	    return $this->selected;
	}
	  
	public function value(){
	    return $this->value;
	}

	public function length(){
	    return $this->length;
	}

	public function validators(){
	    return $this->validators;
	}
	  
	public function setLabel($label){
	    if (is_string($label)){
	    	$this->label = $label;
	    }
	}
	  
	public function setName($name){
	    if (is_string($name)){
	    	$this->name = $name;
	    }
	}

	public function setSelected($selected){
	    if (is_string($selected)){
	    	$this->selected = $selected;
	    }
	}
	  
	public function setValue($value){
	    if (is_string($value)){
	    	$this->value = $value;
	    }
	}

	public function setLength($length){
	    $length = (int) $length; 
	    if ($length > 0){
	    	$this->length = $length;
	    }
	}

	public function isValid(){
	    foreach ($this->validators as $validator){
		    if (!$validator->isValid($this->value)){
	    	    $this->errorMessage = $validator->errorMessage();
	        	return false;
		    }
		}
	    return true;
	}

	public function setValidators(array $validators){
	    foreach ($validators as $validator){
	    	if ($validator instanceof Validator && !in_array($validator, $this->validators)){
	    		$this->validators[] = $validator;
	    	}
	    }
	}

	public function setOption(array $option){
		$this->options = $option;
	}

}