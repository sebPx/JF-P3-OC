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
use \NxsFram\field\FieldSelect;
use \NxsFram\validator\validatorMaxLength;
use \NxsFram\validator\validatorNotNull;

class FormBuilderUser extends FormBuilder{
  
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
        'value' => 'user'
    ]));
    $this->form->add(new fieldHidden([
        'name' => 'pass',
        'value' => 'none'
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
    $this->form->add(new FieldSelect([
        'label' => 'Grade',
        'name' => 'level',
        'option' => ["Membre" => "1","Modérateur" => "3","Editeur" => "6","Administrateur" => "9","Developer" => "11"],
        'value' => 'Membre',
        'validators' => [
          new validatorNotNull('Erreur le champ est vide')
        ]
    ]));
  }
}