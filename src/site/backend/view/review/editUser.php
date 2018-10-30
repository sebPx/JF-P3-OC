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

<section id="add-post-screen">
	<article id="review">
		<div class="nxs-change-usr">
			<div class="nxs-change-usr-left">	
				<div class="nxs-change-usr-header">
					<div class="nxs-change-usr-profil">
						<div class="nxs-change-usr-profil-left">
							<h5><?php echo ucfirst($get['user']['login']); ?></h5>
							<img src='<?php echo $get['user']['avatar']; ?>'></img>
						</div>
						<div class="nxs-change-usr-profil-right">
							<input type="text" id="usr-email" name="usr-email" disabled="disabled" value="<?php echo "Grade : ".$get['user']['level']; ?>"/>	
						</div>
					</div>
				</div>
				<div class="nxs-change-usr-infos">
				 	<div class="nxs-change-usr-infos">
					 	<div class="nxs-add-usr-title">
							<label for="usr-prenom">Prenom :</label>
							<label for="usr-nom">Nom :</label>
							<label for="usr-email">Email :</label>
						</div>
						<div class="nxs-add-usr-champ">
							<input type="text" id="usr-prenom" name="userPrenom" required="TRUE" value="<?php echo ucfirst($get['user']['surname']); ?>"/>
							<input type="text" id="usr-nom" name="userNom" required="TRUE" value="<?php echo ucfirst($get['user']['name']); ?>"/>
							<input type="text" id="usr-email" name="usr-email" disabled="disabled" value="<?php echo ucfirst($get['user']['email']); ?>"/>
						</div>
					</div>				 		
				</div>
			</div>
			<div class="nxs-change-usr-right">
				<h5>Changement de mot de passe</h5>
				<?php
					include ('../../../../user/view/form/formEditPass.php');
				?>
				</br>			
				<h5>Changement d'adresse email</h5>
				<?php
					include ('../../../../user/view/form/formEditEmail.php');
				?>					
			</div>
		</div>
	</article>
</section>
<script src="assets/js/eventReader.js"></script>
