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

class FieldColor extends Field{
      
    public function buildField(){
        $widget = '';
        $widget .= '<label class="input">'.$this->label.'</label>';
        $widget .= '<input type="color" name="'.$this->name.'" ';

        if (!empty($this->value)){
            $widget .= ' value="'.htmlspecialchars($this->value).'"';
        }else{
        	 $widget .= ' value="#1a8ae2"';
        }
        
        $widget .= ' />';
        return $widget;
    }
}
