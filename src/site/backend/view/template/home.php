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
<?php 
if (!isset($get)) {
	$get = $_POST;
}
 ?>
<div id="admin-home">
	<div id="admin-home-panel">
		<div class="admin-home-left">
				<div class="admin-home-news">
					<div class="admin-home-news-l">
						<h4>Statistiques rapide :</h4>
						<div class="home-custom">
							<div class="etat-srv-top">
							Etat du site web :
							</div>
							<div class="home-custom-srv">
								<div class="home-custom-postit">
									<label for="post-it">Post-it</label>
									<textarea id="post-it" name="post-it" onfocus="if(this.value == 'Aquoi pensez vous ?')this.value = '';" onblur="if(this.value == '')this.value = 'Aquoi pensez vous ?';" value="Aquoi pensez vous ?"></textarea> 
								</div>

								<div class="stats-list">
									<ul>
										<?php 
										foreach ($get['stat'] as $key => $value) {
											?>
											<li>
												<div class="stat-name">
													<?php 
													if (isset($get['stat'][$key]['object'])) {
														switch ($get['stat'][$key]['object']) {
															case 'article':
																echo "Articles :";
																break;
															case 'page':
																echo "Pages :";
																break;
															case 'event':
																echo "Evènements :";
																break;
															case 'media':
																echo "Médias :";
																break;
															case 'notification':
																echo "Notifications :";
																break;
															case 'comment':
																echo "Commentaires :";
																break;
															case 'courier':
																echo "Courriers :";
																break;
															case 'user':
																echo "Utilisateurs :";
																break;
															case 'design':
																echo "Apparence :";
																break;
															case 'navigation':
																echo "Navigation :";
																break;
															case 'security':
																echo "Sécurité :";
																break;
															case 'setting':
																echo "Réglages :";
																break;
														}
													}
													?>	
												</div>
												<div class="stat-nb"><?php echo $get['stat'][$key]['value'] ; ?></div>
											</li>
										<?php } ?>									
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="admin-home-news-r">
						<div class="last-post">
							<h4>Découvrez les dernières actualités du site:</h4>
							<?php 
								  foreach ($get['post'] as $key => $value) {
									include ('../jacket/post/articleJacket.php');
								  }
							?>
						</div>
					</div>
				</div>		
				<div class="reg-logs-list">
						<div class="reg-logs-list-title">
							Registre des dernières activités du site :
						</div>
					<div class="reg-logs-table">
						<ul>
							<?php foreach ($get['log'] as $key => $value) {
									include ('../jacket/log/logList.php');
								  }
							?>
						</ul>
					</div>

				</div>
		</div>
		<div class="admin-home-helper">
			<h4>Découvrez l'assitant d'administration !</h4>
		</div>
	</div>
</div>
<script src="assets/js/eventReader.js"></script>
