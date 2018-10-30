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

<li style = 'border-left: 5px solid #1a8ae2; background-color: #cccccc8c;border-bottom: 1px solid white;'>				
	<div class="li-review">
		<div class="li-review-content">
			<div class="li-review-top">
				<div class="li-review-left">
					<div class='review-author' >Menu : <strong><?php echo $get['post']['link'][$n]['nav']; ?></strong></div>
					</br>
				</div>
				<div class="li-review-center">
					</br>
					</br>
				</div>
			</div>
			
			<div class ='li-review-bot'>

		  <?php if ($link == "trash") { ?>	
					<button  id="restaure-<?php echo $get['post']['link'][$n]['nav']; ?>" value="<?php echo $get['module']; ?>" class="uncheck_btn">Restaurer</button>
		  <?php }else if ($link == "archive") {?>
		  			<button  id="unClassify-<?php echo $get['post'][$key]['id']; ?>" value="<?php echo $get['module']; ?>" class="uncheck_btn">Désarchiver</button>
		  <?php } ?>								
				<button  id="erase-<?php echo $get['post']['link'][$n]['nav']; ?>" value="<?php echo $get['module']; ?>" class="delete_btn" >Effacer</button>
			</div>
		</div>
		
		<div class="li-review-right">
			<div class='review-id' >ID : <?php echo $get['post'][$key]['id']; ?></div>
		</div>
	</div>
</li>	