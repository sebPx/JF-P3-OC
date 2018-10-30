<?php
/*
	Template:       Naxter
	Theme URL:      https://naxter.fr
	Author:         Sebastien P.
	Author URL:     https://naxter.fr/creator
	Description:    Naxter engine production ©
	Contact:        contact@naxter.fr
	Version:        1.0
	License:        GNU General Public License v3 or later
	License URI:    http://www.gnu.org/licenses/gpl-3.0.html
	Text Domain:    Naxter ©
	Mention légale: Textes codés et utilisés par Naxter engine © ayant droit d'auteur sur le contenu suivant.
*/


/* Chargement de l'environnement de Naxter */
?>
		<footer>
			<div class="teg_container">
				<div id="footer_content">
						<div class="footer_l">
							<nav class="footer">
								<ul class ="footer_nav">
							<?php 
								foreach ($get['nav']['link'] as $key => $value) {
									if ($get['nav']['link'][$key]['nav'] == "Footer") {
										include ('../src/site/frontend/view/nav/nav.php');
									}
								}
							?>
								</ul>
							</nav>
						</div>
					
						<div class="footer_r">
							<div class="langue">
								<form action="/action_page.php">
								  <select name="cars">
								    <option value="Allemand">Allemand</option>
								    <option value="Anglais">Anglais</option>
								    <option value="Espagnol">Espagnol</option>
								    <option value="Francais"selected>Français</option>
								  </select>
								</form>
							</div>
						</div>
				</div>

				<div id="bot_footer">
					<div class="footer_bot_l">
						<div class="site-info">
							<span class="copy-info">Copyright © 2018 jean-forteroche.fr  </span>
							<span class="sep"> | </span>
							<span class="copy-info">
							<?php 
								foreach ($get['nav']['link'] as $key => $value) {
									if ($get['nav']['link'][$key]['nav'] == "Legal") {
										include ('../src/site/frontend/view/nav/nav.php');
									}
								}
							?>

							</span>
							</br>
							<span class="copy-info">Site créé par <a href="https://naxter.fr">Naxter</a> tous droits réservés</span>
						</div>
						<figure class="logo_footer">
							<img src="assets/frontend/images/logo-JF-3.png" alt="Logo Jean Forteroche" style="height: 80px;margin-left:15px;opacity: 0.8" />
						</figure>			
					</div>	
					<div class="footer_bot_r">
						<div class="reseaux">
							<h4>Suivez moi sur :</h4>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</body>
</div>
</html>