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


$(document).ready(function() {
  function loadingScreen1() {
    $(".loader-admin").fadeOut("100");
  }
  function loadingScreen() {  
    setTimeout (loadingScreen1,100);
  }
  $(window).on('load',loadingScreen);
});