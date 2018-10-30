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
	<div class="li-review-contact">
		<div class="li-review-contact-content">
			<div class="li-review-top">
				<div class="li-review-left">
					<div class='review-author' ><strong><?php echo $get['post'][$key]['name']." ".$get['post'][$key]['surname']; ?></strong></div>
					<div class='review-date' >Note : <?php echo $get['post'][$key]['note']; ?></div>
				</div>
			</div>
			<div class ='li-review-contact-bot'>							
				<img src="assets/backend/images/add.png" id="catch-<?php echo $get['post'][$key]['id']; ?>" alt="<?php echo $get['post'][$key]['email']; ?>" class="catch_btn" ></img>				
			</div>
		</div>
	</div>
</li>	