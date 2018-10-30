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

<div name ='nxs-jacket' id ='nxs-jacket-notifs'>
	<div name ='nxs-jacket' class ='nxs-jacket'>
		<div name ='nxs-jacket-inner' class ='nxs-jacket-inner'>
			<div class ='nxs-jacket-top'>
				<div class ='nxs-jacket-top-l'><h3><?php echo $get['post'][$key]['subject']; ?></h3></div>
				<div class ='nxs-jacket-top-r'>Il y a  <?php echo $get['post'][$key]['date']; ?></div>
			</div>
			<div class ='nxs-jacket-content'>
				<?php 
					foreach ($get['index'] as $key2 => $value2) {
						if ($get['index'][$key2]['code'] == $get['post'][$key]['content']) {?>
							<div class='logs-action' ><?php echo $get['index'][$key2]['content']; ?></div>	
				<?php 	}
					}
				 ?>	
			</div>
			<div class ='nxs-jacket-bot'>
				<div class ='nxs-jacket-bot-bar'>De : <?php echo $get['post'][$key]['sender']; ?></div>
				<div class ='nxs-jacket-content-bar'>
					<input type='hidden' id ='reg_notif_sub_<?php echo $get['post'][$key]['id']; ?>' value='<?php echo $get['post'][$key]['subject']; ?>'></input>
					<input type='hidden' id ='reg_notif_exp_<?php echo $get['post'][$key]['id']; ?>' value='<?php echo $get['post'][$key]['sender']; ?>'></input>
					<input type='hidden' id ='reg_notif_content_<?php echo $get['post'][$key]['id']; ?>' value='<?php echo $get['post'][$key]['content']; ?>'></input>
					<input type='hidden' id ='reg_notif_date_<?php echo $get['post'][$key]['id']; ?>' value='<?php echo $get['post'][$key]['date']; ?>'></input>
					<input type='button' onclick='addLi(<?php echo $get['post'][$key]['id']; ?>);' value='Détails' name='detail_btn' id='detail_btn'>			  				  
				</div>
			</div>
		</div>
	</div>
</div>