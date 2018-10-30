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

class urlFilter {
    private $_url;
    private $_urlFilter;
    private $_urlFiltered;
  
    public function __construct ($url){
        if (!empty($url)){
          $this->_url = substr($url, strlen(PUBLIC_URL));
          $this->_urlFiltered = $this->urlCharFilter($this->_url);

        }else{
          echo "Erreur d'url";
        }
    }

    public function urlCharFilter($value){
        $decode = rawurldecode($value);
        $decode = filter_var($decode, FILTER_SANITIZE_URL);
        
        $this->_urlFilter = $decode;
        return $this->_urlFilter;   
    }
    
    public function getUrlFiltered(){
        return $this->_urlFiltered;
    }
}