<?PHP
/*
	Template:       naxter
	Theme URL:      https://naxter.fr
	Author:         Sebastien P.
	Author URL:     https://naxter.fr/creator
	Description:    naxter engine production ©
	Contact:        contact@naxter.fr
	Version:        1.0
	License:        GNU General Public License v3 or later
	License URI:    http://www.gnu.org/licenses/gpl-3.0.html
	Text Domain:    naxter ©
	Mention légale: Textes codés et utilisés par naxter engine © ayant droit d'auteur sur le contenu suivant.
*/

namespace src\site\frontend\controller;

use \NxsFram\excpetion\ExcpetionHandler;
use \NxsFram\form\Form;
use \NxsFram\component\Controller;
use \NxsFram\component\Service;
use \src\user\controller\ControllerUser;
use \src\site\model\ModelNavigation;
use \src\site\model\ModelPost;
use \src\site\model\ModelComment;
use \src\site\model\ModelCourier;
use \src\site\model\ModelEvent;
use \src\user\model\ModelUser;
use \src\site\model\ModelCategory;
use \src\site\frontend\form\FormBuilderComment;
use \src\site\frontend\form\FormBuilderCourier;
use \src\user\form\FormBuilderInfo;
use \src\user\form\FormBuilderEmail;
use \src\user\form\FormBuilderPass;
use \src\site\backend\service\ServiceComment;

class Site extends Controller{
	private $_nav;
	private $_post;
	private $_treatment;

	public function __construct($method ,$part){
       	parent::__construct($method ,$part);
       	$user = new ControllerUser($part);
       	$this->_treatment = new Service("frontend");

       	if (!empty($this->method) && is_callable([$this, $this->method])) {
		    $this->setStructure( array ("load","header",$this->method,"footer"));	    
			$this->setContent( array(
				"title" 	=> ucfirst($this->method)." - Jean Forteroche"
			));	
		    $this->_nav = new ModelNavigation;
		    $this->_post = new ModelPost;

		}else{
		    throw new ExcpetionHandler('La methode est inexistante !');
		}	
    }

	Public function home(){
		$nav = $this->_nav->getAll();
		$post = $this->_post->getBy("title","Home",2);
		
		$this->addContent( array(
			"nav" 	=> $nav->getEntities(),
			"post" 	=> $post->getEntities(),
		));	
		return $this->release();
	}

	Public function error($code, $content){
		$nav = $this->_nav->getAll();
		$this->resetStructure();
		$this->setStructure( array ("load","header","error","footer"));
		$this->addContent( array(
			"nav" 		=> $nav->getEntities(),
			"error" 	=> 403,
			"content"	=> "Erreur ! Vous n'avez pas accès à cette section de naxter.fr"
		));	
		return $this->release();
		exit;
	}
	
	public function page($id){
		$nav = $this->_nav->getAll();	
		$post = $this->_post->getBy("id",$id,2);
		
		$this->addContent( array(
			"nav" 	=> $nav->getEntities(),
			"post" 	=>	$post->getEntities()
		));
		return $this->release();
	}

	public function article($id){		
		$model = new ModelComment;
		$form = new FormBuilderComment;
		$form->build();

		if ($this->httpRequest->ajaxRequest()) {
			$this->_treatment->setFormView("comment");
			$this->_treatment->setTemplate("comment");
			$this->_treatment->process($form->form(), $model, $model, "comment", $id);
			$this->addContent ($this->_treatment->getPayback());
			$this->returnJSON($this->_treatment->jsonEncode($this->content()));				
		
		}else{
			$nav = $this->_nav->getAll();	
			$post = $this->_post->getBy("id",$id,1);
			$commentList = $model->getBy("post",$id);

			$this->addContent( array(
				"nav" 		=> $nav->getEntities(),
				"post" 		=> $post->getEntities(),
				"comment"	=> $commentList->getEntities(),
				"form"		=> $form->form()->createView()
			));
			return $this->release();
		}
	}

	public function category($id){
		$nav = $this->_nav->getAll();
		$cat = new ModelCategory;
		$var = $cat->getBy("name", $id);	
		$cats = $cat->getAll();
		
		$post = $this->_post->getBy("category",$id,1);
		$items = $this->_post->getAll(1);

		$this->addContent( array(
			"nav" 		=> $nav->getEntities(),
			"post" 		=> $post->getEntities(),
			"cat" 		=> $var->getEntities(),
			"allCat" 	=> $cats->getEntities(),
			"items" 	=> $items->getEntities()
		));
		return $this->release();
	}

	public function calendar(){
		$nav = $this->_nav->getAll();
		$event = new ModelEvent;
		$var = $event->getAll();	

		$this->addContent( array(
			"nav" 	=> $nav->getEntities(),
			"event" => $var->getEntities()
		));
		return $this->release();
	}

	public function repertory(){
		$nav = $this->_nav->getAll();
		$cat = new ModelCategory;
		$var = $cat->getAll();	

		$this->addContent( array(
			"nav" 	=> $nav->getEntities(),
			"cat" 	=> $var->getEntities()
		));
		return $this->release();
	}

	public function event($id){
		$model = new ModelComment;
		$form = new FormBuilderComment;
		$form->build();

		if ($this->httpRequest->ajaxRequest()) {
			$this->_treatment->setFormView("comment");
			$this->_treatment->setTemplate("comment");
			$this->_treatment->process($form->form(), $model, $model, "comment", $id);
			$this->addContent ($this->_treatment->getPayback());
			$this->returnJSON($this->_treatment->jsonEncode($this->content()));				
		
		}else{
			$nav = $this->_nav->getAll();
			$event = new ModelEvent;
			$var = $event->getBy("id", $id);
			$commentList = $model->getBy("post",$id);	

			$this->addContent( array(
				"nav" 		=> $nav->getEntities(),
				"event" 	=> $var->getEntities(),
				"comment"	=> $commentList->getEntities(),
				"form"		=> $form->form()->createView()
			));
			return $this->release();
		}
	}

	
	public function profil($attribute){
		if (!isset($_SESSION['user']['login'])) {
			return $this->error(403,"Ceci est une zone restreinte, vous n'avez pas l'autorisation d'accéder à cette page.");	
		}else{
			$nav = $this->_nav->getAll();	
			$model = new ModelUser;
			$user = $model->getBy("login",$_SESSION['user']['login']);
			
			$this->addContent( array(
				"nav" 	=> $nav->getEntities(),
				"user" 	=> $user->getEntities()
			));
			
			if (isset($attribute)) {
				switch ($attribute) {
					case 'info':
						$form = new FormBuilderInfo;
						break;
					case 'email':
						$form = new FormBuilderEmail;
						break;
					case 'pass':
						$form = new FormBuilderPass;
						break;		
				}
				$form->build();					
					$this->addContent( array(
					"link"	=> $attribute,
					"form" 	=> $form->form()->createView()
				));						
			}
			return $this->release();
		}	
	}

	public function contact(){
		$model = new ModelCourier;
		$form = new FormBuilderCourier;
		$form->build();
		
		if ($this->httpRequest->ajaxRequest()) {
			$this->_treatment->setFormView("courier");
			$this->_treatment->setTemplate("courier");
			$this->_treatment->process($form->form(), $model, $model, "courier", '');
			$this->addContent ($this->_treatment->getPayback());
			$this->returnJSON($this->_treatment->jsonEncode($this->content()));				
			return;
		}else{
			$nav = $this->_nav->getAll();	

			$this->addContent( array(
				"nav" 		=> $nav->getEntities(),
				"form"		=> $form->form()->createView(),
			));
			
		}		
		
		if (isset($_SESSION['user'])) {
			$user = new ModelUser;
			$entity = $user->getBy("login",$_SESSION['user']['login']);
			$this->addContent( array(
				"userID"	=> $entity->getEntities()
			));	
		}	
		return $this->release();
	}
}
