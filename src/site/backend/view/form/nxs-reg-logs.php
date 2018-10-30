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
require ("../config/nxs-logtab.php");

?>  

<section id="add-post-screen">
	<div class="registre">
		<div id="reg-filter">
			<label><h6>Filtrer</h6></label>
			<select name="postState" id="postState">
				<option value="Publier"selected>Année</option>
				<option value="Brouillon">Mois</option>
			</select>
			<select name="postView" id="postView">
				<option value="Publique"selected>Mois</option>
				<option value="Prive">Privé</option>
			</select>
			<input id="date" type="date">
			<label><h6>Trier par</h6></label>
			<select name="postState" id="postState">
				<option value="Publier"selected>Type</option>
				<option value="Brouillon">Mois</option>
			</select>
			<select name="postView" id="postView">
				<option value="Publique"selected>Expéditeur</option>
				<option value="Prive">Privé</option>
			</select>

			<input type="submit" value="Appliquer" name="submit">
		</div>

				<div class="reg-logs-list">
				<label class="infosChar" for="post-content">
					Toolbar :
				</label>
					<div class="reg-logs-table">
						<ul><?php recupLogs(250); ?></ul>
					</div>
				</div>
	</div>
</section>



