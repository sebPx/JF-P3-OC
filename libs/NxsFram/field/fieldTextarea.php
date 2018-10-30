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

class FieldTextarea extends Field{
    protected $cols;
     protected $rows;
      
    public function buildField(){
        $widget = '';
        $widget = '<script src="assets/js/tinymce/js/tinymce/tinymce.min.js"></script>';  
        $widget .= '<script>tinymce.init({ language :"fr_FR",selector:"textarea",plugins:"image advlist",toolbar: "undo redo formatselect fontselect fontsizeselect  image bold italic alignleft aligncenter alignright bullist numlist outdent indent",width: "100%", height: "'.$this->options['size'].'" });</script>';

        if (!empty($this->errorMessage)){
            $widget .= '<div class="error" style="padding-bottom: 5px; color:#ff6161;border-bottom:1px solid #ff6161;">ⓘ '.$this->errorMessage.'</div>';
        }

        $widget .= '<textarea name="'.$this->name.'"';

        if (!empty($this->cols)){
            $widget .= ' cols="'.$this->cols.'"';
        }

        if (!empty($this->rows)){
            $widget .= ' rows="'.$this->rows.'"';
        }

        $widget .= '>';

        if (!empty($this->value)){
            $widget .= htmlspecialchars($this->value);
        }
        return $widget.'</textarea>';
    }

    public function setCols($cols){
        $cols = (int) $cols;
        if ($cols > 0){
            $this->cols = $cols;
        }
    }

    public function setRows($rows){
        $rows = (int) $rows;
        if ($rows > 0){
            $this->rows = $rows;
        }
    }

}

