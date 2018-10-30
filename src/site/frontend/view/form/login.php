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
	<form id="form" action="" method="post"">
		<div class="top-pop-login"><h2>Connexion</h2></div>
			<div id="pop-login">		
				<div class="id-login">
					<h3>Entrez vos identifiants :</h3>
						<?php echo $get['form']['requestType'] ; ?>
						<?php echo $get['form']['event'] ; ?>	
						<?php echo $get['form']['login'] ; ?>	
						<?php echo $get['form']['pass'] ; ?>		
					
					<a href="">Mot de pass oublié ?</a>
					<input type="submit" value="Se connecter"/>
				</div>
				<div class="reg-login">
					Vous n'avez pas encore votre propre compte ? <a href="">Inscrivez-vous ici</a>
				</div>
			</div>
		</div>
	</form>
<script src="assets/js/eventReader.js"></script>
</div>
