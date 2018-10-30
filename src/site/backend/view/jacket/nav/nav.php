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
<?php 
if (!isset($get)) {
	$get = $_POST;
}
 ?>
<div id="menu-review-top">
	<div id="link-title">
		<?php 
		if (isset($get['module'])) {
			switch ($get['module']) {
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
		}else{
			echo "Tableau de bord :";
		}
		?>
	</div>
	<div id="infoArea">
		<?php 
		if (isset($get['response'])) {
			echo $get['response'];
		} ?>
	</div>
	<div class="links-help">
		<a href="">Options d'optimisation</a>
		<a href="">Aide ?</a>
	</div>
</div>
<div class="menu-review-content">
	<div class="avatar"><img src="uploads/avatar/<?php echo $get['sid']['user']['avatar']; ?>"></div>
	<div class="menu-review-content-right">
		<div id="menu-review-mid">
			<div class="menu-filter-nav">
				Bienvenue, </strong><strong><?php echo ucfirst($get['sid']['user']['login']); ?></strong>
			</div>

		</div>
		<div id="menu-review-bot">
			<div class="menu-filters">
			<?php
				$i = 0;
				foreach ($get['level'] as $key2 => $value2) {
					if ($get['level'][$key2]['level'] == $get['sid']['user']['level']) {?>
						Vous êtes enregistré au grade de : <?php echo ucfirst($get['level'][$key2]['name']); ?>.</br>	
			<?php 	$i ++;
					}
				} if ($i == 0) {?>
					Erreur votre grade n'est pas défini, erreur code : <?php echo ucfirst($get['sid']['user']['level']); ?>.</br>
			<?php }  ?>
				Votre dernière connection était le : <?php echo $get['sid']['user']['lastCo'] ;?>
				
			</div>
			<div class="menu-elements">
				<div class="menu-search">
					<input type="text"></input>
					<input type="submit" id="doaction" class="button action" value="Rechercher">
				</div>				
			</div>
		</div>
	</div>
</div>