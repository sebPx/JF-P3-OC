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
<div id="comment">
	<div id="comment-review-left">
		<div id="page-menu-top">
			<button  id="archive" value="comment" onclick="popup('large');" >Archives des commentaires</button>
			<button  id="trash" value="comment" onclick="popup('large');" >Corbeille</button>
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
		<div class="reg-comment">
			<div class="reg-comment-table">
				<ul>
				<?php
					$get = $_POST;
					$get['post'] = array_reverse($get['post']);
					$n = 0;
					foreach ($get['post'] as $key => $value) {
						if ( $n < 100 ) {
							include ('../jacket/comment/commentTable.php');
							$n ++;					
						}
					}
				?>
				</ul>
			</div>
		</div>
	</div>	
	
	<div id="comment-review">
		<div class="comment-review-actu">
			<label class ="toolbar" for="post-content">
				Détails du commentaire :
			</label>
			<div id ="detail-comment">
				
				<?php if (isset($get['object']['0'])) { ?>
					
					<div class="comment-header">
						<div class="comment-left">
							<div class="comment-infos">	
								<?php if ( $get['object']['0']['approve'] == 1) { ?>
									<div class="comment-state-details">
										<img src="assets/backend/images/checked.png" style="height: 16px;padding-right: 5px;margin-top:2px;"></img>
										<div> Ce commentaire a été approuvé par un membre de l'administration.</div>
									</div>	
								
								<?php }else if( $get['object']['0']['reported'] == 1){ ?> 
									<div class="comment-state-details">
										<img src="assets/backend/images/exclamation.png" style="height: 16px;padding-right: 5px;margin-top:2px;"></img>
										<div> Ce commentaire a été signalé par un utilisateur !</div>
									</div>
								<?php }else{ ?>
									<div class="comment-state-details">
										<img src="" style="height: 16px;padding-right: 5px;margin-top:2px;"></img>
									</div>
								<?php } ?>
								
								<div class="sender" style="font-weight: bold;margin-left: 22px;">De : <?php echo $get['object']['0']['author'];?></div>
								<div class="date" style="margin-left: 22px;">Le :<?php echo $get['object']['0']['date']; ?></div>
								
								<?php if ($get['object']['0']['comment'] != 0) { ?>
									<div class="response-comment" style="margin-left: 22px;">Réponse au commentaire #<?php echo $get['object']['0']['comment']; ?></br></div>
								<?php }else{echo "</br>";} ?>
								
								<div class="post-link" style="margin-left: 22px;">Commentaire sur le post : <a style="color: #1a8ae2; font-weight: bold;" href="index.php?frontend/site/article/<?php echo $get['object']['0']['post'];?>" onclick="popup('normal');"><?php echo "&lt;".$get['object']['0']['postTitle']."&gt;"; ?></a></div>
							</div>
							
							<div class="comment-action">
								<?php if ($get['object']['0']['approve'] == 1) { ?>
									<button  id="unApprove-<?php echo $get['object']['0']['id']; ?>" value="comment" >Désapprouver</button>
								<?php }else{ ?>
									<button  id="approve-<?php echo $get['object']['0']['id']; ?>" value="comment" >Approuver</button>
								<?php } ?>
								<button  id="reply-<?php echo $get['object']['0']['id']; ?>" value="comment" onclick="popup('large');">Répondre</button>
								<button  id="unCheck-<?php echo $get['object']['0']['id']; ?>" value="comment" >Marquer comme non vu</button>
								</br>
								<button  id="delete-<?php echo $get['object']['0']['id']; ?>" value="comment" class="delete_btn" >Supprimer</button>	
							</div>
						</div>
						<div class="comment-right">
							<div class="odds">Côte du commentaire :</br><?php echo $get['object']['0']['odds']; ?></div>
							<div class="odds-count">
								<div class="up">Nombre de Plus :</br><?php echo $get['object']['0']['up']; ?></div>
								<div class="down">Nombre de Moins :</br><?php echo $get['object']['0']['down']; ?></div>								
							</div>	
						</div>				
					</div>
					<div class="content">
						<?php echo $get['object']['0']['content']; ?>
					</div>
				<?php }else{ ?>
					<div class="comment-header"></div>
					<div class="content">Sélectionnez un commentaire pour le voir en détail.</div>
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