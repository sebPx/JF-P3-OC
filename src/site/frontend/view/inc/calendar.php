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
		<h2>Evènements</h2>
		<div class="profil-title">
			<div class="teg_container">
				<div class="subtitle">
					Retrouvez ici tous les évènements que j'ai prévu, certains où vous pourrez me rencontrer, ou simplement de grande annonces à venir.
				</div>		
			</div>
		</div>	
		<div class="teg_container">
			<div class="event-top-panel">
				<div class="event-top-first" onclick='launch("<?php echo $get['event']['0']['id']; ?>");'>
					<div class="content">

						<div class="title">
							<img src="assets/frontend/images/push-pin.png" alt="Logo Noxus.fr" style="height: 20px;position: relative;right: 10px;top: 2px;" />
							<strong><?php echo $get['event']['0']['title']; ?></strong>
						</div>
						<div class="all-content"><?php echo $get['event']['0']['content']; ?>...</div>					
					</div>
					<div class="infos">
						<div class="date">
							<?php $date = new \DateTime($get['event']['0']['eventDate']); ?>
							<div class="date-string">
								<div class="event-day"><?php echo date_format($date, 'l'); ?></div>
								<div class="event-month"><?php echo date_format($date, 'F'); ?></div>
							</div>
							<div class="event-number"><?php echo date_format($date, 'j'); ?></div>
						</div>
						<div class="location">
							<img src="assets/frontend/images/placeholder.png" alt="Logo Noxus.fr" style="height: 22px;position: relative;right: 10px;" />
							<?php echo $get['event']['0']['location']; ?>
						</div>
					</div>
				</div>
				
				<div class="event-top-two">	 				
					<?php	
						$i = 0;
						foreach ($get['event'] as $key2 => $valu2) {
							if ($i < 2 && $key2 > 0) {
					?>		
								<div class="event-two" onclick='launch("<?php echo $get['event'][$key2]['id']; ?>");'>
									<div class="date-two">
										<?php $date = new \DateTime($get['event'][$key2]['eventDate']); ?>
										<div class="event-day"><?php echo date_format($date, 'l'); ?></div>
										<div class="event-number"><?php echo date_format($date, 'j'); ?></div>
										<div class="event-month"><?php echo date_format($date, 'F'); ?></div>
									</div>
									<div class="content-two">
										<div class="content-two-title">
											<?php echo $get['event'][$key2]['title']; ?>
										</div>
										<div class="content-two-resume">
											<?php echo $get['event'][$key2]['resume']; ?>
										</div>
										<div class="content-two-location">
											<img src="assets/frontend/images/placeholder.png" alt="Logo Noxus.fr" style="height: 15px;position: relative;right: 5px; top:2px;" />
											<?php echo $get['event'][$key2]['location']; ?>
										</div>
									</div>								
								</div>
					<?php	
								$i ++;
							}else if ($key2 == 0) {
								$i = 0;
							}else{
								break;
							}
						}
					?>
				</div>
			</div>
			<h4>D'autres évnènements à venir :</h4>
	  		<article class="event-table">
				<table style="width:100%">
				  	<tr>
				    	<th class="date">Date de l'évènement</th>
				    	<th class="alt">Description</th>
				    	<th class="location">Localisation</th> 
				  	</tr>
						<?php	
							foreach ($get['event'] as $key => $value) {
								if ($key > 2) {			
									include ('../src/site/frontend/view/event/eventTable.php');
								}
							}
						?>
				</table>

	  		</article>
		</div>
	</div>
</content>
<script type='text/javascript'>
	function launch(id) {
		var link = "index.php?frontend/site/event/"+id
	    document.location.href=link;
	}
</script>