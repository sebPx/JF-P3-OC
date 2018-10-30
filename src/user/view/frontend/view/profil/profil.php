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
<h4>Vos informations personnelles :</h4></br>
	<div class="profil-top">
		<label>Votre nom :</label>
		<input type="text" disabled="disabled" value="<?php echo $get['user']['0']['surname']; ?>"></br>
		<label>Votre prénom :</label>
		<input type="text" disabled="disabled" value="<?php echo $get['user']['0']['name']; ?>"></br>
		<label>Votre adresse e-mail :</label>
		<input type="text" disabled="disabled" value="<?php echo $get['user']['0']['email']; ?>">
	</div>

	<div class="profil-content">
		Votre dernière connexion était le : <?php echo $get['user']['0']['lastCo']; ?></br>
	</div>

	<div class="profil-bot">
		Vous êtes enregistré en tant que <?php echo $get['user']['0']['level']; ?>.</br>
		Votre compte a été créé le : <?php echo $get['user']['0']['date']; ?>		
	</div>
