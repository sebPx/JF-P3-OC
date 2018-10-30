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

class HTTPRequest{
  
  public function cookieData($key){
    return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
  }

  public function cookieExists($key){
    return isset($_COOKIE[$key]);
  }

  public function getData($key){
    return isset($_GET[$key]) ? $_GET[$key] : null;
  }

  public function getExists($key){
    return isset($_GET[$key]);
  }

  public function method(){
    return $_SERVER['REQUEST_METHOD'];
  }

  public function ajaxRequest(){
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
      return TRUE;
    }
  }

  public function postData($key){
    return isset($_POST[$key]) ? $_POST[$key] : null;
  }

  public function postContent(){
    return isset($_POST) ? $_POST : null;
  }

  public function postExists($key){
    return isset($_POST[$key]);
  }

  public function requestURI(){
    return $_SERVER['REQUEST_URI'];
  }

  public function isMethodPost(){
    if ($this->method() == 'POST') {
      return true;
    }else{
      return false;
    }
  }
}