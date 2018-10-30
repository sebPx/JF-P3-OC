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

<form class="form-pop-login" action="" method="post" accept-charset="utf-8">
	<div class="top-pop-login"><h2>Connexion</h2></div>
	<div id="pop-login">
		<div class="id-login-l">		
			<div class="id-login">
				<h3>Entrez vos identifiants :</h3>
				<input type="text" name="login" id="login"
				onfocus="if(this.value == 'Identifiant')this.value = '';" onblur="if(this.value == '')this.value = 'Identifiant';" value="Identifiant"/>
				
				<input type="password" name="pass" id="pass"
				onfocus="if(this.value == 'Mot de passe')this.value = '';" onblur="if(this.value == '')this.value = 'Mot de passe';" value="Mot de passe"/>				
				
				<a href="">Mot de pass oublié ?</a>
				<input id="log-true" name="log-true" type="submit" value="Se connecter"/>
			</div>
			<div class="reg-login">
				Pas encore de compte Noxus ? <a href="">Inscrivez-vous ici</a>
			</div>
		</div>

		<div class="id-login-r">
			<div class="id-login">
				<h3>Ou connectez vous par :</h3>
				<input type="text" name="Otp" id="Otp"
				onfocus="if(this.value == 'Noxus Authenticator')this.value = '';" onblur="if(this.value == '')this.value = 'Noxus Authenticator';" value="Noxus Authenticator"/>
				<input type="submit" value="Connexion avec Google"/>
				ou
				<input type="submit" value="connexion avec Plex"/>
			</div>
			<div class="reg-login">
				<a href="">ⓘ Comment ca marche ?</a>
			</div>			
		</div>
	</div>
</form>
