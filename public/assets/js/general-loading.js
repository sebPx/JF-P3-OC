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
  function loadingtext() {
    $("#bvn").fadeOut("0");
  }
  function loadingtext2() {
    $("#loading-text").fadeIn("0");
  }
  function loadingScreen1() {
    $(".loader").fadeOut("0");
    document.body.style.overflowY = "scroll";
  }
//3 Elle active le titre de bienvenue puis sa disparition, 
//l'apparition du second texte puis,
//la sortie du chargement 
  function loadingScreen() {  
    $("#bvn").fadeIn("0");
    setTimeout (loadingtext,0);
    setTimeout (loadingtext2,0);
    setTimeout (loadingScreen1,0);
  }
// 1 - on charge le contenu au démarrage de la page :
// 2 - on active la fontion loading screen
  $(window).on('load',loadingScreen);