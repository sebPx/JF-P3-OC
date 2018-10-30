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
		
// page par défaut	
	if (window.location.href.indexOf("#edit-post=")>-1) {
		$('#admin-content-section').load('../nxs-admin/pages/nxs-review-post.php');
		$('#admin-content-nav').load('../nxs-admin/pages/nxs-menu-post-review.php');
	}
	
	else if(window.location.href.indexOf("#edit-page=")>-1) {
		$('#admin-content-section').load('../nxs-admin/pages/nxs-review-pages.php');
		$('#admin-content-nav').load('../nxs-admin/pages/nxs-menu-post-review.php');
	}
	
	else if(window.location.href.indexOf("#edit-media=")>-1) {
		$('#admin-content-section').load('../nxs-admin/pages/nxs-review-media.php');
		$('#admin-content-nav').load('../nxs-admin/pages/nxs-menu-dashboard.php');
	}
	
	else if(window.location.href.indexOf("#edit-user=")>-1) {
		$('#admin-content-section').load('../nxs-admin/pages/nxs-review-users.php');
		$('#admin-content-nav').load('../nxs-admin/pages/nxs-menu-dashboard.php');
	}
	else if(window.location.href.indexOf("#edit-form=")>-1) {
		$('#admin-content-section').load('../nxs-admin/pages/nxs-review-contact.php');
		$('#admin-content-nav').load('../nxs-admin/pages/nxs-menu-dashboard.php');
	}
	else if(window.location.href.indexOf("#edit-menu=")>-1) {
		$('#admin-content-section').load('../nxs-admin/pages/nxs-review-ref.php');
		$('#admin-content-nav').load('../nxs-admin/pages/nxs-menu-dashboard.php');
	}
	else if(window.location.href.indexOf("#edit-event=")>-1) {
		$('#admin-content-section').load('../nxs-admin/pages/nxs-review-event.php');
		$('#admin-content-nav').load('../nxs-admin/pages/nxs-menu-dashboard.php');
	}
	else{
		$('#admin-content-section').load('../nxs-admin/dashboard-home.php');
	}	

var Lien = ['liDashboard', 'liArticles', 'liPages', 'liEvent', 'liNotifications', 'liMedia', 'liContact', 'liApparence', 'liUtilisateurs', 'liReglages', 'liReferencement', 'liFirewall'];
var elmt = document.getElementById("liDashboard");
elmt.style.backgroundColor = "#292929";
		
		//Affectation des pages en fonction des bouton du menu de gauche dans l'administration.
		//Au clic on charge le menu et le contenu et en fonction du bouton on fonce le background
		//Et on reset celui des autres
		document.getElementById("Dashboard").onclick = function() {
			$('#admin-content-section').load('../nxs-admin/dashboard-home.php');
			$('#admin-content-nav').load('../nxs-admin/pages/nxs-menu-dashboard.php');
			Lien.forEach(function(element) {
				var elmt = document.getElementById(element);
				  if (element == 'liDashboard') {
					elmt.style.backgroundColor = "#292929";	// on modifie son style
  				  } else {
 					elmt.style.backgroundColor = "#333333";	// on modifie son style	
  				  }
			});	
		};
		
		document.getElementById("Articles").onclick = function() {
			$('#admin-content-section').load('../nxs-admin/pages/nxs-review-post.php');
			$('#admin-content-nav').load('../nxs-admin/pages/nxs-menu-post-review.php');
			Lien.forEach(function(element) {
				var elmt = document.getElementById(element);
				  if (element == 'liArticles') {
					elmt.style.backgroundColor = "#292929";	// on modifie son style
  				  } else {
 					elmt.style.backgroundColor = "#333333";	// on modifie son style	
  				  }
			});	
		};
		
		document.getElementById("Pages").onclick = function() {
			$('#admin-content-section').load('../nxs-admin/pages/nxs-review-pages.php');
			$('#admin-content-nav').load('../nxs-admin/pages/nxs-menu-post-review.php');
			Lien.forEach(function(element) {
				var elmt = document.getElementById(element);
				  if (element == 'liPages') {
					elmt.style.backgroundColor = "#292929";	// on modifie son style
  				  } else {
 					elmt.style.backgroundColor = "#333333";	// on modifie son style	
  				  }
			});	
		};
		
		document.getElementById("Event").onclick = function() {
			$('#admin-content-section').load('../nxs-admin/pages/nxs-review-event.php');
			$('#admin-content-nav').load('../nxs-admin/pages/nxs-menu-post-review.php');
			Lien.forEach(function(element) {
				var elmt = document.getElementById(element);
				  if (element == 'liEvent') {
					elmt.style.backgroundColor = "#292929";	// on modifie son style
  				  } else {
 					elmt.style.backgroundColor = "#333333";	// on modifie son style	
  				  }
			});	
		};
		
		document.getElementById("Notifications").onclick = function() {
			$('#admin-content-section').load('../nxs-admin/pages/nxs-review-notif.php');
			$('#admin-content-nav').load('../nxs-admin/pages/nxs-menu-post-review.php');
			Lien.forEach(function(element) {
				var elmt = document.getElementById(element);
				  if (element == 'liNotifications') {
					elmt.style.backgroundColor = "#292929";	// on modifie son style
  				  } else {
 					elmt.style.backgroundColor = "#333333";	// on modifie son style	
  				  }
			});	
		};

		document.getElementById("Media").onclick = function() {
			$('#admin-content-section').load('../nxs-admin/pages/nxs-review-media.php');
			$('#admin-content-nav').load('../nxs-admin/pages/nxs-menu-dashboard.php');
			Lien.forEach(function(element) {
				var elmt = document.getElementById(element);
				  if (element == 'liMedia') {
					elmt.style.backgroundColor = "#292929";	// on modifie son style
  				  } else {
 					elmt.style.backgroundColor = "#333333";	// on modifie son style	
  				  }
			});	
		};
		
		document.getElementById("Contact").onclick = function() {
			$('#admin-content-section').load('../nxs-admin/pages/nxs-review-contact.php');
			$('#admin-content-nav').load('../nxs-admin/pages/nxs-menu-post-review.php');
			Lien.forEach(function(element) {
				var elmt = document.getElementById(element);
				  if (element == 'liContact') {
					elmt.style.backgroundColor = "#292929";	// on modifie son style
  				  } else {
 					elmt.style.backgroundColor = "#333333";	// on modifie son style	
  				  }
			});	
		};
		
		document.getElementById("Apparence").onclick = function() {
			$('#admin-content-section').load('../nxs-admin/pages/nxs-review-face.php');
			$('#admin-content-nav').load('../nxs-admin/pages/nxs-menu-dashboard.php');
			Lien.forEach(function(element) {
				var elmt = document.getElementById(element);
				  if (element == 'liApparence') {
					elmt.style.backgroundColor = "#292929";	// on modifie son style
  				  } else {
 					elmt.style.backgroundColor = "#333333";	// on modifie son style	
  				  }
			});	
		};
		
		document.getElementById("Utilisateurs").onclick = function() {
			$('#admin-content-section').load('../nxs-admin/pages/nxs-review-users.php');
			$('#admin-content-nav').load('../nxs-admin/pages/nxs-menu-dashboard.php');
			Lien.forEach(function(element) {
				var elmt = document.getElementById(element);
				  if (element == 'liUtilisateurs') {
					elmt.style.backgroundColor = "#292929";	// on modifie son style
  				  } else {
 					elmt.style.backgroundColor = "#333333";	// on modifie son style	
  				  }
			});	
		};
		
		document.getElementById("Reglages").onclick = function() {
			$('#admin-content-section').load('../nxs-admin/pages/nxs-review-settings.php');
			$('#admin-content-nav').load('../nxs-admin/pages/nxs-menu-dashboard.php');
			Lien.forEach(function(element) {
				var elmt = document.getElementById(element);
				  if (element == 'liReglages') {
					elmt.style.backgroundColor = "#292929";	// on modifie son style
  				  } else {
 					elmt.style.backgroundColor = "#333333";	// on modifie son style	
  				  }
			});	
		};
		
		document.getElementById("Referencement").onclick = function() {
			$('#admin-content-section').load('../nxs-admin/pages/nxs-review-ref.php');
			$('#admin-content-nav').load('../nxs-admin/pages/nxs-menu-dashboard.php');
			Lien.forEach(function(element) {
				var elmt = document.getElementById(element);
				  if (element == 'liReferencement') {
					elmt.style.backgroundColor = "#292929";	// on modifie son style
  				  } else {
 					elmt.style.backgroundColor = "#333333";	// on modifie son style	
  				  }
			});
		};
		
		document.getElementById("Firewall").onclick = function() {
			$('#admin-content-section').load('../nxs-admin/pages/nxs-review-firewall.php');
			$('#admin-content-nav').load('../nxs-admin/pages/nxs-menu-dashboard.php');
			Lien.forEach(function(element) {
				var elmt = document.getElementById(element);
				  if (element == 'liFirewall') {
					elmt.style.backgroundColor = "#292929";	// on modifie son style
  				  } else {
 					elmt.style.backgroundColor = "#333333";	// on modifie son style	
  				  }
			});
		};
		//Overlay menu droite admin animation 
		document.getElementById("menu-compte").onmouseover = function() {
				var elmt = document.getElementById("window-r");
				elmt.style.top = "30px";
		};
		document.getElementById("window-r").onmouseover = function() {
				var elmt = document.getElementById("window-r");
				elmt.style.top = "30px";
		};
		document.getElementById("menu-compte").onmouseout = function() {
				var elmt = document.getElementById("window-r");
				elmt.style.top = "-1030px";
		};
		document.getElementById("window-r").onmouseout = function() {
				var elmt = document.getElementById("window-r");
				elmt.style.top = "-1030px";
		};

	$(function() {
		$(window.location.href.indexOf("#edit-post=")>-1).avgrund({
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
		openOnEvent: false, // set to 'false' to init on load
		setEvent: 'click', // use your event like 'mouseover', 'touchmove', etc.
				template:'<div class="top-pop-login"><h2>Modifiez un article :</h2></div>'+
						 	'<div class="admin-popup-content">'+
							'</div>'
		});
	
	if (window.location.href.indexOf("#edit-post=")>-1) {
		$('.admin-popup-content').load('../nxs-admin/pages/nxs-change-post.php');	
		}	
	});

	$(function() {
		$(window.location.href.indexOf("#edit-page=")>-1).avgrund({
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
		openOnEvent: false, // set to 'false' to init on load
		setEvent: 'click', // use your event like 'mouseover', 'touchmove', etc.
				template:'<div class="top-pop-login"><h2>Modifiez une pages :</h2></div>'+
						 	'<div class="admin-popup-content">'+
							'</div>'
		});
	
	if (window.location.href.indexOf("#edit-page=")>-1) {
		$('.admin-popup-content').load('../nxs-admin/pages/nxs-change-post.php');	
		}	
	});

	$(function() {
		$(window.location.href.indexOf("#edit-event=")>-1).avgrund({
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
		openOnEvent: false, // set to 'false' to init on load
		setEvent: 'click', // use your event like 'mouseover', 'touchmove', etc.
				template:'<div class="top-pop-login"><h2>Modifiez une evenement :</h2></div>'+
						 	'<div class="admin-popup-content">'+
							'</div>'
		});
	
	if (window.location.href.indexOf("#edit-event=")>-1) {
		$('.admin-popup-content').load('../nxs-admin/pages/nxs-change-event.php');	
		}	
	});

	$(function() {
		$(window.location.href.indexOf("#edit-media=")>-1).avgrund({
		width: 380, // max is 640px
		height: 200, // max is 350px
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
				template:'<div class="top-pop-login"><h2>Modifiez un media :</h2></div>'+
						 	'<div class="admin-popup-content">'+
							'</div>'
		});
	
	if (window.location.href.indexOf("#edit-media=")>-1) {
		$('.admin-popup-content').load('../nxs-admin/pages/nxs-change-media.php');	
		}	
	});

	$(function() {
		$(window.location.href.indexOf("#edit-form=")>-1).avgrund({
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
		openOnEvent: false, // set to 'false' to init on load
		setEvent: 'click', // use your event like 'mouseover', 'touchmove', etc.
				template:'<div class="top-pop-login"><h2>Modifiez un formulaire :</h2></div>'+
						 	'<div class="admin-popup-content">'+
							'</div>'
		});
	
	if (window.location.href.indexOf("#edit-form=")>-1) {
		$('.admin-popup-content').load('../nxs-admin/pages/nxs-change-form.php');	
		}	
	});

	$(function() {
		$(window.location.href.indexOf("#edit-menu=")>-1).avgrund({
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
		openOnEvent: false, // set to 'false' to init on load
		setEvent: 'click', // use your event like 'mouseover', 'touchmove', etc.
				template:'<div class="top-pop-login"><h2>Modifiez un menu :</h2></div>'+
						 	'<div class="admin-popup-content">'+
							'</div>'
		});
	
	if (window.location.href.indexOf("#edit-menu=")>-1) {
		$('.admin-popup-content').load('../nxs-admin/pages/nxs-change-menu.php');	
		}	
	});

	$(function() {
		$(window.location.href.indexOf("#edit-user=")>-1).avgrund({
		width: 800, // max is 640px
		height: 330, // max is 350px
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
				template:'<div class="top-pop-login"><h2>Modifiez un utilisateur :</h2></div>'+
						 	'<div class="admin-popup-content">'+
							'</div>'
		});
	
	if (window.location.href.indexOf("#edit-user=")>-1) {
		$('.admin-popup-content').load('../nxs-admin/pages/nxs-change-user.php');	
		}	
	});
});	
