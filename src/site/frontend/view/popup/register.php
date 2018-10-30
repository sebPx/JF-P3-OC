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

<form action="" method="post" accept-charset="utf-8">
	<div class="top-pop-login"><h2>Création de compte</h2></div>
	<div id="pop-register">
	<h3>Entrez vos informations personnelles :</h3>	
		<div class="register-infos">
			<input type="text" name="login"required="TRUE" onfocus="if(this.value == 'Identifiant')this.value = '';" onblur="if(this.value == '')this.value = 'Identifiant';" value="Identifiant"/>
			
			<input type="text" name="prenom"required="TRUE"	onfocus="if(this.value == 'Prenom')this.value = '';" onblur="if(this.value == '')this.value = 'Prenom';" value="Prenom"/>

			<input type="text" name="nom"required="TRUE" onfocus="if(this.value == 'Nom')this.value = '';" onblur="if(this.value == '')this.value = 'Nom';" value="Nom"/>

			<input type="text" name="mail"required="TRUE" onfocus="if(this.value == 'Email')this.value = '';" onblur="if(this.value == '')this.value = 'Email';" value="Email"/>
		</div>
		<div class="register-pass">
			<input type="password" name="pwd"required="TRUE" onfocus="if(this.value == 'Mot de passe')this.value = '';" onblur="if(this.value == '')this.value = 'Mot de passe';" value="Mot de passe"/>

			<input type="password" name="pwd1"required="TRUE" onfocus="if(this.value == 'Confirmation mpd')this.value = '';" onblur="if(this.value == '')this.value = 'Confirmation mpd';" value="Confirmation mpd"/>
			<button type="button" id ="unmask" title="Mask/Unmask password to check content">Afficher le mot de passe</button>
		</div>
		<input type="submit" value="Enregistrer"/>
		<div class="reg-login">
			<a href="index.php?s=register"> Reinitialiser </a>
		</div>
	</div>
</form>



