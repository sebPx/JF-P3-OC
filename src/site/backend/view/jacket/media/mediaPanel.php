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

<div id="image-panel">
	<div class="image-panel-top">
		<div class="panel-title">
			<label class="title">
				<h6>Choisissez l'image que vous voulez associer à votre post</h6>
			</label>
		</div>
		<div class="panel-close" onclick="panelClose()">Annuler</div>
	</div>
	<div class="image-store">
		<div class="image-grid">
			<?php foreach ($get['media'] as $key => $value) { ?>
					<div class="image-case" id="image-case-<?php echo $get['media'][$key]['name'] ; ?>"onclick="chooseImage('<?php echo $get['media'][$key]['name'] ; ?>')">
						<img class="img-panel-structure" id="image-<?php echo $get['media'][$key]['id'] ; ?>"src="uploads/<?php echo $get['media'][$key]['name'] ; ?>">
					</div>
			<?php } ?>
		</div>
		<div class="image-selected">
			<label class="title">
				<h6>Vérifiez et validez votre choix</h6>
			</label>
			<div class="image-selected-container">
				<div id="image-view">
					</br></br></br>Visualisez ici votre image sélectionnée.
				</div>
				<div class="image-info-panel">
					<div id="image-info">
						<strong>Nom de l'image :</strong> </br></br></br><strong>Decription :</strong>
					</div>
					<input type="hidden" id="image-temp" value="none">
					<div class="panel-close" onclick="validImage(), panelClose()">Terminer</div>
				</div>
			</div>
		</div>
	</div>
</div>
