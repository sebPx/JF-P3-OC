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

class FormBuilderMailer extends FormBuilder{
  
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
        'value' => 'mailer'
    ]));

    $this->form->add(new fieldText([
        'label' => 'Nom d\'expéditeur',
        'name' => 'name',
        'maxLength' => 255,
        'validators' => [
          new validatorMaxLength('Le nom spécifié est trop long(255 caractères maximum)', 255),
          new validatorNotNull('Veuillez spécifier le nom d\'expéditeur.')
        ]
    ]));

    $this->form->add(new fieldText([
        'label' => 'Adresse e-mail d\'envoi',
        'name' => 'email',
        'maxLength' => 255,
        'validators' => [
          new validatorMaxLength('L\'adresse e-mail spécifiée est trop longue (255 caractères maximum)', 255),
          new validatorNotNull('Veuillez spécifier l\'adresse e-mail d\'envoi.')
        ]
    ]));

    $this->form->add(new FieldRadio([
        'label' => 'Type de SMTP',
        'name' => 'SMTP',
        'option' => ["PHP" => "php","Gmail" => "smtp.gmail.com","Hotmail" => "smtp.live.com","Wanadoo" => "smtp.wanadoo.fr"],
        'value' => 'PHP',
        'validators' => [
          new validatorNotNull('Erreur le champ est vide')
        ]
    ]));

    $this->form->add(new fieldText([
        'label' => 'Port',
        'name' => 'port',
        'maxLength' => 255,
        'validators' => [
          new validatorMaxLength('Le port spécifié est trop long (255 caractères maximum)', 255),
          new validatorNotNull('Veuillez spécifier le port.')
        ]
    ]));
 
    $this->form->add(new fieldText([
        'label' => 'Identifiant du compte e-mail',
        'name' => 'user',
        'maxLength' => 255,
        'validators' => [
          new validatorMaxLength('L\'identifiant spécifié est trop long (255 caractères maximum)', 255),
          new validatorNotNull('Veuillez spécifier l\'identifiant.')
        ]
    ]));

    $this->form->add(new fieldPassword([
        'label' => 'Mot de passe',
        'name' => 'pass',
        'maxLength' => 255,
        'validators' => [
          new validatorMaxLength('Le mot de passe spécifié est trop long (255 caractères maximum)', 255),
          new validatorNotNull('Veuillez spécifier le mot de passe.')
        ]
    ]));
  }
}