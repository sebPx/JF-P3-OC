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

namespace src\site\backend\form;
 
use \NxsFram\form\formBuilder;

use \NxsFram\field\Field;
use \NxsFram\field\fieldText;
use \NxsFram\field\fieldHidden;
use \NxsFram\field\FieldSelect;
use \NxsFram\field\FieldRadio;
use \NxsFram\field\fieldTextarea;
use \NxsFram\field\fieldDate;

use \NxsFram\validator\validatorMaxLength;
use \NxsFram\validator\validatorNotNull;

class FormBuilderComment extends FormBuilder{
  
  public function build(){
    $this->form->add(new fieldHidden([
        'name' => 'id',
        'value' => 'none'
    ]));
    $this->form->add(new fieldHidden([
        'name' => 'author',
        'value' => $_SESSION['user']['login']
    ]));
    $this->form->add(new fieldHidden([
        'name' => 'requestType',
        'value' => 'form'
    ]));
    $this->form->add(new fieldHidden([
        'name' => 'event',
        'value' => 'comment'
    ]));
    $this->form->add(new fieldTextarea([
        'label' => 'Le contenu de votre commentaire',
        'name' => 'content',
        'option' => ["size" => "370px"],
        'rows' => 50,
        'cols' => 50,
        'validators' => [
          new validatorNotNull('Veuillez spécifier le contenu de l\'article.')
        ]    
    ]));
  }
}