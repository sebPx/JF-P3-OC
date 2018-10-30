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

<div class ='nxs-jacket-menu'>
	<div name ='nxs-jacket-inner' class ='nxs-jacket-inner'>
		<div class ='nxs-jacket-top'>
			<div class ='nxs-jacket-top-l'><h3>Menu : <?php echo $get['post']['nav'][$key]['nav']; ?></h3></div>
			<div class ='nxs-jacket-top-r'></div>
		</div>
		<div class ='nxs-jacket-content'>
			<ul>
			<?php 
				foreach ( $get['post']['link'] as $key2 => $value2) {
					if ($get['post']['nav'][$key]['nav'] == $get['post']['link'][$key2]['nav']) {
						?><li>
							<div class ='nxs-menu-name'><?php echo $get['post']['link'][$key2]['name'] ; ?></div>
							<div class ='nxs-menu-link'>Lié à : <?php  echo $get['post']['link'][$key2]['link'] ;?></div>
						</li>
			<?php   }
				}
			 ?>
			</ul>
				<div class ='nxs-jacket-content-bar'>
					<div class ='nxs-jacket-edit-bar'>
						<button  id="delete-<?php echo $get['post']['nav'][$key]['nav']; ?>" value="navigation" class="delete_btn">Supprimer</button>
						<button  id="edit-<?php echo $get['post']['nav'][$key]['nav']; ?>" value="navigation" onclick="popup('large');" class="edit_btn">Modifier</button>
			  		</div>
				</div>
			<div class ='nxs-jacket-bot'> Description : <?php echo $get['post']['alt'][$key]['alt']; ?></div>
		</div>
	</div>
</div>