<?php 
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

namespace app;
use \NxsFram\http\httpRequest;
use \NxsFram\http\httpResponse;
use \NxsFram\exception\ExceptionHandler;
use \src\user\controller\ControllerUser;
class Router{
    
    private $_httpRequest;
    private $_httpResponse;
    private $_url;
    private $_instance;

    public function __construct (){
    // On filtre l'url courante avec UrlFilter
      $this->_httpRequest = new httpRequest;
      $this->_httpResponse = new httpResponse;
      $test = new ExceptionHandler;
      
      $this->_url = new urlFilter($this->_httpRequest->requestURI());
      $this->_url = $this->_url->getUrlFiltered();
      $this->route($this->_url);
    }

    public function route($url){ // On instancie le controller 
      $request = explode('?',$url);
      $names = explode('/',$request[1]);
      
      if (!empty($names[0])){
        $part       = $names[0];
        $controller = $names[1];
        $methode    = $names[2];
        if (isset($names[3])) {
           $var     = $names[3];
        }

        if (file_exists("../src/".$controller."/".$part."/controller/".$controller.".php")) {
            $controllerClass = '\src\\'.$controller.'\\'.$part.'\\controller\\'.$controller;
            $this->_instance = new $controllerClass($methode,$part);
            $this->_instance->$methode($var);
        
        }else if($request[1] == "site/auth/portal"){
          $auth = new ControllerUser;
          $auth->adminLogin();

        }else{
          echo "Erreur le controller n'existe pas !";
        }
      
      }else{
        $this->_httpResponse->redirect("index.php?frontend/site/home");
      }
    }
}