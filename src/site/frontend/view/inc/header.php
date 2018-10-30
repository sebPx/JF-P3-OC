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
<div id="frontend">
<body>

	
	<?php 
/* Chargement de l'environnement de Noxus si l'utilisateur est connecté */
	if (!empty($_SESSION['user']) && ($_SESSION['user']['level'] > 1)){  
	
	?>
	  <link rel="stylesheet" type="text/css" href="assets/frontend/css/nxs-admin-sticky.css"/>
			<div id="admin-top" style="position: fixed;">
				<figure class="logo_admin" style="border:none;">
					<img src="assets/frontend/images/logo-noxus.png" alt="Logo Noxus.fr" style="height: 20px;margin:auto;" />
				</figure>	
				<div class="admin-top-l">
					<nav class="admin-top-l-nav">
					<ul>
					<li><a href="index.php?backend/site/dashboard">Dashboard</a></li>
					<li><a href="">Créer</a></li>
					<li><a href="">Notifications</a></li>
					</ul>
					</nav>
				</div>
				<div class="admin-top-r">
					<ul>
						<li><a href="">Bonjour, <?php echo $_SESSION['user']['login'];?></a></li>
					</ul>	
				</div>
			</div>
	<?php } 
	/*Affichage du header de base*/
	?>

	<header>
		<div id="header">
			<div id ="header_bar">
				<div class="teg_container">
					<figure class="logo_header">
						<img src="assets/frontend/images/logo-JF.png" alt="Logo Jean Forteroche" style="height: 35px;margin-left:15px;" />
					</figure>
					<nav class="header">
						<ul class ="header_nav">
							<?php 
								//Affichage du menu principal
								foreach ($get['nav']['link'] as $key => $value) {
									if ($get['nav']['link'][$key]['nav'] == "Header") {
										include ('../src/site/frontend/view/nav/nav.php');
									}
								}
							?>
						</ul>
					</nav>
				<?php if (empty($_SESSION['user'])){ ?>
					<nav class="header_log">
						<ul class ="header_log">
							<li><button id="userRegister" class="launcher" onclick="popup('small');">S'enregistrer</button></li>
							<li><button id="userLogin" class="getter" onclick="popup('small');">Connexion</button></li>
						</ul>
					</nav>
				<?php }elseif (!empty($_SESSION['user'])){ ?>
					<nav class="header_log">
						<ul class ="header_log">
				    		<li><a class="launcher" href="index.php?frontend/site/profil">Profil</a></li>
				    		<li><button id="logout" class="getter" onclick="popup('small','frontend','logout');">Déconnexion</button></li>
						</ul>
					</nav>				
				<?php } ?>
				</div>
				<script type="text/javascript" src="assets/js/plugins/sticky.js"></script>
			</div>
	  	</div>

 <!-- Slider --> 	
	  	<div id ="slider_header">
		  	<div class="slider_part">
		  	<?PHP require ("../libs/nxs-slider/slider.php"); ?>
		   	</div>
	  	</div>
			<div id ="slider-overlay">
	  	</div>
 <!-- Slider Fin--> 	
	
	</header>