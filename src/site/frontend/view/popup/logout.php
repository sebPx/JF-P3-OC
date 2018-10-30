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

<div class="top-pop-login"><h2>Déconnexion</h2></div>
<div id ="downlog">
	Vous venez de vous déconnecter,</br>
	vous allez être redirigé dans une seconde.
	<form name="form" action="" method="POST">
		<input type="hidden" name="logout" value="true">
		<script type="text/javascript"> 
			setTimeout("document.forms['form'].submit()", 2000); 
	</script>
	</form>
</div>

