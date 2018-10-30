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
		<h2>Contactez moi !</h2>
		<div class="profil-title">
			<div class="teg_container">
				<div class="subtitle">
					Vous souhaitez me contacter ?</br> Vous n'avez qu'a remplir ce formulaire et je m'occuperais dès que possible de votre demande !
				</div>		
			</div>
		</div>	
		<div class="teg_container">
	  		<article class="nxs-page-pattern">
				<section class="contact">	
					<div class="contact-left-nav">
						<ul class="profil-nav">
							<li onclick='launch("page/32");'>Collaborateurs</a></li>
							<li onclick='launch("page/36");'>A propos</a></li>
							<li onclick='launch("page/500");'>F.A.Q</a></li>
							<li onclick='launch("page/39");'>Assistance</a></li>
							<li onclick='launch("page/40");'>Mentions légales</a></li>
						</ul>					
					</div>
					<div class="contact-right-panel">
						<div id="infoArea"></div>
						<?php include ('../src/site/frontend/view/form/courier.php'); ?>
					</div>
				</section>
	  		</article>
		</div>
		<div class="contact-info">
			<div class="contact-info-content">
				<div class="contact-info-left">
					<img src="assets/frontend/images/logo-JF-3.png" alt="Logo Noxus.fr" style="height: 100px;margin:auto;" />
				</div>
				<div class="contact-info-right">
					<div class="coord">
						<img src="assets/frontend/images/envelope.png" alt="Logo Noxus.fr" style="height: 22px;position: relative;left: 50px;" />
						<div class="content-coord">
							<strong>Jean Forteroche</strong></br></br>
							4192 Walnut Avenue</br>
							Newark, NJ 07102</br>
							France
						</div>
					</div>
					<div class="coord">
						<img src="assets/frontend/images/phone-call.png" alt="Logo Noxus.fr" style="height: 22px;position: relative;left: 50px;" />
						<div class="content-coord">
							<strong>Téléphone</strong></br></br>
							(+33) 201-543-2896
						</div>
					</div>
					<div class="coord">
						
						<img src="assets/frontend/images/email.png" alt="Logo Noxus.fr" style="height: 22px;position: relative;left: 50px;" />
						<div class="content-coord">
							<strong>Adresse e-mail</strong></br></br>
							jean-forteroche@naxter.fr
						</div>
					</div>
				</div>
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