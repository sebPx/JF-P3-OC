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
  	<div name ='nxs-release-last' class ='nxs-release-last' onclick='launch("article/<?php echo $get['post'][$key]['id']; ?>");'>
	  	<div name ='nxs-release-last-jacket' class ='nxs-release-last-jacket' style="background-image: url('uploads/<?php echo $get['post'][$key]['image']; ?>');">
	  		
	  		<div class ='nxs-release-last-top'>
				<img src="assets/frontend/images/article.png" alt="Logo d'une catégorie / Tag" style="height: 24px;position: relative;left:15px;top: 37px;" />
		  		<h3><?php echo $get['post'][$key]['title']; ?></h3>
	  		</div>
		  	
		  	<div class="nxs-release-content">
				<div class ='nxs-release-last-top-dw'>Publié le, <?php echo $get['post'][$key]['date']; ?></div>
		  		<div class ='nxs-release-last-mid'><?php echo $get['post'][$key]['resume']; ?></div>	  				 	
		  	</div>
	  		
	  		<div name ='nxs-release-last-content' class ='nxs-release-last-content'>
				<div class ='nxs-release-last-bot'>
					<div class ='nxs-release-last-bot-sign'>Rédigé par <?php echo $get['post'][$key]['author']; ?>.</div>		
					<div class ='nxs-release-last-bot-cat'>
							<img src="assets/frontend/images/tag.png" alt="Logo d'une catégorie / Tag" style="height: 15px;position: relative;right:7px;top: 2px;" />					
							<?php echo $get['post'][$key]['category']; ?>		
					</div>
		  		</div>
			</div>

	  	</div> 			
	</div>
</div>

