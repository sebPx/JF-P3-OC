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

namespace NxsFram\service;
use \NxsFram\component\Service;

class ServiceForm extends Service{

	public function core(){	
		switch ($this->_httpRequest->postData('id')) {
			case 'none':
				$formRequest = $this->_ajax->formRequest('add', $this->_attribute);
			break;		
			default:
				$formRequest = $this->_ajax->formRequest('update', $this->_httpRequest->postData('id'));
			break;
		}

		$list = $this->_modelTemplate->getAll($this->_attribute);
		if ($formRequest == '') {
			return $this->payback (array( 
				"return" 	=> "success",
				"part" 		=> $this->_part,
				"response" 	=> "L'enregistrement a bien été éffectué.", 
				"view"	 	=> $this->_template, 
				"post" 		=> $list->getEntities()
			));
				
		}else{
			return $this->payback (array( 
				"return" 	=> "formReturn",
				"part" 		=> $this->_part,
			 	"view" 		=> $this->_formView,
				"form" 		=> $formRequest->createView()
			 ));
		}		
	}
}
