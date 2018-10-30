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
require ("../config/nxs-logtab.php");
require ("../config/nxs-variables.php");
require ("../config/nxs-session-active.php");
?>  
<script type="text/javascript">

</script>
<div id="menu-review-top">
	<div id="link-title">
	Création de post
	</div>
	<div class="links-help">
		<a href="">Options d'optimisation</a>
		<a href="">Aide ?</a>
	</div>
</div>
<div id="menu-review-mid">
	<div class="menu-filter-nav">
		
	</div>
	<div class="menu-search">
		<input type="text"></input>
		<input type="submit" id="doaction" class="button action" value="Rechercher">
	</div>
</div>
<div id="menu-review-bot">
	<div class="menu-filters">
		<?php echo 'Dernier article: '.NXS_USER_LAST_POST ?>
		
	</div>
	
	<div class="menu-elements">
		Grade : <?php echo NXS_USER_GRADE_REAL; ?>.
	</div>
</div>