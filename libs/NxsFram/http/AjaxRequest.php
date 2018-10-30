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

namespace NxsFram\http;
use \NxsFram\excpetion\ExcpetionHandler;
use \NxsFram\http\httpRequest;
use \NxsFram\form\Form;
use \NxsFram\component\Entity;
use \NxsFram\component\Model;
use \NxsFram\form\formHandler;

class AjaxRequest{
	
	protected $httpRequest;
	protected $requestType;
	protected $form;
	protected $model;
	protected $target;
	protected $entity;
	protected $postContent;
	protected $reponse;

	public function __construct(){
		$this->httpRequest = new httpRequest();
	}
	
	public function checkRequest(){
		if ($this->httpRequest->isMethodPost() && $this->httpRequest->postExists("requestType")){	
			if ($this->httpRequest->postData('requestType') == "form") {
				return $this->requestType = "form";
			
			}else if ($this->httpRequest->postData('requestType') == "event"){
				return $this->requestType = "event";
			
			}else if ($this->httpRequest->postData('requestType') == "filter"){
				return $this->requestType = "filter";
			
			}else{
				throw new ExcpetionHandler('Le type de requete demandé n\'pas valide !');
			}
		}
	}

	public function ajaxRequestHandler(Form $form, Model $model, $object){
		$this->setForm($form);
		$this->setModel($model);
		$this->setEntity($object);
		$this->setPostContent($this->httpRequest->postContent());
	}

	public function eventRequestHandler(Model $model){
		$this->setModel($model);
		$this->setPostContent($this->httpRequest->postContent());
	}

	public function formRequest($method, $target){
		$formHandler = new formHandler($this->form);
		if ($formHandler->process($this->postContent)) {
			$val = $this->entity;
			$entity = new $val($formHandler->getEntity());
			$this->response = $this->model->$method($entity, $target);
			return ;
		
		}else{
			return $formHandler->getFormInquired();	
		}
	}

	public function eventRequest($method, $target){
		$model = new $this->model();
		$response = $model->$method($target);
		return $response;	
	}

	public function requestType(){
		return $this->requestType;
	}

	public function form(){
		return $this->form;
	}

	public function model(){
		return $this->model;
	}

	public function entity(){
		return $this->entity;
	}

	public function postContent(){
		return $this->postContent;
	}

	public function setForm(Form $form){
		$this->form = $form;
	}

	public function setModel(Model $model){
		$this->model = $model;
	}

	public function setEntity($object){
		if ($object == 'user' || $object == 'level') {
    		$this->entity = "\src\\user\\entity\\Entity".ucfirst($object);
    		return;
		}else{
			$this->entity = "\src\\site\\entity\\Entity".ucfirst($object);
			return;
		}
	}

	public function setPostContent($postContent){
		$this->postContent = $postContent;
	}

	public function getResponse(){
		return $this->response;
	}
}