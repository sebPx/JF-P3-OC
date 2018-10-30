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

class FormBuilderArticle extends FormBuilder{
  
  public function build(){
    $this->form->add(new fieldHidden([
        'name' => 'id',
        'value' => 'none'
    ]));
    $this->form->add(new fieldHidden([
        'name' => 'image',
        'value' => 'default.jpg'
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
        'value' => 'article'
    ]));
    $this->form->add(new fieldText([
        'label' => 'Titre de l\'article',
        'name' => 'title',
        'maxLength' => 200,
        'validators' => [
          new validatorMaxLength('Le titre spécifié est trop long (255 caractères maximum)', 255),
          new validatorNotNull('Veuillez spécifier le titre de l\'article.')
        ]
    ]));
    $this->form->add(new fieldText([
        'label' => 'Description',
        'name' => 'resume',
        'maxLength' => 255,
        'validators' => [
          new validatorMaxLength('La description spécifiée est trop longue (255 caractères maximum)', 255),
          new validatorNotNull('Veuillez spécifier la description de l\'article.')
        ]
    ]));
    $this->form->add(new fieldTextarea([
        'label' => 'Le contenu de votre article',
        'name' => 'content',
        'option' => ["size" => "370px"],
        'rows' => 50,
        'cols' => 50,
        'validators' => [
          new validatorNotNull('Veuillez spécifier le contenu de l\'article.')
        ]    
    ]));
    $this->form->add(new FieldSelect([
        'label' => 'Statut de l\'article:',
        'name' => 'state',
        'option' => ["Publier" => "true","Brouillon" => "false"],
        'value' => 'Publier',
        'validators' => [
          new validatorNotNull('Erreur le champ est vide')
        ]
    ]));
    $this->form->add(new FieldSelect([
        'label' => 'Visibilitée de l\'article:',
        'name' => 'view',
        'option' => ["Public" => "true","privé" => "false"],
        'value' => 'Public',
        'validators' => [
          new validatorNotNull('Erreur le champ est vide')
        ]
    ]));
    $this->form->add(new FieldSelect([
        'label' => 'Activation des commentaires',
        'name' => 'comment',
        'option' => ["Activer" => "true","Désactiver" => "false"],
        'value' => 'Activer',
        'validators' => [
          new validatorNotNull('Erreur le champ est vide')
        ]
    ]));
    $this->form->add(new FieldDate([
        'label' => 'Date de publication:',
        'name' => 'apply'
    ]));
  }
}