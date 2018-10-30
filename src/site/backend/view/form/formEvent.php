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
<form name="addPost" id="form" action="" method="post" accept-charset="utf-8">	
	<section id="add-post-screen">
		<article id="add-post">
		    <div class="add-post-title-area">
		    	<label class="title"><h6>1 - Création du contenu:</h6></label>
		    	<?php 
		    		echo $get['form']['requestType'];
		    		echo $get['form']['author'];
		    		echo $get['form']['event'];
		    		echo $get['form']['id'];
		    		echo $get['form']['title'];
		    	?>
		    </div>
		    <div class="add-post-title-area">
		    	<?php echo $get['form']['resume']; ?>
		    </div>
		    <div class="add-post-link-area">

		    </div>
		    <div class="add-event-content-area">			   
			    <?php echo $get['form']['content']; ?>  
			</div>
		</article>	
		<article id="add-post-option">
			<div class="post-option-publish">
				<label class="title"><h6>2 - Date et emplacement de l'évènement :</h6></label>
					<div class="post-option-inner">
						<?php echo $get['form']['eventDate']; ?>
						</br>
						<?php echo $get['form']['location']; ?>
						</br>
					</div>
					
				<label class="title"><h6>3 - Conditions de publication:</h6></label>
					<div class="post-option-inner">
						<?php echo $get['form']['state']; ?>
						</br>
						<?php echo $get['form']['view']; ?>
						</br>
						<?php echo $get['form']['apply']; ?>
						</br>
						<?php echo $get['form']['comment']; ?>
		
				<input type="submit" value="Publier" name="submit">	
				</div>
			</div>

			<div class="post-option-img">		
				<label class="title"><h6>Image mise en avant</h6></label>
					<div class="post-option-inner">
						Parcourir 
					</div>
			</div>
		</article>
	</section>
</form>
<script src="assets/js/eventReader.js"></script>
</div>

