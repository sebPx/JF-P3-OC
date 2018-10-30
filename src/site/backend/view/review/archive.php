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
		<div class="review-left">
			<form  id="filter" action="" method="post" accept-charset="utf-8">	
				<label class="title"><h6>1 - Réglages des filtres :</h6></label>
					<div class="add-contact">
					<input type="hidden" name="event" value="<?php echo $get['module']; ?>">
					<input type="hidden" name="action" value="archive">
						<?php 
							echo $get['form']['filter'];
							echo $get['form']['getter'];
							echo "</br></br>";
							echo $get['form']['value'];
							echo "</br></br></br>";
							echo $get['form']['since'];
							echo "</br></br>";
							echo $get['form']['to'];
							echo "</br></br></br>";
						 ?>
						<label class="title"><h6>2 - Réglages de l'affichage :</h6></label>
						<?php 
							echo "</br></br>";
							echo $get['form']['display'];
							echo "</br>";
						 ?>	 
				</div>
				<input type="submit" value="Filtrer" name="submit">
			</form>
		</div>
		
		<div class="review-right">
			<div class="reg-review-table">
			<label class="title"><h6>3 - Liste des fichiers archivés :</h6></label>		
					<ul>
						<?php
							$link = "archive";
							$n = 0;
							foreach ($get['post'] as $key => $value) {
								if ( $n < 25) {
									include ('../review/'.ucfirst($get['module']).'Table.php');
									$n ++;					
								}
							}
						?>
					</ul>
			</div>
		</div>
	</article>
</section>
<script src="assets/js/eventReader.js"></script>


