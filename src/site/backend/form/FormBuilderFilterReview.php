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

class FormBuilderFilterReview extends FormBuilder{
  
  public function build(){
    $this->form->add(new fieldHidden([
        'name'        => 'requestType',
        'value'       => 'filter'
    ]));
    $this->form->add(new FieldSelect([
        'label'       => 'Filtrer par :',
        'name'        => 'getter',
        'option'      => [
                          "Identifiant"     => "id",
                          "Auteur"          => "author",
                          "Titre"           => "title",
                          "Categorie"       => "category",
                          "Tous"            => "all"
                    ],
        'value'       => 'all',
        'validators'  => [
          new validatorNotNull('Erreur le champ est vide')
        ]
    ]));
    $this->form->add(new fieldText([
        'label'       => 'Valeur du filtre :',
        'name'        => 'value',
        'maxLength'   => 200,
        'validators'  => [
          new validatorMaxLength('L\'auteur spécifié est trop long (50 caractères maximum)', 50)
        ]
    ]));
    $this->form->add(new FieldSelect([
        'label'       => 'Afficher par :',
        'name'        => 'display',
        'option'      => [
                          "Du plus récent au plus ancien"    => "asc",
                          "Du plus ancien au plus récent"     => "desc"      
                    ],
        'value'       => 'asc',
        'validators'  => [
          new validatorNotNull('Erreur le champ est vide')
        ]
    ]));
    $this->form->add(new FieldDate([
        'label'       => 'Date de départ :',
        'name'        => 'since',
        'value'       => '2018-01-01'
    ]));
    $this->form->add(new FieldDate([
        'label'       => 'Date de fin',
        'name'        => 'to'
    ]));
  }
}