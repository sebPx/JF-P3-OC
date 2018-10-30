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
	if (isset($_POST['return'])) {
		$get = $_POST;
		?><script src="assets/js/eventReader.js"></script><?php
	}
 ?>
<h4>Vous pouvez également laisser un commentaire sans vous inscrire depuis le formulaire suivant :</h4>
<form action="" method="post" id="form">
		</br><?php 
			echo $get['form']['id'];
			echo $get['form']['postTitle'];
			echo $get['form']['requestType'];
			echo $get['form']['event'];
			echo $get['form']['author']; 
			?></br>
			<input type="hidden" name="postTitle" value="<?php echo $get['post'][0]['title']; ?>">
			<input type="hidden" name="post" value="<?php echo $get['post'][0]['id']; ?>">
			<?php 
			echo $get['form']['content'];
		?></br>
		<input id="addCommentBtn" type="submit" value="Enregistrer">
</form>