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


/* Chargement des pages dans le contenu */

?>
<div id="page-menu-top">
	<button  id="add" value="Event" onclick="popup('large');" >Créer un nouvel évènement</button>
	<button  id="archive" value="event" onclick="popup('large');" >Archives des évènements</button>
	<button  id="trash" value="event" onclick="popup('large');" >Corbeille</button>
</div>

<div id="grid-recup">
	<?php 
		$get = $_POST;
		foreach ($get['post'] as $key => $value) {
			include ('../jacket/event/eventJacket.php');
		}
	?>
</div>

<script src="assets/js/eventReader.js"></script>