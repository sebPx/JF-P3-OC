	

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

$get = $_POST;
?>
<div class="formContent">
<section id="add-post-screen">
	<div id="add-media-screen">
		<form id="media" action="" method="post" enctype='multipart/form-data'>	
		    <div class="search-add-media">
				<label class="title"><h6>Ajouter un média :</h6></label></br>
				<?php if (isset ($get['edit'] )) { ?>
					<input type="hidden" name="edit" value="true">
				<?php } ?>
				<?php echo $get['form']['id']; ?>
				<?php echo $get['form']['name']; ?>
				<?php echo $get['form']['requestType']; ?>
				<?php echo $get['form']['event']; ?>
				<?php echo $get['form']['uploadCase']; ?>
		    </div>
		    <div class="valid-add-media">
		    	<?php echo $get['form']['alt']; ?>
			    <input type="submit" value="Enregistrer" name="submit">
			</div>
		</form>
	</div>
</section>
<script src="assets/js/eventReader.js"></script>
</div>