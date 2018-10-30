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

			$("#addPostBtn").avgrund({
				width: 1400, // max is 640px
				height: 650, // max is 350px
				showClose: true, // switch to 'true' for enabling close button
				showCloseText: 'x', // type your text for close button
				closeByEscape: true, // enables closing popup by 'Esc'..
				closeByDocument: false, // ..and by clicking document itself
				holderClass: '', // lets you name custom class for popin holder..
				overlayClass: '', // ..and overlay block
				enableStackAnimation: false, // another animation type
				onLoad: false,
				onBlurContainer: '', // enables blur filter for specified block
				openOnEvent: true, // set to 'false' to init on load
				setEvent: 'click', // use your event like 'mouseover', 'touchmove', etc.
				template:'<div class="top-pop-login"><h2>Créez votre article :</h2></div>'+
						 	'<div class="admin-popup-content">'+
							'</div>'+
							'<script type="text/javascript">'+
								'$(\'.admin-popup-content\').load(\'../nxs-admin/pages/nxs-add-post.php\');'+
							'</script>'
			});

			$("#addPageBtn").avgrund({
				width: 1400, // max is 640px
				height: 650, // max is 350px
				showClose: true, // switch to 'true' for enabling close button
				showCloseText: 'x', // type your text for close button
				closeByEscape: true, // enables closing popup by 'Esc'..
				closeByDocument: false, // ..and by clicking document itself
				holderClass: '', // lets you name custom class for popin holder..
				overlayClass: '', // ..and overlay block
				enableStackAnimation: false, // another animation type
				onLoad: false,
				onBlurContainer: '', // enables blur filter for specified block
				openOnEvent: true, // set to 'false' to init on load
				setEvent: 'click', // use your event like 'mouseover', 'touchmove', etc.
				template:'<div class="top-pop-login"><h2>Créez votre page :</h2></div>'+
						 	'<div class="admin-popup-content">'+
							'</div>'+
							'<script type="text/javascript">'+
								'$(\'.admin-popup-content\').load(\'../nxs-admin/pages/nxs-add-post.php\');'+
							'</script>'
			});

			$("#addEventBtn").avgrund({
				width: 1400, // max is 640px
				height: 650, // max is 350px
				showClose: true, // switch to 'true' for enabling close button
				showCloseText: 'x', // type your text for close button
				closeByEscape: true, // enables closing popup by 'Esc'..
				closeByDocument: false, // ..and by clicking document itself
				holderClass: '', // lets you name custom class for popin holder..
				overlayClass: '', // ..and overlay block
				enableStackAnimation: false, // another animation type
				onLoad: false,
				onBlurContainer: '', // enables blur filter for specified block
				openOnEvent: true, // set to 'false' to init on load
				setEvent: 'click', // use your event like 'mouseover', 'touchmove', etc.
				template:'<div class="top-pop-login"><h2>Ajouter un événement :</h2></div>'+
						 	'<div class="admin-popup-content">'+
							'</div>'+
							'<script type="text/javascript">'+
								'$(\'.admin-popup-content\').load(\'../nxs-admin/pages/nxs-add-event.php\');'+
							'</script>'
			});

			$('#addForm').avgrund({
				width: 1400, // max is 640px
				height: 650, // max is 350px
				showClose: true, // switch to 'true' for enabling close button
				showCloseText: 'x', // type your text for close button
				closeByEscape: true, // enables closing popup by 'Esc'..
				closeByDocument: false, // ..and by clicking document itself
				holderClass: '', // lets you name custom class for popin holder..
				overlayClass: '', // ..and overlay block
				enableStackAnimation: false, // another animation type
				onLoad: false,
				onBlurContainer: '', // enables blur filter for specified block
				openOnEvent: true, // set to 'false' to init on load
				setEvent: 'click', // use your event like 'mouseover', 'touchmove', etc.
				template:'<div class="top-pop-login"><h2>Ajouter un formulaire :</h2></div>'+
						 	'<div class="admin-popup-content">'+
							'</div>'+
							'<script type="text/javascript">'+
								'$(\'.admin-popup-content\').load(\'../nxs-admin/pages/nxs-add-form.php\');'+
							'</script>'
			});

			$('#addMenu').avgrund({
				width: 850, // max is 640px
				height: 400, // max is 350px
				showClose: true, // switch to 'true' for enabling close button
				showCloseText: 'x', // type your text for close button
				closeByEscape: true, // enables closing popup by 'Esc'..
				closeByDocument: false, // ..and by clicking document itself
				holderClass: '', // lets you name custom class for popin holder..
				overlayClass: '', // ..and overlay block
				enableStackAnimation: false, // another animation type
				onLoad: false,
				onBlurContainer: '', // enables blur filter for specified block
				openOnEvent: true, // set to 'false' to init on load
				setEvent: 'click', // use your event like 'mouseover', 'touchmove', etc.
				template:'<div class="top-pop-login"><h2>Ajouter un menu :</h2></div>'+
						 	'<div class="admin-popup-content">'+
							'</div>'+
							'<script type="text/javascript">'+
								'$(\'.admin-popup-content\').load(\'../nxs-admin/pages/nxs-add-menu.php\');'+
							'</script>'
			});

			$("#addFaceBtn").avgrund({
				width: 1400, // max is 640px
				height: 650, // max is 350px
				showClose: true, // switch to 'true' for enabling close button
				showCloseText: 'x', // type your text for close button
				closeByEscape: true, // enables closing popup by 'Esc'..
				closeByDocument: false, // ..and by clicking document itself
				holderClass: '', // lets you name custom class for popin holder..
				overlayClass: '', // ..and overlay block
				enableStackAnimation: false, // another animation type
				onLoad: false,
				onBlurContainer: '', // enables blur filter for specified block
				openOnEvent: true, // set to 'false' to init on load
				setEvent: 'click', // use your event like 'mouseover', 'touchmove', etc.
				template:'<div class="top-pop-login"><h2>Ajouter un thème :</h2></div>'+
						 	'<div class="admin-popup-content">'+
							'</div>'+
							'<script type="text/javascript">'+
								//'$(\'.admin-popup-content\').load(\'../nxs-admin/pages/nxs-add-post.php\');'+
							'</script>'
			});

			$('#addSetting').avgrund({
				width: 320, // max is 640px
				height: 160, // max is 350px
				showClose: true, // switch to 'true' for enabling close button
				showCloseText: 'x', // type your text for close button
				closeByEscape: true, // enables closing popup by 'Esc'..
				closeByDocument: false, // ..and by clicking document itself
				holderClass: '', // lets you name custom class for popin holder..
				overlayClass: '', // ..and overlay block
				enableStackAnimation: false, // another animation type
				onLoad: false,
				onBlurContainer: '', // enables blur filter for specified block
				openOnEvent: true, // set to 'false' to init on load
				setEvent: 'click', // use your event like 'mouseover', 'touchmove', etc.
				template:'<div class="top-pop-login"><h2>Ajouter un réglage :</h2></div>'+
						 	'<div class="admin-popup-content">'+
							'</div>'+
							'<script type="text/javascript">'+
								//'$(\'.admin-popup-content\').load(\'../nxs-admin/pages/nxs-add-post.php\');'+
							'</script>'
			});
			
			$('#addUser').avgrund({
				width: 320, // max is 640px
				height: 260, // max is 350px
				showClose: true, // switch to 'true' for enabling close button
				showCloseText: 'x', // type your text for close button
				closeByEscape: true, // enables closing popup by 'Esc'..
				closeByDocument: false, // ..and by clicking document itself
				holderClass: '', // lets you name custom class for popin holder..
				overlayClass: '', // ..and overlay block
				enableStackAnimation: false, // another animation type
				onLoad: false,
				onBlurContainer: '', // enables blur filter for specified block
				openOnEvent: true, // set to 'false' to init on load
				setEvent: 'click', // use your event like 'mouseover', 'touchmove', etc.
				template:'<div class="top-pop-login"><h2>Ajouter un utilisateur :</h2></div>'+
						 	'<div class="admin-popup-content">'+
							'</div>'+
							'<script type="text/javascript">'+
								'$(\'.admin-popup-content\').load(\'../nxs-admin/pages/nxs-add-user.php\');'+
							'</script>'
			});

			$("#addFirewallBtn").avgrund({
				width: 1400, // max is 640px
				height: 650, // max is 350px
				showClose: true, // switch to 'true' for enabling close button
				showCloseText: 'x', // type your text for close button
				closeByEscape: true, // enables closing popup by 'Esc'..
				closeByDocument: false, // ..and by clicking document itself
				holderClass: '', // lets you name custom class for popin holder..
				overlayClass: '', // ..and overlay block
				enableStackAnimation: false, // another animation type
				onLoad: false,
				onBlurContainer: '', // enables blur filter for specified block
				openOnEvent: true, // set to 'false' to init on load
				setEvent: 'click', // use your event like 'mouseover', 'touchmove', etc.
				template:'<div class="top-pop-login"><h2>Ajouter une route :</h2></div>'+
						 	'<div class="admin-popup-content">'+
							'</div>'+
							'<script type="text/javascript">'+
								//'$(\'.admin-popup-content\').load(\'../nxs-admin/pages/nxs-add-post.php\');'+
							'</script>'
			});

			$("#regNotif").avgrund({
				width: 1400, // max is 640px
				height: 650, // max is 350px
				showClose: true, // switch to 'true' for enabling close button
				showCloseText: 'x', // type your text for close button
				closeByEscape: true, // enables closing popup by 'Esc'..
				closeByDocument: false, // ..and by clicking document itself
				holderClass: '', // lets you name custom class for popin holder..
				overlayClass: '', // ..and overlay block
				enableStackAnimation: false, // another animation type
				onLoad: false,
				onBlurContainer: '', // enables blur filter for specified block
				openOnEvent: true, // set to 'false' to init on load
				setEvent: 'click', // use your event like 'mouseover', 'touchmove', etc.
				template:'<div class="top-pop-login"><h2>Consultez le registre des archives de vos notifications :</h2></div>'+
						 	'<div class="admin-popup-content">'+
							'</div>'+
							'<script type="text/javascript">'+
								'$(\'.admin-popup-content\').load(\'../nxs-admin/pages/nxs-reg-notif.php\');'+
							'</script>'
			});
			
			$("#regLogs").avgrund({
				width: 1400, // max is 640px
				height: 650, // max is 350px
				showClose: true, // switch to 'true' for enabling close button
				showCloseText: 'x', // type your text for close button
				closeByEscape: true, // enables closing popup by 'Esc'..
				closeByDocument: false, // ..and by clicking document itself
				holderClass: '', // lets you name custom class for popin holder..
				overlayClass: '', // ..and overlay block
				enableStackAnimation: false, // another animation type
				onLoad: false,
				onBlurContainer: '', // enables blur filter for specified block
				openOnEvent: true, // set to 'false' to init on load
				setEvent: 'click', // use your event like 'mouseover', 'touchmove', etc.
				template:'<div class="top-pop-login"><h2>Consultez le registre des archives de logs :</h2></div>'+
						 	'<div class="admin-popup-content">'+
							'</div>'+
							'<script type="text/javascript">'+
								'$(\'.admin-popup-content\').load(\'../nxs-admin/pages/nxs-reg-logs.php\');'+
							'</script>'
			});
});
		//Le script saint graal !!!!!!!! lier dynamiquement tous les div généré par le class name


