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
require ('../../../nxs-admin/config/nxs-logtab.php');

?>
    <div class="teg_container">
    <div class="nxs-2-last-post-top">
        <div class="nxs-2-last-post-top-l">
          <h4>Posts récemment publiées</h4>
          <input type="submit" value="Voir tous les articles"></input>
          <input type="submit" value="Suivant"></input>
          <input type="submit" value="Précédent"></input>
        </div>
        <div class="nxs-2-last-post-top-r">
          <input type="text" value="Rechercher"></input>
          <input type="submit" value="Rechercher"></input>
        </div>
    </div>
    </div>
    <div class="teg_container">
      <?php releaseTwoLast(2); ?>
    </div>



