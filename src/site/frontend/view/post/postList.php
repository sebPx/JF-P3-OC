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


/* Chargement de l'environnement de Noxus */
?>
<div name ='nxs-release' class ='nxs-release'>
  	<div name ='nxs-release-last' class ='nxs-release-last'>
	  	<div name ='nxs-release-last-jacket' class ='nxs-release-last-jacket'></div>
  			
  		<div name ='nxs-release-last-content' class ='nxs-release-last-content'>
  			<div class ='nxs-release-last-top'>
	  			<div class ='nxs-release-last-top-up'><h3><?php echo $get[title]; ?></h3></div>
	  			<div class ='nxs-release-last-top-dw'>Publié le, <?php echo $get[date]; ?></div>
  			</div>
  			<div class ='nxs-release-last-mid'><?php echo $get[resume]; ?></div>

			<div class ='nxs-release-last-bot'>
				<div class ='nxs-release-last-bot-sign'>Ecrit par, <?php echo $get[author]; ?></div>
				<div class ='nxs-release-last-bot-cat'>#<?php echo $get[cat]; ?></div>
  			</div>
		</div>
		  	<form method='Post' action='index.php?frontend/site/article/<?php echo $get[id]; ?>'>
			  	<input type='hidden' name ='id_post' value='<?php echo $get[id]; ?>'></input>
			  	<input name='edit_btn' type='submit' value='Lire la suite ...'></input>
		  	</form>	
	</div>
</div>
