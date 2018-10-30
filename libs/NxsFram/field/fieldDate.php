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

class FieldDate extends Field{
      
    public function buildField(){
        $widget = '';
        $widget .= '<label class="input">'.$this->label.'</label>';

        if (!empty($this->errorMessage)){
            $widget .= '<div class="error" style="padding-bottom: 5px;color:#ff6161;border-bottom:1px solid #ff6161;">ⓘ '.$this->errorMessage.'</div>';
        }

        $widget .= '<input type="date" name="'.$this->name.'" min="2018-01-01" ';

        if (!empty($this->value)){
            $widget .= ' value="'.$this->value.'"';
        }else{
            $widget .= ' value="'.date("Y-m-d").'"';
        }
        
        $widget .= ' />';
        return $widget;
    }
}
