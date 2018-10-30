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

namespace src\user\form;

use \NxsFram\form\formBuilder;
use \NxsFram\field\Field;
use \NxsFram\field\fieldText;
use \NxsFram\field\fieldDate;
use \NxsFram\field\fieldHidden;
use \NxsFram\field\fieldTextarea;
use \NxsFram\field\fieldPassword;
use \NxsFram\validator\validatorMaxLength;
use \NxsFram\validator\validatorNotNull;

class FormBuilderInfo extends FormBuilder{
  
  public function build(){
    $this->form->add(new fieldHidden([
        'name' => 'id',
        'value' => 'none'
    ])); 
    $this->form->add(new fieldHidden([
        'name' => 'requestType',
        'value' => 'form'
    ]));
    $this->form->add(new fieldHidden([
        'name' => 'event',
        'value' => 'userCore'
    ]));
    $this->form->add(new fieldHidden([
        'name' => 'method',
        'value' => 'info'
    ]));
    $this->form->add(new fieldText([
        'label' => 'Nom',
        'name' => 'surname',
        'maxLength' => 255,
        'validators' => [
          new validatorMaxLength('Le nom spécifié est trop long (255 caractères maximum)', 255),
          new validatorNotNull('Merci de spécifier votre nom.')
        ]
    ]));
    $this->form->add(new fieldText([
        'label' => 'Prénom',
        'name' => 'name',
        'maxLength' => 255,
        'validators' => [
          new validatorMaxLength('Le prénom spécifié est trop long (255 caractères maximum)', 255),
          new validatorNotNull('Merci de spécifier votre prénom.')
        ]
    ]));
  }
}