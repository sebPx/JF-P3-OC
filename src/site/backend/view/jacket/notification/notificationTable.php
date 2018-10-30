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
<?php if ($get['post'][$key]['tracker'] == 0) { ?>
	<li style = 'border-left: 5px solid #1a8ae2; background-color: #cccccc8c;' onclick='addLi(<?php echo $get['post'][$key]['id']; ?>);'>
<?php }else{ ?>
	<li style = 'border-left: 5px solid #58585861;' onclick='addLi(<?php echo $get['post'][$key]['id']; ?>);'>
<?php } ?>					
		<?php 
			foreach ($get['index'] as $key2 => $value2) {
				if ($get['index'][$key2]['code'] == $get['post'][$key]['content']) {?>
					<div class='logs-action' ><strong><?php echo $get['index'][$key2]['content']; ?></strong></div>	
		<?php 	}
			}
		 ?>				
	
	<div class='content-notif' >
		<div class='logs-action' >➼ <?php echo $get['post'][$key]['subject']; ?>
			<div class='logs-actor' >De  <?php echo $get['post'][$key]['sender']; ?>, il y a 
				<div class='logs-date' ><?php echo $get['post'][$key]['date']; ?></div>						
			</div>
		</div>		

		<div class ='nxs-jacket-content-bar'>							
			<button  id="delete-<?php echo $get['post'][$key]['id']; ?>" value="notification" class="delete_btn" >Supprimer</button>
			<button  id="check-<?php echo $get['post'][$key]['id']; ?>" value="notification" class="check_btn-<?php echo $get['post'][$key]['id']; ?>" style='display: none;'></button>
			<?php if ($get['post'][$key]['tracker'] == 1) { ?>
				<button  id="unCheck-<?php echo $get['post'][$key]['id']; ?>" value="notification" class="uncheck_btn">Marquer comme non vu</button>
			<?php } ?>		  		
		</div>
	</div>
</li>	