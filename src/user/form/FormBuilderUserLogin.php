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
use \NxsFram\field\fieldPassword;
use \NxsFram\field\fieldHidden;
use \NxsFram\field\fieldTextarea;
use \NxsFram\validator\validatorMaxLength;
use \NxsFram\validator\validatorNotNull;

class FormBuilderUserLogin extends FormBuilder{
  
  public function build(){
    $this->form->add(new fieldHidden([
        'name' => 'requestType',
        'value' => 'form'
    ]));
    $this->form->add(new fieldHidden([
        'name' => 'event',
        'value' => 'userLogin'
    ]));
    $this->form->add(new fieldText([
        'label' => 'Identifiant',
        'name' => 'login',
        'maxLength' => 100,
        'validators' => [
          new validatorMaxLength('L\'identifiant spécifié est trop long (50 caractères maximum)', 100),
          new validatorNotNull('Merci de spécifier votre identifiant.')
        ]
    ]));
    $this->form->add(new fieldPassword([
        'label' => 'Mot de passe',
        'name' => 'pass',
        'maxLength' => 100,
        'validators' => [
          new validatorMaxLength('Le mot de passe est trop long (50 caractères maximum)', 100),
          new validatorNotNull('Merci de spécifier votre mot de passe.')
        ]
    ]));
  }
}