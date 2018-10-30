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

<content>
	<div id="content">	
		<div class="teg_container">
	  		<article class="nxs-page-pattern">
				<section class="profil">	
					<h3>Oops ! Un problème est survenu...</h3>
					<div class="profil-left-nav">
						 Erreur <?php echo $get['error']; ?>.					
					</div>
					<div class="profil-right-panel">
						Description : <?php echo $get['content']; ?>.
					</div>
				</section>
	  		</article>
		</div>
	</div>
</content>
<script src="assets/js/eventReader.js"></script>