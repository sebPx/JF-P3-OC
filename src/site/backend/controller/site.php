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

namespace src\site\backend\controller; 
use \NxsFram\component\Controller;
use \NxsFram\component\Service;
use \NxsFram\excpetion\ExcpetionHandler;
use \NxsFram\form\Form;
use \NxsFram\http\AjaxRequest;
use \NxsFram\uploader\Uploader;

use \src\site\model\ModelLog;
use \src\site\model\ModelStats;
use \src\site\model\ModelPost;
use \src\site\model\ModelEvent;
use \src\site\model\ModelMedia;
use \src\site\model\ModelNotification;
use \src\site\model\ModelComment;
use \src\site\model\ModelContact;
use \src\site\model\ModelCourier;
use \src\user\model\ModelUser;
use \src\site\model\ModelDesign;
use \src\site\model\ModelNavigation;
use \src\site\model\ModelSecurity;
use \src\site\model\ModelSetting;
use \src\site\model\ModelStat;
use \src\site\model\ModelIndex;
use \src\user\model\ModelLevel;
use \src\site\model\ModelCategory;

use \src\user\controller\ControllerUser;
use \src\user\controller\Authenticator;
use \src\site\backend\form\FormBuilderArticle;
use \src\site\backend\form\FormBuilderPage;
use \src\site\backend\form\FormBuilderEvent;
use \src\site\backend\form\FormBuilderMedia;
use \src\site\backend\form\FormBuilderComment;
use \src\site\backend\form\FormBuilderCourier;
use \src\site\backend\form\FormBuilderContact;
use \src\site\backend\form\FormBuilderCategory;
use \src\user\form\FormBuilderUser;
use \src\user\form\FormBuilderLevel;
use \src\site\backend\form\FormBuilderNavigation;

class Site extends Controller{
	private $_user;
	private $_auth;
	private $_ajax;
	private $_treatment;
	private $_list;
	private $_index;

//Constructeur 	--
	public function __construct($method ,$part){      		
       	$this->_user = new ControllerUser($part);
       	$this->_auth = new Authenticator;
       	$this->_ajax = new AjaxRequest;
       	$this->_treatment = new Service("backend");
       	
       	if ($this->_auth->isAuthenticated()) {
       		parent::__construct($method ,$part); 
	       	if (!empty($this->method) && is_callable([$this, $this->method])) { 
			    $this->setStructure( array ("load","header","aside",$this->method,"footer"));
			
			}else{
			    throw new ExcpetionHandler('La methode est inexistante !');
			}
       	
       	}else{ 
       		$this->_httpResponse = new \NxsFram\http\httpResponse();
            $this->_httpResponse->redirect("index.php?frontend/site/home#_Error403");
       	}	
    }
//Dashboard 	--
	Public function dashboard(){
       	$level = new ModelLevel;
       	$values = $level->getAll();
       	$this->setContent( array( 
       		"sid" 		=> $_SESSION,
       		"level" 	=> $values->getEntities(),
       		"title" 	=> "Dashboard - Naxter"
       	));
		
		if ($this->httpRequest->postExists("requestType") && isset($_FILES["uploadCase"])) {
			$this->media();
		}
		
		if ($this->httpRequest->ajaxRequest() && $this->httpRequest->postExists("event")){
			$method = $this->httpRequest->postData("event");
			if (is_callable([$this, $method])){
				$this->$method();	
				$this->returnJSON($this->_treatment->jsonEncode($this->content()));	
			}else{ 
				throw new ExcpetionHandler('La methode est inexistante !'); 
			}
		}else{
			$this->home();	
			return $this->release();
		}
	}

//Methods 		--
	//Home 		--
		Public function home(){
			$this->_index = new ModelIndex;
			$indexList = $this->_index->getAll();
			$this->addContent(array(
				"index" 	=> $indexList->getEntities()
			));

			$post = new ModelPost;
			$log = new ModelLog;
			$stat = new ModelStat;
			$post = $post->getLatest(2);
			$logList = $log->getLatest(25);
			$statList = $stat->getAll();
				
			$this->addContent( array(
				"return" 	=> "load",
				"view"  	=> "home",
				"post" 		=> $post->getEntities(),
				"stat" 		=> $statList->getEntities(),
				"log" 		=> $logList->getEntities()
			));
		}
	//Article 	--
		Public function article(){
			$postType = 1;
			$model = new ModelPost;
			$form = new FormBuilderArticle;
			$form->build();

			$media = new ModelMedia;
			$mediaList = $media->getAll();

			$category = new ModelCategory;
			$catList = $category->getAll();
			$this->addContent( array( 
				"cat" 		=> $catList->getEntities(),
				"media" 	=> $mediaList->getEntities()
			));

			$this->_treatment->setFormView("formPost");
			$this->_treatment->setTemplate("article");
			$this->_treatment->process($form->form(), $model, $model, "post", $postType);
			$this->addContent ($this->_treatment->getPayback());
			return;
		}
	//Page 	--
		Public function page(){
			$postType = 2;
			$model = new ModelPost;
			$form = new FormBuilderPage;
			$form->build();

			$media = new ModelMedia;
			$mediaList = $media->getAll();

			$this->addContent( array( 
				"media" 	=> $mediaList->getEntities()
			));

			$this->_treatment->setFormView("formPost");
			$this->_treatment->setTemplate("page");
			$this->_treatment->process($form->form(), $model, $model, "post", $postType);
			$this->addContent ($this->_treatment->getPayback());
			return;
		}
	//Event	--
		Public function event(){
			$model = new ModelEvent;
			$form = new FormBuilderEvent;
			$form->build();

			$this->_treatment->setFormView("formEvent");
			$this->_treatment->setTemplate("event");
			$this->_treatment->process($form->form(), $model, $model, "event", '');
			$this->addContent ($this->_treatment->getPayback());
			return;
		}
	//Media		--
		Public function media(){
			$model = new ModelMedia;
			$form = new FormBuilderMedia;
			$form->build();
		
			if ($this->httpRequest->postExists("requestType") && isset($_FILES["uploadCase"])) {
					$uploader = new Uploader;
					if ($this->httpRequest->postExists("edit")) {
						$this->_treatment->setFormView("formMedia");
						$this->_treatment->setTemplate("media");
						$this->_treatment->process($form->form(), $model, $model, "media", '');
						return;
					}else{
						$uploader->initUpload();
						$uploader->isValid();
						
						$response = $uploader->execute();
						$file = $model->isExist($_FILES["uploadCase"]['name']);
						$this->addContent ( array( "response" 	=> $uploader->getMsg()));
						
						if ($response == "true" && $file == "false") {
							$this->_treatment->setFormView("formMedia");
							$this->_treatment->setTemplate("media");
							$this->_treatment->process($form->form(), $model, $model, "media", '');
							return;
						}						
					}
			}else{
				$this->_treatment->setFormView("formMedia");
				$this->_treatment->setTemplate("media");
				$this->_treatment->process($form->form(), $model, $model, "media", '');
				$this->addContent ($this->_treatment->getPayback());			
				return;				
			}			
		}
	//Notification	--
		Public function notification(){
			$this->_index = new ModelIndex;
			$indexList = $this->_index->getAll();
			$this->addContent(array(
				"index" 	=> $indexList->getEntities()
			));

			$model = new ModelNotification;

			$this->_treatment->setFormView("formNotification");
			$this->_treatment->setTemplate("notification");
			$this->_treatment->eventProcess($model, $model, "notification");
			$this->addContent ($this->_treatment->getPayback());
			return;
		}
	//Comment 	--
		Public function comment(){
			$model = new ModelComment;
			$form = new FormBuilderComment;
			$form->build();

			$this->_treatment->setFormView("formComment");
			$this->_treatment->setTemplate("comment");
			$this->_treatment->process($form->form(), $model, $model, "comment", '');
			$this->addContent ($this->_treatment->getPayback());
			return;
		}
	//Contact	--
		Public function courier(){
			$model = new ModelCourier;
			$form = new FormBuilderCourier;
			$form->build();

			$this->_treatment->setFormView("formCourier");
			$this->_treatment->setTemplate("courier");
			$this->_treatment->process($form->form(), $model, $model, "courier", '');
			$this->addContent ($this->_treatment->getPayback());
			return;
		}
	//Contact	--
		Public function user(){
			$model = new ModelUser;
			$modelLevel = new ModelLevel;
			$form = new FormBuilderUser;
			$form->build();

			$this->_treatment->setFormView("formUser");
			$this->_treatment->setTemplate("user");
			$this->_treatment->process($form->form(), $model, $model, "user", '');
			$this->addContent ($this->_treatment->getPayback());
			return;
		}
	//Contact	--
		Public function navigation(){
			$model = new ModelNavigation;
			$form = new FormBuilderNavigation;
			$form->build();

			if ($this->httpRequest->postData("action") == "add" || $this->httpRequest->postData("action") == "edit") {
				$article = new ModelPost;
				$page = new ModelPost;
				$event = new ModelEvent;
				$cat = new ModelCategory;

				$allArticle = $article->getAll(1);
				$allPage = $page->getAll(2);
				$allEvent = $event->getAll();
				$allCat = $cat->getAll();

				$items =  array(
					"Articles" 		=> $allArticle->getEntities(),
					"Pages" 		=> $allPage->getEntities(),
					"Evènements" 	=> $allEvent->getEntities(),
					"Catégories" 	=> $allCat->getEntities()
				);
				
				$this->addContent( array( 
					"items" 		=> $items
				));
			}

			$this->_treatment->setFormView("formNavigation");
			$this->_treatment->setTemplate("navigation");
			$this->_treatment->process($form->form(), $model, $model, "navigation", '');
			$this->addContent ($this->_treatment->getPayback());
			return;
		}

	//Contact	--
		Public function contact(){
			$model = new ModelContact;
			$modelTemplate = new ModelCourier;
			$form = new FormBuilderContact;
			$form->build();

			$this->_treatment->setFormView("formContact");
			$this->_treatment->setTemplate("courier");
			$this->_treatment->process($form->form(), $model, $modelTemplate, "contact", '');
			$this->addContent ($this->_treatment->getPayback());
			return;
		}

	//Contact	--
		Public function email(){
			$model = new ModelContact;
			$modelTemplate = new ModelCourier;
			$form = new FormBuilderCourier;
			$form->build();

			$this->_treatment->setFormView("formContact");
			$this->_treatment->setTemplate("courier");
			$this->_treatment->process($form->form(), $model, $modelTemplate, "email", '');
			$this->addContent ($this->_treatment->getPayback());
			return;
		}

		Public function level(){
			$model = new ModelLevel;
			$modelTemplate = new ModelUser;
			$form = new FormBuilderLevel;
			$form->build();

			$this->_treatment->setFormView("formLevel");
			$this->_treatment->setTemplate("user");
			$this->_treatment->process($form->form(), $model, $modelTemplate, "level", '');
			$this->addContent ($this->_treatment->getPayback());
			return;
		}

		Public function category(){
			$model = new ModelCategory;
			$modelTemplate = new ModelPost;
			$form = new FormBuilderCategory;
			$form->build();

			$this->_treatment->setFormView("formCategory");
			$this->_treatment->setTemplate("article");
			$this->_treatment->process($form->form(), $model, $modelTemplate, "category", 1);
			$this->addContent ($this->_treatment->getPayback());
			return;
		}

		Public function setting(){
			$this->addContent( array(
				"return" 	=> "load",
				"view"  	=> "building",
				"module"	=> "setting"
			));
			return;
		}

		Public function design(){
			$this->addContent( array(
				"return" 	=> "load",
				"view"  	=> "building",
				"module"	=> "design"
			));
			return;
		}

		Public function security(){
			$this->addContent( array(
				"return" 	=> "load",
				"view"  	=> "building",
				"module"	=> "security"
			));
			return;
		}
}