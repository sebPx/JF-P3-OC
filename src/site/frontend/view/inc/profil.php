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
	<div class="profil-title">
		<section class="profil">
			<div class="title-left">
				<div class="avatar"><img src="uploads/avatar/<?php echo $get['user']['0']['avatar']; ?>"></div>
				<div class="login"><strong><?php echo ucfirst($get['user']['0']['login']); ?></strong></div>
			</div>
			<div class="title-right">
				<h3>Bienvenue sur votre espace !</h3>
			</div>
		</section>
	</div>
		<div class="teg_container">
	  		<article class="nxs-page-pattern">
				<section class="profil">	
					<div class="profil-left">					
						<ul class="profil-nav">
							<li onclick='launch("profil");'>Mon profil</a></li>
							<li onclick='launch("profil/info");'>Modifier mes informations personnelle</a></li>
							<li onclick='launch("profil/email");'>Modifier mon adresse e-mail</a></li>
							<li onclick='launch("profil/pass");'>Modifier mon mot de passe</a></li>
							<li onclick='launch("contact");'>Contacter un administrateur</a></li>
							<li onclick='launch("support");'>Support</a></li>
						</ul>						
					</div>
					<div class="profil-right">
					<?php 
						if (isset($get['link'])) {
							include '../src/user/view/frontend/view/profil/'.$get['link'].'.php';
						}else{
							include '../src/user/view/frontend/view/profil/profil.php';
						}
					?>
					</div>
				</section>
	  		</article>
		</div>
		<div class="policies">		
			<div class="policies-content">
				<img src="assets/frontend/images/info.png" alt="Information importante" style="height: 22px;width: 22px;position: relative;right: 40px;top:  20px;" />	
				<strong>Notes de confidentialités :</strong></br>
				Et est admodum mirum videre plebem innumeram mentibus ardore quodam infuso cum dimicationum curulium eventu pendentem. haec similiaque memorabile nihil vel serium agi Romae permittunt. ergo redeundum ad textum.</br>

				In his tractibus navigerum nusquam visitur flumen sed in locis plurimis aquae suapte natura calentes emergunt ad usus aptae multiplicium medelarum. verum has quoque regiones pari sorte Pompeius Iudaeis domitis et Hierosolymis captis in provinciae speciem delata iuris dictione formavit.</br></br>

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
<script src="assets/js/eventReader.js"></script>