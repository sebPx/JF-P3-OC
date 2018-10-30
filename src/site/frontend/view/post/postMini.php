<?php
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


/* Chargement de l'environnement de Noxus */
?>

<div class="jacket-mini" onclick='launch("article/<?php echo $get['items'][$key3]['id']; ?>");'>
	<div class="jacket-mini-title">
		<img src="assets/frontend/images/article.png" alt="Logo d'une catégorie / Tag" style="height: 15px;position: relative;right:2px;top: 3px;" />
		<?php echo $get['items'][$key3]['title']; ?>
	</div>
	<div class="jacket-mini-resume"><?php echo $get['items'][$key3]['resume']; ?></div>
	
	<div class="jacket-mini-bot">
		<div class="jacket-mini-author">
			<img src="assets/frontend/images/man-user.png" alt="Logo d'une catégorie / Tag" style="height: 15px;position: relative;right:2px;top: 3px;" />
			<?php echo $get['items'][$key3]['author']; ?>
		</div>
		<div class="jacket-mini-cat">
			<img src="assets/frontend/images/tag.png" alt="Logo d'une catégorie / Tag" style="height: 15px;position: relative;top: 3px;" />
			<?php echo $get['items'][$key3]['category']; ?>
		</div>		
	</div>
</div>
