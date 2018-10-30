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


/* Chargement des pages dans le contenu */

?>
<div id="admin-screen">
	<div id="admin-aside">
		<div class="dash-nav">
			<ul class="dash-nav">
					<li id="liDashboard"><button id="load-1" value="Home" class="Home">Tableau de bord</button></li>
			</ul>
		</div>
		<div class="redac-nav">
			<ul class="redac-nav">
				<?php if ($_SESSION['user']['level'] > "5") { ?>
					<li id="liArticles"><button  id="load-2" value="Article" class="Article">Articles</button></li>
					<li id="liPages"><button  id="load-3" value="Page" class="Page">Pages</button></li>
					<li id="liEvent"><button  id="load-4" value="Event" class="Event">Evenements</button></li>
					<li id="liMedia"><button id="load-5" value="Media" class="Media">Médias</button></li>
				<?php } ?>	
			</ul>
		</div>
		<div class="form-nav">
			<ul class="form-nav">
				<?php if ($_SESSION['user']['level'] > "2") { ?>
					<li id="liNotifications"><button  id="load-6" value="Notification" class="Notification">Notifications</button></li>
					<li id="liComment"><button id="load-77" value="Comment" class="Comment">Commentaires</button></li>
					<li id="liContact"><button id="load-7" value="Courier" class="Contact">Contacts</button></li>
				<?php } ?>	
			</ul>
		</div>
		<div class="config-nav">
			<ul class="config-nav">
					<?php if ($_SESSION['user']['level'] > "8") { ?>
						<li id="liUtilisateurs"><button id="load-9" value="User" class="User">Utilisateurs</button></li>
						<li id="liApparence"><button id="load-10" value="Design" class="Design">Design</button></li>
						<?php if ($_SESSION['user']['level'] == "11") { ?>
							<li id="liReferencement"><button id="load-8" value="Navigation" class="Navigation">Navigation</button></li>
							<li id="liSecurity"><button id="load-11" value="Security" class="Security">Sécurité</button></li>
							<li id="liReglages"><button id="load-12" value="Setting" class="Setting">Réglages</button></li>						
						<?php } ?>
					<?php } ?>

			</ul>
		</div>
	</div>




