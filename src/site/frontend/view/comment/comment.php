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
<div id="response-content">
	<?php 
	if (!isset($get)) { 
		$get['comment'] = $_POST['post'];
	}

	foreach ($get['comment'] as $key => $value) { 
		if ($get['comment'][$key]['comment'] == 0) {
			$nb = 0;
		?>
			<div class="commentSection">
				<?php
				foreach ($get['comment'] as $key2 => $value2) {
					if ($get['comment'][$key]['id'] == $get['comment'][$key2]['comment'] && $get['comment'][$key]['id'] != $get['comment'][$key2]['id']) {
						$nb ++;
					}
				} ?>
				<div class="commentSide">
					<div class="commentUser"><strong><?php echo $get['comment'][$key]['author']; ?></strong></div>
					<?php $color = mt_rand( 0, 0x111111 ); ?>
					<div class="commentAvatar" style="background-color:<?php echo "#".$color."80"; ?>">
						<?php $letter = $get['comment'][$key]['author'];
							echo ucfirst($letter[0]);
						 ?>
					</div>
						<?php if ($nb == 1) { ?>
							<div class="commentResponses" id="commentResponses-<?php echo $get['comment'][$key]['id']; ?>">Une réponse.</div>
						<?php }else if ($nb > 1){  ?>
							<div class="commentResponses" id="commentResponses-<?php echo $get['comment'][$key]['id']; ?>"><?php echo $nb; ?> réponses.</div>
						<?php } ?>						
					
				</div>
				<div class="commentCenter">
					<div class="commentTop">
						<div class="commentContent"><?php echo $get['comment'][$key]['content']; ?></div>
						<div class="commentLike">
							<div class="like">
								<button id="update-<?php echo $get['comment'][$key]['id']; ?>" value="up" >+</button>
							</div>
							<div class="total" id="total-<?php echo $get['comment'][$key]['id']; ?>"> 
								<?php echo $get['comment'][$key]['odds']?> 
							</div>	
							<div class="unlike">
								<button id="update-<?php echo $get['comment'][$key]['id']; ?>" value="down">-</button>
							</div>
						</div>
					</div>
					<div class="commentBot">
						<div class="commentBar">
							<?php if ($get['comment'][$key]['approve'] == 1 ) {?>
								<div class="isValid-comment">
									<img src="assets/frontend/images/checked.png" style="height: 18px;"></img>
									<div class="comment-info-text">Ce commentaire à été approuvé par un modérateur !</div>
								</div>
							<?php }else{ ?>
								<?php if ($get['comment'][$key]['reported'] > 0 ) {?>
									<div id="reported-<?php echo $get['comment'][$key]['id']; ?>">
										<div class="isValid-comment">
											<img src="assets/frontend/images/exclamation.png" style="height: 18px;"></img>
											<div class="comment-info-text">Ce commentaire a été signalé et fera l'objet d'un contrôle de la part d'un modérateur trés prochainement.</div>
										</div>
									</div>
								<?php }else{ ?>
									<div id="reported-<?php echo $get['comment'][$key]['id']; ?>">
										<button id="update-<?php echo $get['comment'][$key]['id']; ?>" value="report" enabled">Signaler</button>
									</div>
								<?php }
							} ?>
						</div>
						<div class="commentInfos">Le <?php echo $get['comment'][$key]['date']; ?></div>
					</div>
				</div>
			</div>

		<div class="responseSection" id="responseSection-<?php echo $get['comment'][$key]['id']; ?>">
			<?php	foreach ($get['comment'] as $key3 => $value3) {
				if ($get['comment'][$key]['id'] == $get['comment'][$key3]['comment'] && $get['comment'][$key]['id'] != $get['comment'][$key3]['id']) { ?>
					<div class="commentResponseSection" id="commentResponseSection">
						<div class="commentSide">
							<div class="commentUser"><strong><?php echo $get['comment'][$key3]['author']; ?></strong></div>
							<?php $color = mt_rand( 0, 0x111111 ); ?>
							<div class="commentAvatar" style="background-color:<?php echo "#".$color."80"; ?>">
								<?php $letter = $get['comment'][$key3]['author'];
									echo ucfirst($letter[0]);
								 ?>
							</div>
						</div>
						
						<div class="commentCenter">
							<div class="commentTop">
								<div class="commentContent"><?php echo $get['comment'][$key3]['content']; ?></div>
								<div class="commentLike">
									<div class="like">
										<button id="update-<?php echo $get['comment'][$key3]['id']; ?>" value="up" >+</button>
									</div>
									<div class="total" id="total-<?php echo $get['comment'][$key3]['id']; ?>"> 
										<?php echo $get['comment'][$key3]['odds']?> 
									</div>	
									<div class="unlike">
										<button id="update-<?php echo $get['comment'][$key3]['id']; ?>" value="down">-</button>
									</div>
								</div>
							</div>
							
							<div class="commentBot">
								<div class="commentBar">
									<?php if ($get['comment'][$key3]['approve'] == 1 ) {?>
										<div class="isValid-comment">
											<img src="assets/frontend/images/checked.png" style="height: 18px;"></img>
											<div class="comment-info-text">Ce commentaire à été validé par un modérateur !</div>
										</div>
									<?php }else{ ?>
										<?php if ($get['comment'][$key3]['reported'] > 0 ) {?>
											<div id="reported-<?php echo $get['comment'][$key3]['id']; ?>">
												<div class="isValid-comment">
													<img src="assets/frontend/images/exclamation.png" style="height: 18px;"></img>
													<div class="comment-info-text">Ce commentaire a été signalé et fera l'objet d'un contrôle de la part d'un modérateur trés prochainement.</div>
												</div>
											</div>
										<?php }else{ ?>
											<div id="reported-<?php echo $get['comment'][$key3]['id']; ?>">
												<button id="update-<?php echo $get['comment'][$key3]['id']; ?>" value="report" enabled">Signaler</button>
											</div>
										<?php }
									} ?>
								</div>
								<div class="commentInfos">Le <?php echo $get['comment'][$key3]['date']; ?></div>
							</div>
						</div>
					</div>
			<?php	}
			} ?>
		</div>
	<?php }
	} ?>
</div>