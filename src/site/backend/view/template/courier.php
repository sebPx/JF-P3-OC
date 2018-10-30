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
<div id="courier">
	<div id="courier-review-left">
		<div id="page-menu-top">
			<button  id="email" value="email" onclick="popup('large');" >Nouveau mail</button>
			<button  id="contact" value="contact" onclick="popup('large');" >Contacts</button>
			<button  id="archive" value="courier" onclick="popup('large');" >Archives des courriers</button>
			<button  id="trash" value="courier" onclick="popup('large');" >Corbeille</button>
		</div>
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
		<div class="reg-courier">
			<div class="reg-courier-table">
				<ul>
				<?php
					$get = $_POST;
					$n = 0;
					foreach ($get['post'] as $key => $value) {
						if ( $n < 25) {
							include ('../jacket/courier/courierTable.php');
							$n ++;					
						}
					}
				?>
				</ul>
			</div>
		</div>
	</div>	
	
	<div id="courier-review">
		<div class="courier-review-actu">
			<label class ="toolbar" for="post-content">
				Détails du courrier :
			</label>
			<div id ="detail-courier">
				<?php if (isset($get['object']['0'])) { ?>
					<div class="courier-header">
						
						<div class="courier-left">
							<div class="courier-infos">
								<div class="sender" style="font-weight: bold;">De : <?php echo $get['object']['0']['name']." ". $get['object']['0']['surname'];?></div>
								<div class="senderEmail">Adresse e-mail : <a style="color: #1a8ae2;" href="" onclick="popup('normal');"><?php echo "&lt;".$get['object']['0']['email']."&gt;"; ?></a></div>
								<div class="date">Le :<?php echo $get['object']['0']['date']; ?></div>
								</br></br>
								<div class="subject">Sujet : <?php echo $get['object']['0']['subject']; ?></div>
							</div>
							<div class="courier-action">
								<button  id="classify-<?php echo $get['object']['0']['id']; ?>" value="courier" class="uncheck_btn">Archiver</button>
								<button  id="unCheck-<?php echo $get['object']['0']['id']; ?>" value="courier" class="uncheck_btn">Marquer comme non vu</button>
							</div>
						</div>
						
						<div class="courier-right">
							<button  id="reply-<?php echo $get['object']['0']['id']; ?>" value="courier" onclick="popup('large');" class="uncheck_btn">Répondre</button>
							<button  id="archive-<?php echo $get['object']['0']['id']; ?>" value="courier" onclick="popup('large');" class="uncheck_btn">Transférer</button>
							</br></br></br>
							<button  id="delete-<?php echo $get['object']['0']['id']; ?>" value="courier" class="delete_btn" >Supprimer</button>						
						</div>
					
					</div>
					<div class="content"><?php echo $get['object']['0']['content']; ?></div>
				<?php }else{ ?>
					<div class="courier-header"></div>
					<div class="content">Sélectionnez un courrier pour le voir en détail.</div>
					
				<?php } ?>
			</div>
		</div>
	</div>

</div>

<script type='text/javascript'>

function addLi(id) {
    $('.check_btn-'+id).click();
}
 	

</script>
<script src="assets/js/eventReader.js"></script>