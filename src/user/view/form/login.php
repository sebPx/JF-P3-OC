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

<form action="" method="post" id="form">
		<?php 
			echo $get['form']['login']; 
			?></br><?php 
			echo $get['form']['pass'];
		?></br>
		<input type="submit" name="nxs-submit" id="nxs-submit" class="button button-primary button-large" value="Se connecter">
</form>

