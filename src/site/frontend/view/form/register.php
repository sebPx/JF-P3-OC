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

<?php 
	$get = $_POST;
 ?>
<div class="formContent">
	<form id="form" action="" method="post" accept-charset="utf-8">
		<div class="top-pop-login"><h2>Création de votre compte</h2></div>
		<div id="pop-login">		
				<div class="id-login">
					<h3>Renseignez vos informations personnelles :</h3>
					<?php echo $get['form']['id'] ; ?>
					<?php echo $get['form']['level'] ; ?>
					<?php echo $get['form']['requestType'] ; ?>
					<?php echo $get['form']['event'] ; ?>	
					<?php echo $get['form']['login'] ; ?>	
					<?php echo $get['form']['email'] ; ?>		
					<?php echo $get['form']['pass'] ; ?>
					<?php echo $get['form']['confirm'] ; ?>
					
					<input id="log-true" name="log-true" type="submit" value="Créer mon compte"/>
				</div>
			</div>
		</div>
		<script src="assets/js/eventReader.js"></script>
	</form>
</div>