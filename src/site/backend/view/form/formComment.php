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
		    	<label class="title"><h6>Réponse au commentaire de <?php echo $get['post']['0']['author']; ?></h6></label>
		    	<input type="hidden" name="post" value="<?php echo $get['post']['0']['post']; ?>">
		    	<input type="hidden" name="postTitle" value="<?php echo $get['post']['0']['postTitle']; ?>">
		    	<input type="hidden" name="comment" value="<?php echo $get['post']['0']['id']; ?>">
		    </div>
		    <div class="add-post-content-area">			   
			    <?php echo $get['form']['author']; ?>
			    <?php echo $get['form']['id']; ?>
			    <?php echo $get['form']['event']; ?>
			    <?php echo $get['form']['requestType']; ?>
			    <?php echo $get['form']['content']; ?>
			</div>
			<input type="submit" value="Publier" name="submit">
		</article>	
	</section>
</form>
<script src="assets/js/eventReader.js"></script>
</div>

