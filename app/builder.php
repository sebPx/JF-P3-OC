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

class Builder{
    private $_part;
    
    public function __construct($part){
        $this->_part = $part;
    }
   
    public function buildStructure($structure,$content){        
        if (!empty($structure)) {
            $view = new viewer($this->_part);
            foreach ($structure as $key => $value) { 
                $view->addView("inc",$value,$content);
            }
            $view->releaseViews();//on libere la pile de vues et on nettoie le buffer
        }   
    }

}