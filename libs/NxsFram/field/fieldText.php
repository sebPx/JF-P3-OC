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
use \NxsFram\field\Field;

class FieldText extends Field{
    protected $maxLength;
      
    public function buildField(){
        $widget = '';

        if (!empty($this->errorMessage)){
            $widget .= '<div class="error" style="padding-bottom: 5px;color:#ff6161;border-bottom:1px solid #ff6161;">ⓘ '.$this->errorMessage.'</div>';
        }

        $widget .= '<input type="text" id = "'.$this->name.'" name="'.$this->name.'" placeholder="'.$this->label.'" ';

        if (!empty($this->value)){
            $widget .= ' value="'.htmlspecialchars($this->value).'"';
        }

        if (!empty($this->maxLength)){
            $widget .= ' maxlength="'.$this->maxLength.'"';
        }
        
        $widget .= ' />';
        return $widget;
    }

    public function setMaxLength($maxLength){
        $maxLength = (int) $maxLength;
        
        if ($maxLength > 0){
            $this->maxLength = $maxLength;
        
        }else{
            throw new \NxsFram\exception\ExceptionHandler('La longueur maximale doit être un nombre supérieur à 0');
        }
    }
}
