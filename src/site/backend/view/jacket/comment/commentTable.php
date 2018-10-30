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

	<div class="li-comment-left">
		<div class="li-comment-state">
			<?php if ( $get['post'][$key]['approve'] == 1) { ?>
				<img src="assets/backend/images/checked.png" style="height: 18px; "></img>
			<?php }else if( $get['post'][$key]['reported'] == 1){ ?>
				<img src="assets/backend/images/exclamation.png" style="height: 18px;"></img>
			<?php } ?>
		</div>
		<div class="comment-section-info">
			<div class='name' >De : <?php echo $get['post'][$key]['author']; ?></div>
			<div class='date' >Le :<?php echo $get['post'][$key]['date']; ?></div>	
			<div class='subject' ><?php echo $get['post'][$key]['postTitle']; ?></div>			
		</div>


	</div>					
	
	<div class="li-comment-right">
			<button  id="check-<?php echo $get['post'][$key]['id']; ?>" value="comment" class="check_btn-<?php echo $get['post'][$key]['id']; ?>" style="display: none;"></button>
		<?php if ( $get['post'][$key]['approve'] == 1) { ?>
			<button  id="unApprove-<?php echo $get['post'][$key]['id']; ?>" value="comment" >Désapprouver</button>
		<?php }else{ ?>
			<button  id="approve-<?php echo $get['post'][$key]['id']; ?>" value="comment" >Approuver</button>
		<?php } ?>
			<button  id="classify-<?php echo $get['post'][$key]['id']; ?>" value="comment" >Archiver</button>
			</br>
			<button  id="delete-<?php echo $get['post'][$key]['id']; ?>" value="comment" class="delete_btn" >Supprimer</button>	
	</div>
	<div class="li-comment-odds">
		<?php echo $get['post'][$key]['odds']; ?>
	</div>
</li>	