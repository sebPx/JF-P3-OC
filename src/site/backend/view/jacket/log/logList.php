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

<li>
	<div class='logs-actor' >L'utilisateur : <?php echo $get['log'][$key]['actor']; ?></div>
	<?php
		$i = 0;
		foreach ($get['index'] as $key2 => $value2) {
			if ($get['index'][$key2]['code'] == $get['log'][$key]['action']) {?>
				<div class='logs-action' ><?php echo $get['index'][$key2]['content']; ?></div>	
	<?php 	$i ++;
			}
		} if($i == 0){?>
			<div class='logs-action' >Action non définie erreur code : <?php echo $get['log'][$key]['action']; ?>.</div>
	  <?php } ?>

	<div class='logs-object' ><?php echo $get['log'][$key]['object']; ?></div>
	<div class='logs-date' >Le : <?php echo $get['log'][$key]['date']; ?></div>
</li>