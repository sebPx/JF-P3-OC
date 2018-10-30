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
		$('#uploadFichier').avgrund({
		width: 380, // max is 640px
		height: 200, // max is 350px
		showClose: true, // switch to 'true' for enabling close button
		showCloseText: 'X', // type your text for close button
		closeByEscape: true, // enables closing popup by 'Esc'..
		closeByDocument: false, // ..and by clicking document itself
		holderClass: '', // lets you name custom class for popin holder..
		overlayClass: '', // ..and overlay block
		enableStackAnimation: false, // another animation type
		onBlurContainer: '', // enables blur filter for specified block
		openOnEvent: true, // set to 'false' to init on load
		setEvent: 'click', // use your event like 'mouseover', 'touchmove', etc.
		template:''+
		'<div class="top-pop-login"><h2>Ajouter un média</h2></div>'+
		'<section id="add-post-screen">'+
		'<div id="add-media-screen">'+
			'<div class="admin-popup-content">'+
			'<form action="../nxs-admin/config/upload-media.php" method="post" enctype="multipart/form-data">'+   
		    '<div class="search-add-media">'+
		    	'<input type="file" name="fileToUpload" id="fileToUpload ">'+
		    '</div>'+
		    '<div class="valid-add-media">'+
			    '<input type="text" name="mediaAlt"'+
			    'onfocus="if(this.value == \'Description du média.\')this.value = \'\';" onblur="if(this.value == \'\')this.value = \'Description du média.\';" value="Description du média."/>'+
			    '<input type="submit" value="Upload Image" name="submit">'+
			'</div>'+
			'</div>'+
			'</form>'+
			'</div>'+
			'</div>'+
		'</div>'
		});
	});
});
</script>

