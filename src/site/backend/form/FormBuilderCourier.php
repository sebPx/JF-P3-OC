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

class FormBuilderCourier extends FormBuilder{
  
  public function build(){
    $this->form->add(new fieldHidden([
        'name' => 'requestType',
        'value' => 'email'
    ]));
    $this->form->add(new fieldHidden([
        'name' => 'event',
        'value' => 'email'
    ]));
    $this->form->add(new fieldText([
        'label' => 'Destinataire',
        'name' => 'receiver',
        'maxLength' => 255,
        'validators' => [
          new validatorMaxLength('Le destinataire spécifié est trop long (255 caractères maximum)', 255),
          new validatorNotNull('Veuillez spécifier le destinataire.')
        ]
    ]));
    $this->form->add(new fieldText([
        'label' => 'Sujet',
        'name' => 'subject',
        'maxLength' => 255,
        'validators' => [
          new validatorMaxLength('Le sujet spécifié est trop long (255 caractères maximum)', 255),
          new validatorNotNull('Veuillez spécifier le sujet.')
        ]
    ]));
    $this->form->add(new fieldTextarea([
        'label' => 'Contenu:',
        'name' => 'content',
        'option' => ["size" => "320px"],
        'rows' => 50,
        'cols' => 50,
        'validators' => [
          new validatorNotNull('Veuillez spécifier le contenu de l\'e-mail.')
        ]    
    ]));

  }
}