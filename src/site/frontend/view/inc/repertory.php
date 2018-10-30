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
<content>
	<div id="content">
		<h2>Catégories</h2>
		<div class="profil-title">
			<div class="teg_container">
				<div class="subtitle">
					Cette page fait référence à toutes les catégories présentes sur mon site.</br> 
					Elles vous permettent de naviguer dans les différents sujet abordés par nos rédacteurs et ainsi mieu cibler votre experience utilisateur.
				</div>		
			</div>
		</div>
		<div class="teg_container">
	  		<article class="nxs-page-pattern">
				<div class="grid-category">
					<?php 				
						foreach ($get['cat'] as $key => $value) {
							include ('../src/site/frontend/view/category/categoryJacket.php');
						}
					?>
				</div>
	  		</article>
		</div>
	</div>
</content>
<script type='text/javascript'>
	function launch(id) {
		var link = "index.php?frontend/site/category/"+id
	    document.location.href=link;
	}
</script>