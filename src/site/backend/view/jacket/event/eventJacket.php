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

<div name ='nxs-jacket' class ='nxs-jacket-event'>
	<div name ='nxs-jacket-inner' class ='nxs-jacket-inner'>
		<div class ='nxs-jacket-content-event'>
			<div class="event-left">
				<?php $date = new \DateTime($get['post'][$key]['eventDate']); ?>
				<div class="event-day"><?php echo date_format($date, 'l'); ?></div>
				<div class="event-number"><?php echo date_format($date, 'j'); ?></div>
				<div class="event-month"><?php echo date_format($date, 'F'); ?></div>
			</div>
		
			<div class="event-right">
			  	<div class ='nxs-jacket-event-top'>
			  		<div class ='nxs-jacket-top-l'><h3><?php echo $get['post'][$key]['title']; ?></h3></div>
			  		<div class ='nxs-jacket-top-r'>Event id :<?php echo $get['post'][$key]['id']; ?></div>
			  	</div>
	  	
	  			<div class ='nxs-jacket-event-bar'>
	  				<div class="event-location"><img src="assets/backend/images/flag.png"><strong><?php echo $get['post'][$key]['location']; ?></strong></div>
	  				<div class="event-content"><?php echo $get['post'][$key]['resume']; ?></div>
					<div class ='nxs-jacket-edit-bar'>
						<button  id="classify-<?php echo $get['post'][$key]['id']; ?>" value="event" class="edit_btn">Archiver</button>
						<button  id="edit-<?php echo $get['post'][$key]['id']; ?>" value="event" onclick="popup('large');" class="edit_btn">Modifier</button>
						<button  id="delete-<?php echo $get['post'][$key]['id']; ?>" value="event" class="delete_btn">Supprimer</button>
			  		</div>
	  			</div>	
	  		</div>
	  	</div>
	  	<div class ='nxs-jacket-bot'>
	  		<div class ='nxs-jacket-bot-l'>
	  			<div class ='nxs-jacket-bot-author'><?php echo $get['post'][$key]['author']; ?></div>
	  			<div class ='nxs-jacket-bot-cat'><?php echo $get['post'][$key]['category']; ?></div>
	  		</div>
	  		<div class ='nxs-jacket-bot-r'><?php echo $get['post'][$key]['date']; ?></div>
	  	</div>
	</div>
</div>