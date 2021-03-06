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

<li style ='border-left: 5px solid <?php echo $get['post'][$key]['color']; ?>; background-color: #cccccc8c;border-bottom: 1px solid white;'>
	<div class="li-review">
		<div class="li-review-content">
			<div class="li-review-top">
				<div class="li-review-left">
					<div class='review-author' >Grade : <strong><?php echo $get['post'][$key]['name']; ?></strong></div>
					<div class='review-date' >Niveau : <?php echo $get['post'][$key]['level']; ?></div>
				</div>
				<div class="li-review-center">
					<div class='review-resume' >Description : <?php echo $get['post'][$key]['alt']; ?></div>
				</div>
			</div>
			
			<div class ='li-review-bot'>							
				<button  id="edit-<?php echo $get['post'][$key]['id']; ?>" value="level" class="uncheck_btn">Modifier</button>
				<button  id="delete-<?php echo $get['post'][$key]['id']; ?>" value="level" class="delete_btn" >Supprimer</button>
			</div>
		</div>
		
		<div class="li-review-right">
			<div class='review-id' >ID : <?php echo $get['post'][$key]['id']; ?></div>
		</div>
	</div>
</li>	