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

class Viewer{
      private $_include;
      private $_var;
      private $_controller;

      public function __construct($part){
        if (!empty($part)) {
          $this->_controller = $part;
        }
        
      }
    //Hydratation, assignation des variable suivant l'instanciation d'un objet
      public function addView($path = null, $name = null, $var = []){  
        if (!empty($name)){
          $view['data'] = array (
            'path'  => SRC_PATH.$this->_controller."/view/".$path."/",
            'file'  => $name.".php",
          );    

          if (file_exists($view['data']['path'].$view['data']['file'])) {
            $this->_include = $view['data']['path'].$view['data']['file'];
            $get = $var;
            require $this->_include;
 
          }else {
            echo "Vue inexistante !";
          } 
        
        }else{
          echo "Erreur de variable";
        }
      }
    
  	 public function releaseViews(){
  	    ob_start();
        $content = ob_get_clean();
  	 }
}