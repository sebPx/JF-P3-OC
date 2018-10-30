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

/* Chargement de la barre head dans l'admin screen */

?> 
<?php 
if (!isset($get)) {
	$get = $_POST;
}
 ?>
<body>
	<div class="loader-admin"></div>
	<div id="admin-head">
		<div id="admin-top">
			<figure class="logo_admin">
				<img src="assets/frontend/images/logo-noxus.png" alt="Logo Noxus.fr" style="height: 20px;margin: auto;" />
			</figure>	
			<div class="admin-top-l">
				<nav class="admin-top-l-nav">
				<ul>
					<li><a href="index.php">Mon site</a></li>
					<li><a href="">Créer</a></li>
					<li><a href="">Notifications</a></li>
				</ul>
				</nav>
			</div>
			<div class="admin-top-r">
				<ul>
			 	  	<li id="menu-compte"><a  href="#">Bonjour, <?php echo $_SESSION['user']['login'];?></a>
						<div id="window-r">
					 	  	<div class="avatar"><img src="uploads/avatar/<?php echo $get['sid']['user']['avatar']; ?>" alt="Avatar utilisateur" style="height: 60px;margin: auto;" /></div>
					 	  	<ul>
					 	  		<li><a href="index.php?frontend/site/profil">Profil</a></li>
					 	  		<li><a  href="https://naxter.fr">Naxter.fr</a></li>
								<li><button id="logout" class="getter" onclick="popup('small','frontend','logout');">Déconnexion</button></li>
							</ul>
				 	  	</div>
			 	  	</li>
			 	</ul>	  
			</div>
		</div>
	</div>

