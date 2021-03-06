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
		<div class="review-contact-left">
			<label class="title"><h6>1 - Ajouter un contact :</h6></label>
			<div id="infoArea">te</div>
				<?php
					include ('../form/formContact.php');
				?>
			</br>
		</div>
		<div class="review-right">
			<label class="title"><h6>2 - Liste des contacts :</h6></label>
			<div class="filter-bar">	
				<form  id="filter" action="" method="post" accept-charset="utf-8">	
					<input type="hidden" name="event" value="contact">
					<input type="hidden" name="action" value="contact">
					<div class="filter-line1">
						<?php  
						echo $get['filter']['filter'];
						echo $get['filter']['getter'];
						echo $get['filter']['value'];
						?>
					</div>
					<div class="filter-line2">
						<?php 
						echo $get['filter']['display'];
						?>
					 </div>
					 <input type="submit" value="Filtrer" name="filter" id="filter-submit-btn">
				</form>

			</div>
			</br>
			<div class="reg-review-contact-table">
				
					<ul>
						<?php
							foreach ($get['post'] as $key => $value) {
								include ('../review/contactTable.php');
							}
						?>
					</ul>
			</div>
		</div>
	</article>
</section>


