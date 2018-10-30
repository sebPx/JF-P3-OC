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
use \NxsFram\field\fieldHidden;
use \NxsFram\field\fieldTextarea;
use \NxsFram\field\fieldPassword;
use \NxsFram\validator\validatorMaxLength;
use \NxsFram\validator\validatorNotNull;

class FormBuilderRegister extends FormBuilder{
  
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
        'value' => 'userRegister'
    ]));
    $this->form->add(new fieldHidden([
        'name' => 'level',
        'value' => '1'
    ]));
    $this->form->add(new fieldText([
        'label' => 'Identifiant',
        'name' => 'login',
        'maxLength' => 50,
        'validators' => [
          new validatorMaxLength('L\'Identifiant spécifié est trop long (50 caractères maximum)', 50),
          new validatorNotNull('Merci de spécifier votre identifiant.')
        ]
    ]));

    $this->form->add(new fieldText([
        'label' => 'Adresse e-mail',
        'name' => 'email',
        'maxLength' => 255,
        'validators' => [
          new validatorMaxLength('L\'adresse e-mail spécifiée est trop longue (255 caractères maximum)', 255),
          new validatorNotNull('Merci de spécifier votre adresse e-mail.')
        ]
    ]));

    $this->form->add(new fieldPassword([
        'label' => 'Mot de passe',
        'name' => 'pass',
        'maxLength' => 255,
        'validators' => [
          new validatorMaxLength('Le mot de passe spécifié est trop long (255 caractères maximum)', 255),
          new validatorNotNull('Merci de spécifier votre mot de passe.')
        ]
    ]));

    $this->form->add(new fieldPassword([
        'label' => 'Confirmation du mot de passe',
        'name' => 'confirm',
        'maxLength' => 255,
        'validators' => [
          new validatorMaxLength('Le mot de passe de confirmation spécifié est trop long (255 caractères maximum)', 255),
          new validatorNotNull('Merci de confirmer votre mot de passe.')
        ]
    ]));
  }
}