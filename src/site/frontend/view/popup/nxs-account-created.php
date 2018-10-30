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
?>
<script type="text/javascript" >
	$(document).ready(function () {
	//your code here 
		$(function() {	
			$(window.location.href.indexOf("ok=account-created")>-1).avgrund({
				width: 400, // max is 640px
				height: 150, // max is 350px
				showClose: true, // switch to 'true' for enabling close button
				showCloseText: 'x', // type your text for close button
				closeByEscape: true, // enables closing popup by 'Esc'..
				closeByDocument: false, // ..and by clicking document itself
				holderClass: '', // lets you name custom class for popin holder..
				overlayClass: '', // ..and overlay block
				enableStackAnimation: false, // another animation type
				onLoad: false,
				onBlurContainer: '', // enables blur filter for specified block
				openOnEvent: false, // set to 'false' to init on load
				setEvent: 'click', // use your event like 'mouseover', 'touchmove', etc.
				template:'<div class="top-pop-login"><h2>Bienvenue</h2></div>'+
							'<div id ="downlog" class="erreur_usr">'+
						 		'Votre compte est maintenant créé! veuillez valider votre email avant de vous connecter.</br>'+
						 	'<div class="reg-login">'+
						 		'<a href="">Recevoir un nouvel email ?</a>'+
							'</div>'+
						'</div>'
			});
		});
	});
</script>
