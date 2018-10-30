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
		
	// page par défaut	site
			if (window.location.href.indexOf("#post=")>-1) {
				$('#content').load('nxs-admin/pages/nxs-release-post.php');
			}//else{
				//$('#content').load('home.php');
			//}
			// page par défaut	administration
			$('#admin-head').load('../src/blog/backend/view/inc/header.php');
			$('#admin-aside').load('../src/blog/backend/view/inc/aside.php');
			$('#admin-content-nav').load('../src/blog/backend/view/inc/nav.php');
			$('#admin-content-section').load('../src/blog/backend/view/inc/home.php');
			$('#admin-footer-section').load('../src/blog/backend/view/inc/footer.php');
});	
