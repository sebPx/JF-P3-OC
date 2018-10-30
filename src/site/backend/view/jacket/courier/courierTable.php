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
	<div class="li-courier-left">
		<div class='name' >De : <?php echo $get['post'][$key]['name']; ?></div>
		<div class='date' >Le :<?php echo $get['post'][$key]['date']; ?></div>	
		<div class='subject' ><?php echo $get['post'][$key]['subject']; ?></div>
	</div>					
	
	<div class="li-courier-right">								
				
				<button  id="check-<?php echo $get['post'][$key]['id']; ?>" value="courier" class="check_btn-<?php echo $get['post'][$key]['id']; ?>" style="display: none;"></button>
				<button  id="reply-<?php echo $get['post'][$key]['id']; ?>" value="courier" class="uncheck_btn">Répondre</button>
				<button  id="classify-<?php echo $get['post'][$key]['id']; ?>" value="courier" class="uncheck_btn">Archiver</button>
				</br>
				<button  id="delete-<?php echo $get['post'][$key]['id']; ?>" value="courier" class="delete_btn" >Supprimer</button>	
	</div>
</li>	