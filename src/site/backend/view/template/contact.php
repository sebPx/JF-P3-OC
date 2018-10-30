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
				<input type="hidden" name="event" value="<?php echo $get['module']; ?>">
				<input type="hidden" name="action" value="contact">
				<?php 
					echo $get['filter']['filter'];
					print_r($get);
					echo "</br></br>";
					echo $get['filter']['getter'];
					echo "</br></br>";
					echo $get['filter']['value'];
					echo "</br></br></br>";
					echo $get['filter']['since'];
					echo "</br></br>";
					echo $get['filter']['to'];
					echo "</br></br></br>";
				 ?>
				<label class="title"><h6>2 - Réglages de l'affichage :</h6></label>
				<?php 
					echo "</br></br>";
					echo $get['filter']['display'];
					echo "</br></br></br>";
				 ?>
				 <input type="submit" value="Filtrer" name="submit">
			</div>
		</form>
		<div class="review-right">
			<div class="reg-review-table">
			<label class="title"><h6>3 - Liste des contacts :</h6></label>		
					<ul>
						<?php
							foreach ($get['post'] as $key => $value) {
								include ('../review/contactTable.php');
							}
						?>
					</ul>
			</div>
				<form  id="form" action="" method="post" accept-charset="utf-8">	
					<label class="title"><h6>1 - Réglages des filtres :</h6></label>
					<?php 
						echo $get['form']['id'];
						echo $get['form']['requestType'];
						echo $get['form']['event'];
						echo $get['form']['surname'];
						echo "</br>";
						echo $get['form']['name'];
						echo "</br>";
					 ?>
					<label class="title"><h6>2 - Réglages de l'affichage :</h6></label>
					<?php 
						echo "</br>";
						echo $get['form']['email'];
					 ?>
					 <input type="submit" value="Filtrer" name="submit">
				</div>
			</form>
		</div>
	</article>
</section>
<script src="assets/js/eventReader.js"></script>


