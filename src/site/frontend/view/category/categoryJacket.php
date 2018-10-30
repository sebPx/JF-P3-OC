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
?>

<div class="category-jacket" onclick='launch("<?php echo $get['cat'][$key]['name']; ?>");'>
	<img src="assets/frontend/images/tag.png" alt="Logo d'une catégorie / Tag" style="height: 20px;position: relative;left: 7px;top: 23px;" />
	<div class="category-name"><strong><?php echo $get['cat'][$key]['name']; ?></strong></div>
	<div class="category-alt"><?php echo $get['cat'][$key]['alt']; ?></div>
</div>