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

class FormBuilderCategory extends FormBuilder{
  
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
        'value' => 'category'
    ]));
    $this->form->add(new fieldText([
        'label' => 'Nom de la catégorie',
        'name' => 'name',
        'maxLength' => 255,
        'validators' => [
          new validatorMaxLength('Le nom de la catégorie spécifié est trop long (255 caractères maximum)', 255),
          new validatorNotNull('Veuillez spécifier le nom de la catégorie.')
        ]
    ]));
    $this->form->add(new fieldText([
        'label' => 'Description',
        'name' => 'alt',
        'maxLength' => 400,
        'validators' => [
          new validatorMaxLength('La description spécifiée est trop longue (400 caractères maximum)', 400),
          new validatorNotNull('Veuillez spécifier la description de la catégorie.')
        ]
    ]));
    $this->form->add(new FieldSelect([
        'label' => 'Definir en tant que catégorie par défaut :',
        'name' => 'base',
        'option' => ["Par défaut" => "true","Non" => "false"],
        'value' => 'false',
        'validators' => [
          new validatorNotNull('Erreur le champ est vide')
        ]
    ]));

  }
}