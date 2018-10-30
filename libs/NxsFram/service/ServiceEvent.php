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
use \src\site\model\ModelContact;
use \src\site\backend\form\FormBuilderFilterReview;
use \src\site\backend\form\FormBuilderContact;
use \src\site\backend\form\FormBuilderCategory;
use \src\site\backend\form\FormBuilderCourier;
use \src\user\form\FormBuilderUser;
use \src\user\model\ModelUser;
use \src\user\form\FormBuilderLevel;
use \src\user\model\ModelLevel;
use \src\site\model\ModelCategory;

class ServiceEvent extends Service{

	public function core(){
		switch ($this->_httpRequest->postData('action')) {				
			case 'add':
					return $this->payback (array( 
						"return" 	=> "form",
						"part" 		=> $this->_part,
						"view"		=> $this->_formView,
						"form"  	=> $this->_form->createView()
					));
			break;
			case ($this->_httpRequest->postData('action') == 'archive' || $this->_httpRequest->postData('action') == 'trash'):
					$method = ($this->_httpRequest->postData('action') == 'archive') ? "getAllArchive" : "getAllTrash";
					$target = $this->_model->$method($this->_attribute);
					$filter = new FormBuilderFilterReview;
					$filter->build();
					return $this->payback (array( 
						"return" 	=> "review",
						"part" 		=> $this->_part,
						"view"		=> $this->_httpRequest->postData('action'),
						"post"		=> array_reverse($target->getEntities()),
						"module"	=> $this->_template,
						"form"		=> $filter->form()->createView()
					));
			break;
			case ($this->_httpRequest->postData('action') == 'contact' || $this->_httpRequest->postData('action') == 'email' || $this->_httpRequest->postData('action') == 'category' || $this->_httpRequest->postData('action') == 'users' || $this->_httpRequest->postData('action') == 'level'):
					switch ($this->_httpRequest->postData('action')) {
						case 'contact':
							$content = new FormBuilderContact;
							$model = new ModelContact;
							$target = $model->getAll();
							break;						
						case 'email':
							$content = new FormBuilderCourier;
							$model = new ModelContact;
							$target = $model->getAll();	
							break;
						case 'category':
							$content = new FormBuilderCategory;
							$model = new ModelCategory;
							$target = $model->getAll();	
							break;
						case 'users':
							$content = new FormBuilderUser;
							$model = new ModelUser;
							$target = $model->getAllUsers();
							break;
						case 'level':
							$content = new FormBuilderLevel;
							$model = new ModelLevel;
							$target = $model->getAll();	
							break;							
					}
					$content->build();
					
					$filter = new FormBuilderFilterReview;
					$filter->build();
					return $this->payback (array( 
						"return" 	=> "review",
						"part" 		=> $this->_part,
						"view"		=> $this->_httpRequest->postData('action'),
						"post"		=> array_reverse($target->getEntities()),
						"module"	=> $this->_template,
						"filter"	=> $filter->form()->createView(),
						"form"		=> $content->form()->createView()
					));
			break;
			case 'reply':
					$target = $this->_model->getBy("id",$this->_httpRequest->postData('target'));
					return $this->payback (array( 
						"return" 	=> "form",
						"part" 		=> $this->_part,
						"view"		=> $this->_formView,
						"form"  	=> $this->_form->createView(),
						"post" 		=> $target->getEntities()
					));
			break;		
			case 'edit':
					$returnVar = (($this->_template != $this->_module || $this->_module == "user") && $this->_template != "page") ? "formReturn" : "form";	
					$entity = $this->_model->getBy("id",$this->_httpRequest->postData('target'),$this->_attribute);
					$formReturned = $this->_form->formInquire($entity);
					return $this->payback (array( 
						"return" 	=> $returnVar,
						"edit"		=> "edit",
						"part" 		=> $this->_part,
						"view"		=> $this->_formView,
						"form"  	=> $formReturned->createView(),
						"post"		=> $entity->getEntities()
					));
			break;		
			case 'delete':
					$this->_ajax->eventRequest($this->_httpRequest->postData('action'),$this->_httpRequest->postData('target'));
					$list = $this->_modelTemplate->getAll($this->_attribute);
					return $this->payback (array( 
						"return" 	=> "success",
						"part" 		=> $this->_part,
						"response" 	=> "La suppression a bien été effectuée.",
						"view" 		=> $this->_template, 
						"post" 		=> $list->getEntities()
					));		
			break;
			case 'erase':
					$this->_ajax->eventRequest($this->_httpRequest->postData('action'),$this->_httpRequest->postData('target'));
					$list = $this->_modelTemplate->getAll($this->_attribute);
					return $this->payback (array( 
						"return" 	=> "success",
						"part" 		=> $this->_part,
						"response" 	=> "La suppression définitive a bien été effectuée.",
						"view" 		=> $this->_template, 
						"post" 		=> $list->getEntities()
					));		
			break;
			case 'restaure':
					$this->_ajax->eventRequest($this->_httpRequest->postData('action'),$this->_httpRequest->postData('target'));
					$list = $this->_model->getAll($this->_attribute);
					return $this->payback (array( 
						"return" 	=> "success",
						"part" 		=> $this->_part,
						"response" 	=> "La restauration a bien été effectuée.",
						"view" 		=> $this->_template, 
						"post" 		=> $list->getEntities()
					));		
			break;
			case ($this->_httpRequest->postData('action') == 'check' || $this->_httpRequest->postData('action') == 'approve' || $this->_httpRequest->postData('action') == 'classify'):
					$this->_ajax->eventRequest($this->_httpRequest->postData('action'),$this->_httpRequest->postData('target'));
					$list = $this->_model->getAll($this->_attribute);
					$object = $this->_model->getBy("id", $this->_httpRequest->postData('target'));
					return $this->payback (array( 
						"return" 	=> "success",
						"part" 		=> $this->_part,
						"view" 		=> $this->_template,
						"object" 	=> $object->getEntities(),
						"post" 		=> $list->getEntities()
					));		
			break;
			case ($this->_httpRequest->postData('action') == 'unCheck' || $this->_httpRequest->postData('action') == 'unApprove' || $this->_httpRequest->postData('action') == 'unClassify'):
					$this->_ajax->eventRequest($this->_httpRequest->postData('action'),$this->_httpRequest->postData('target'));
					$list = $this->_model->getAll($this->_attribute);
					return $this->payback (array( 
						"return" 	=> "success",
						"part" 		=> $this->_part,
						"view" 		=> $this->_template, 
						"post" 		=> $list->getEntities()
					));		
			break;	
			case 'load':
					$list = $this->_model->getAll($this->_attribute);
					return $this->payback (array( 
						"return" 	=> "load", 
						"view" 		=> $this->_template,
						"module" 	=> $this->_template,
						"post" 		=> $list->getEntities()
					));	
			break;
			case 'update':
					$updateResponse = $this->_ajax->eventRequest($this->_httpRequest->postData('event'),$this->_httpRequest->postData('target'));
					return $this->payback (array(
						"return"	=> "update" ,
						"content"  	=> $updateResponse['content'],
						"target"  	=> $updateResponse['target']
					));
				break;
		}
	}

}

