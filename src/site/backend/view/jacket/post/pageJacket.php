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

<div name ='nxs-jacket' class ='nxs-jacket'>
	<div name ='nxs-jacket-inner' class ='nxs-jacket-inner'>
	  	<div class ='nxs-jacket-top'>
	  		<div class ='nxs-jacket-top-l'><h3><?php echo $get['post'][$key]['title']; ?></h3></div>
	  		<div class ='nxs-jacket-top-r'>Post id :<?php echo $get['post'][$key]['id']; ?></div>
	  	</div>
	  	<div class ='nxs-jacket-content'>
	  		<div class ='nxs-jacket-content-bar'><?php echo $get['post'][$key]['resume']; ?></div>
			<div class ='nxs-jacket-edit-bar'>
				<button  id="delete-<?php echo $get['post'][$key]['id']; ?>" value="Page" class="delete_btn">Supprimer</button>
				<button  id="classify-<?php echo $get['post'][$key]['id']; ?>" value="page" class="edit_btn">Archiver</button>
				<button  id="edit-<?php echo $get['post'][$key]['id']; ?>" value="Page" onclick="popup('large');" class="edit_btn">Modifier</button>
	  		</div>
	  	</div>
	  	<div class ='nxs-jacket-bot'>
	  		<div class ='nxs-jacket-bot-l'>
	  			<div class ='nxs-jacket-bot-author'><?php echo $get['post'][$key]['author']; ?></div>
	  			<div class ='nxs-jacket-bot-cat'><?php echo $get['post'][$key]['category']; ?></div>
	  		</div>
	  		<div class ='nxs-jacket-bot-r'><?php echo $get['post'][$key]['date']; ?></div>
	  	</div>
	</div>
</div>