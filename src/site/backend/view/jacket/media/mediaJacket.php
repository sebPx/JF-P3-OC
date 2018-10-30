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

/* Chargement de l'environnement du dashboard de l'administration */
?>  

<div name ='nxs-jacket' class ='nxs-jacket-media'>
	<div name ='nxs-jacket-inner' class ='nxs-jacket-inner'>
		<div class ='nxs-jacket-top'>
	  			<div class ='nxs-jacket-top-l'><h3><?php echo $get['post'][$key]['name']; ?></h3></div>
	  			<div class ='nxs-jacket-top-r'></div>
		</div>
		<div class ='nxs-jacket-content'>
	  		<img src='<?php echo $get['post'][$key]['link'].$get['post'][$key]['name']; ?>'></img>
	  		<div class ='media-date'>Ajouté le : <?php echo $get['post'][$key]['date']; ?></div>
	  		<div class ='nxs-jacket-content-bar'>	
				<div class ='nxs-jacket-edit-bar'>
					<button  id="delete-<?php echo $get['post'][$key]['id']; ?>" value="media" class="delete_btn">Supprimer</button>
					<button  id="edit-<?php echo $get['post'][$key]['id']; ?>" value="media" onclick="popup('small');" class="edit_btn">Modifier</button>
		  		</div>
	  		</div>
		</div>
		<div class ='nxs-jacket-bot'>
 			<div class ='nxs-jacket-bot-bar'>Description : <?php echo $get['post'][$key]['alt']; ?></div>
		</div>
	</div>
</div>