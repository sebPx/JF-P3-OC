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
		<h2><?php echo $get['cat']['0']['name']; ?></h2>
		<div class="profil-title">
			<div class="teg_container">
				<div class="subtitle">
					<?php echo $get['cat']['0']['alt']; ?>
				</div>		
			</div>
		</div>	
		<div class="teg_container">
	  		<article class="nxs-page-pattern">
	  		<div class="category-container">
		  		<div class="jacket-container">
					
					<?php 				
						if (!isset($get['post'])) {
					?>
						<div style="text-align: center;width: 100%;margin-top: 20px"><strong>Cette catégorie ne contient pas d'articles.</strong></div>	
					<?php 
						}else{
							foreach ($get['post'] as $key => $value) {
								include ('../src/site/frontend/view/post/postPreview.php');
							}
						}
					?>
				</div>
				<div class="links-aside">
					<div class="research-link">
						<input type="text" name="search" placeholder="Faites votre recherche !">
						<button>Rechercher</button>
					</div>
					<h4>Nos autres catégories :</h4>
					<div class="archives">
						<ul>
							<?php 	foreach ($get['allCat'] as $key2 => $value2) { 
										if ($get['allCat'][$key2]['name'] != $get['cat']['0']['name']) {
							?>
											<li onclick='launch("category/<?php echo $get['allCat'][$key2]['name']; ?>");'>
												<img src="assets/frontend/images/tag.png" alt="Logo d'une catégorie / Tag" style="height: 15px;position: relative;right:7px;top: 2px;" />
												<?php echo $get['allCat'][$key2]['name']; ?>
											</li>
							<?php	
										}
									}
							?>
						</ul>
					</div>
					<h4>Avoir aussi :</h4>
					<div class="other-links">
						<?php 	
							$i = 0;
							foreach ($get['items'] as $key3 => $value3) { 
								if ($i < 3 && $get['items'][$key3]['category'] != $get['cat']['0']['name']) {
									include ('../src/site/frontend/view/post/postMini.php');
									$i++;
								}
							}
						?>
					</div>
				</div>
			</div>
	  		</article>
		</div>
		<div class="articles-info">		
			<div class="articles-info-content">
				<img src="assets/frontend/images/info.png" alt="Information importante" style="height: 22px;width: 22px;position: relative;right: 40px;top:  20px;" />	
				<strong>Informations utiles :</strong></br>
				Siquis enim militarium vel honoratorum aut nobilis inter suos rumore tenus esset insimulatus fovisse partes hostiles, iniecto onere catenarum in modum beluae trahebatur et inimico urgente vel nullo, quasi sufficiente hoc solo, quod nominatus esset aut delatus aut postulatus, capite vel multatione bonorum aut insulari solitudine damnabatur.</br>
			</div>	
		</div>
	</div>
</content>
<script type='text/javascript'>
	function launch(id) {
		var link = "index.php?frontend/site/"+id
	    document.location.href=link;
	}
</script>