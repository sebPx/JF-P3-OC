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

namespace NxsFram\validator;

class ValidatorMaxLength extends Validator{
  protected $maxLength;
  
  public function __construct($errorMessage, $maxLength){
    parent::__construct($errorMessage); 
    $this->setMaxLength($maxLength);
  }
  
  public function isValid($value){
    return strlen($value) <= $this->maxLength;
  }
  
  public function setMaxLength($maxLength){
    $maxLength = (int) $maxLength;
    
    if ($maxLength > 0){
      $this->maxLength = $maxLength;
    
    }else{
      throw new \NxsFram\excpetion\ExcpetionHandler('La longueur maximale doit être un nombre supérieur à 0');
    }
  }
}
