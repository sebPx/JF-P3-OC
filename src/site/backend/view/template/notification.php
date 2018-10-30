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
?>
<div id="notifications">
	<div class="notif-review-left">
		<div id="page-menu-top">
			<button  id="archive" value="notification" onclick="popup('large');" >Archives des notifications</button>
			<?php 
			if ($_SESSION['user']['level'] == "developer") { ?>
				<button  id="archive" value="notification" onclick="popup('large');" >Archives des logs</button>
			<?php } ?>
			<button  id="trash" value="notification" onclick="popup('large');" >Corbeille</button>
		</div>
		<div id="notif-review-left">
			<div id="grid-recup">
				<?php
					$get = $_POST;
					$i = 0;
					foreach ($get['post'] as $key => $value) {
						if ( $i < 2) {
							include ('../jacket/notification/notificationJacket.php');
							$i ++;					
						}
					}
				?>
			</div>
			<div class="notif-review-actu">
				<label class ="toolbar" for="post-content">
					Détails de la notification :
				</label>
				<div id ="detail-notif">
					<?php if (isset($get['object']['0'])) { ?>
						<div class="notification-content">
							<div class="notif-review-content-left">
								<h4>Vous avez reçu une nouvelle notification :</h4>
								<div class="sender">de : <strong><?php echo $get['object']['0']['sender']; ?></strong></div>
								<div class="date">Le : <?php echo $get['object']['0']['date']; ?></div>
								</br>
								<div class="content">
									<?php 
										foreach ($get['index'] as $key2 => $value2) {
											if ($get['index'][$key2]['code'] == $get['object']['0']['content']) {?>
												<div class='logs-action' ><?php echo $get['index'][$key2]['content']; ?>
												➼ <strong><?php echo $get['post'][$key2]['subject']; ?></strong>
												</div>	
									<?php 	}
										}
									 ?>	
								</div>
							</div>							
							<div class="btn-right">
								<button  id="classify-<?php echo $get['object']['0']['id']; ?>" value="notification" class="uncheck_btn" >Archiver</button>
								<button  id="unCheck-<?php echo $get['object']['0']['id']; ?>" value="notification" class="uncheck_btn">Marquer comme non vu</button>
								</br></br></br>
								<button  id="delete-<?php echo $get['object']['0']['id']; ?>" value="notification" class="delete_btn" >Supprimer</button>		
							</div>
						</div>
					<?php }else{ ?>
						Sélectionnez un courrier pour le voir en détail.
					<?php } ?>
				</div>
			</div>
		</div>	
	</div>	
	<div id="notif-review">
		<div class="reg-notif">
		<div class="filter-options">
			<div class="filter-bar">	
				<form id="filter" action="" method="post" accept-charset="utf-8">	
					<input type="hidden" name="event" value="courier">
					<input type="hidden" name="action" value="courier">
					<div class="filter-line1">
						<label class="input">Filtrer par :</label>
						<select name="getter">
							<option value="id">Identifiant</option>
							<option value="author">Auteur</option>
							<option value="title">Titre</option>
							<option value="category">Categorie</option>
							<option value="all" selected="">Tous</option>
						</select>
						<input type="text" id="value" name="value" placeholder="Valeur du filtre :" maxlength="200">
						<input type="submit" value="Filtrer" name="filter" id="filter-submit-btn">
					</div>
					 
				</form>
			</div>
		</div>

			<div class="reg-notif-table">
				<ul>
				<?php
					$n = 0;
					$get['post'] = array_reverse($get['post']);
					foreach ($get['post'] as $key => $value) {
						if ( $n < 100) {
							include ('../jacket/notification/notificationTable.php');
							$n ++;					
						}
					}
				?>
				</ul>
			</div>
		</div>
	</div>
</div>
<script src="assets/js/eventReader.js"></script>
<script type='text/javascript'>
	function addLi(id) {
	    $('.check_btn-'+id).click();
	}
</script>
