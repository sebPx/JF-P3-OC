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

namespace src\user\controller;
use \NxsFram\excpetion\ExcpetionHandler;
use \NxsFram\component\Controller;
use \NxsFram\component\Service;
use \src\user\model\ModelUser;
use \src\user\controller\Authenticator;
use \NxsFram\http\AjaxRequest;
use \src\user\form\FormBuilderLogin;
use \src\user\form\FormBuilderUserLogin;
use \src\user\form\FormBuilderRegister;

session_start();

class ControllerUser extends Controller{
	private $_user;
	private $_treatment;
	private $_ajax;
	private $_auth;
	private $_httpResponse;
	private $_passHandler;
	private $_login;
	private $_pass;
	private $_userFound;
	private $_part;


	public function __construct($part){
        parent::__construct('','');
       	$this->_user = new ModelUser;
       	$this->_treatment = new Service('');
        $this->_ajax = new AjaxRequest;
       	$this->_auth = new Authenticator;
       	$this->_httpResponse = new \NxsFram\http\HTTPResponse;
        $this->_passHandler = new PassHandler;
        $this->_part = $part;

        if (($this->httpRequest->postExists('action') && $this->httpRequest->postData('action') == "userLogin") || $this->httpRequest->postData('event') == "userLogin"){
           $this->userLogin();
        }

        if ($this->httpRequest->postExists('logout')){
           $this->logout();
        }

        if (($this->httpRequest->postExists('action') && $this->httpRequest->postData('action') == "userRegister") || $this->httpRequest->postData('event') == "userRegister"){
           $this->register();
        }
    }

	public function adminLogin(){
 		if ($this->httpRequest->postExists('login')) {
            $this->process('getByAdmin','backend/site/dashboard');

        }else{
			$form = new FormBuilderLogin();
			$form->build();
			$content['form'] = $form->form()->createView();
        	$get = $content;
	       	include "../src/user/view/portal/portal.php";
	       	$viewer = new \app\viewer();
	       	$viewer->releaseViews();
	       	return;
        }
	}
    
	public function userLogin(){
 		if ($this->httpRequest->postExists('login')) {
            $this->process('getByUser','frontend/site/profil');

        }else{
			$form = new FormBuilderUserLogin();
			$form->build();
			$this->setContent( array(
				"return" 	=> "form",
				"part" 		=> $this->_part,
				"view"		=> "login",
				"form"  	=> $form->form()->createView()
			));
			$this->returnJSON($this->_treatment->JSONEncode($this->content()));
        }		  
	}

	public function register(){
		$form = new FormBuilderRegister();
		$form->build();

 		if ($this->httpRequest->postExists('login')) {
	        if ($this->httpRequest->postData('pass') != "") {
		        $pass = md5($this->httpRequest->postData('pass'));
	            $confirm = md5($this->httpRequest->postData('confirm'));
		        
		        if ($pass == $confirm) {
		            $_POST['pass'] = md5($this->httpRequest->postData('pass'));
		        }else{
			        $this->setContent( array(
						"return"  => "error" , 
						"content" => "La confirmation du mot de passe n'est pas valide.", 
					));
					$this->returnJSON($this->_treatment->JSONEncode($this->content()));
				}
	        }

			if ($this->_user->isExist($this->httpRequest->postData('login'))) {
		        $this->setContent( array(
					"return"  => "error" , 
					"content" => "Ce nom d'utilisateur n'est pas disponible.", 
				));
				$this->returnJSON($this->_treatment->JSONEncode($this->content()));
			}
	
 			$this->_ajax->ajaxRequestHandler($form->form() ,$this->_user ,"user");
			$formRequest = $this->_ajax->formRequest("add", $this->_ajax->getResponse());

			if ($formRequest == '') {
				$this->setContent( array(
					"return" 	=> "success",
					"part" 		=> $this->_part,
					"response" 	=> "Votre compte à été créé avec succès, vous pouvez dès à présent vous connecter sur Noxus.fr !",
					"view" 		=> "register"
				));
				$this->returnJSON($this->_treatment->JSONEncode($this->content()));			
			}else{
				$this->setContent( array(
					"return" 	=> "formReturn",
					"part" 		=> $this->_part,
					"view"		=> "register",
					"form" 	 	=> $formRequest->createView()
				));
				$this->returnJSON($this->_treatment->JSONEncode($this->content()));
			}
        
        }else{	
			$this->setContent( array(
				"return" 	=> "form",
				"part" 		=> $this->_part,
				"view"		=> "register",
				"form"  	=> $form->form()->createView()
			));
			$this->returnJSON($this->_treatment->JSONEncode($this->content()));	 
		}
	}

    public function process($method, $redirect){
		$form = new FormBuilderLogin();
		$form->build();
		$this->_ajax->ajaxRequestHandler($form->form() ,$this->_user ,"user");
		$this->_login = $this->httpRequest->postData('login');		
		$formRequest = $this->_ajax->formRequest($method, $this->_login);

		if ($formRequest == '') {
			$this->_pass = $this->_passHandler->passEncode($this->httpRequest->postData('pass'));
			$this->_userFound = $this->_ajax->getResponse();

			if ($this->_login == $this->_userFound->getLogin() && $this->_pass == $this->_userFound->getPass()){         
	            $this->_auth->setAuthenticated($this->_user,$this->_userFound);
	        	$this->setContent( array(
					"return"  	=> "redirect" , 
					"link" 		=> "index.php?".$redirect, 
				));
				$this->returnJSON($this->_treatment->JSONEncode($this->content()));

	      	}else{
	        	$this->setContent( array(
					"return"  => "error" , 
					"content" => "L'identifiant ou le mot de passe est incorrect.", 
				));
				$this->returnJSON($this->_treatment->JSONEncode($this->content()));
	      	}

		}else{
			if ($method == "getByAdmin") {
				$this->setContent( array(
					"return" => "user" , 
					"view" 	 => "login" , 
					"form" 	 => $formRequest->createView()
				));
			}else{
				$this->setContent( array(
					"return" 	=> "formReturn",
					"part" 		=> $this->_part,
					"view"		=> "login",
					"form" 	 	=> $formRequest->createView()
				));
			}

			$this->returnJSON($this->_treatment->JSONEncode($this->content()));
		}
		exit;   
	}

    public function logout(){
    	if (!empty($_SESSION)) {
    		session_unset();
    		session_destroy();
    	}
    }

}

   
