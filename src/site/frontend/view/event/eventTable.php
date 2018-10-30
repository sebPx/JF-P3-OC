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
?>
<?php $date = new \DateTime($get['event'][$key]['eventDate']); ?>
<tr onclick='launch("<?php echo $get['event'][$key]['id']; ?>");'>
	<td class="date"><?php echo date_format($date, 'l j F'); ?></td>
	<td>
		<div class='event-title' ><strong><?php echo $get['event'][$key]['title']; ?></strong></div>
		<div class='event-resume' ><?php echo $get['event'][$key]['resume']; ?></div>		
	</td>
	<td class="location"><?php echo $get['event'][$key]['location']; ?></td>
</tr>