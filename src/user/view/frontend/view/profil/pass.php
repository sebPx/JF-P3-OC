<?php
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
<h4>Modification de votre mot de passe :</h4></br>
<div class="formContent">
	<form id="form" action="" method="post" accept-charset="utf-8">
		<div class="profil-top">
			<?php echo $get['form']['requestType']; ?>
			<?php echo $get['form']['event']; ?>
			<?php echo $get['form']['pass']; ?>
			</br>
			<?php echo $get['form']['newPass']; ?>
			</br>
			<?php echo $get['form']['confirm']; ?>
			</br>
			<input id="log-true" name="log-true" type="submit" value="Enregistrer"/>
		</div>
	</form>
</div>
