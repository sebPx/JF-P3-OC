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
			<label class="title"><h6>1 - Contacts :</h6></label>
			<div class="filter-bar">	
				<form  id="filter" action="" method="post" accept-charset="utf-8">	
					<input type="hidden" name="event" value="email">
					<input type="hidden" name="action" value="contact">
					<div class="filter-line1">
						<?php  
						echo $get['filter']['filter'];
						echo $get['filter']['getter'];
						
						?>
					</div>
					<div class="filter-line2">
						<?php 
						echo $get['filter']['value'];
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
						include ('../review/contactJacketTable.php');
					}
					?>
				</ul>
			</div>
		</div>
		<div class="review-right">
			<label class="title"><h6>2 - Nouveau mail :</h6></label>
				<form  id="form" action="" method="post" accept-charset="utf-8">			
					<div class="add-contact">
					<?php 
						echo $get['form']['requestType'];
						echo $get['form']['event'];
						echo $get['form']['receiver'];
						echo "</br>";
						echo $get['form']['subject'];
						echo "</br></br>";
						echo $get['form']['content'];
					 ?>
					</div>
					<input type="submit" value="Envoyer" name="submit">
				</form>
		</div>
	</article>
</section>
<script type="text/javascript">
	$("img").click(function() {	
	    if (flag == true) {
		    divID =  $(this).attr("id");
		    methode =  $(this).attr("alt");
		    target = divID.replace(/\D/g,'');// enleve les lettres
		    action = divID.replace(/\W/g, "");//enleve les autre caracteres
			action = action.replace(/\d/g, "");//eleve les chiffres

			document.getElementById("receiver").value += "<"+methode+">;";
		}
	});
</script>
<script src="assets/js/eventReader.js"></script>


