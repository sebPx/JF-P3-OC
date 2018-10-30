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

<div name ='nxs-jacket' class ='nxs-jacket'>
    <div name ='nxs-jacket-inner' class ='nxs-jacket-inner'>
      <div class ='nxs-usr-content'>
        <div class ='nxs-usr-left'>
          <div class ='nxs-usr-avatar'>
          <div class ='nxs-usr-login'><?php echo ucfirst($get['post'][$key]['login']); ?>
          </div>
                <?php
                  switch ($get['post'][$key]['level']) {
                    case '11':
                      ?><img style ='border: 1px solid #33333340; background-color: #b73a3a;' src="./uploads/avatar/<?php echo $get['post'][$key]['avatar'] ?>"></img><?php
                      break;
                    case '9':
                      ?><img style ='border: 1px solid #33333340; background-color: #3a6db7;'src='./uploads/avatar/<?php echo $get['post'][$key]['avatar'] ?>'></img><?php
                      break;
                    case '6':
                      ?><img style ='border: 1px solid #33333340; background-color: #ff9600;'src='./uploads/avatar/<?php echo $get['post'][$key]['avatar'] ?>'></img><?php
                      break;
                    case '3':
                      ?><img style ='border: 1px solid #33333340; background-color: #009688;'src='./uploads/avatar/<?php echo $get['post'][$key]['avatar'] ?>'></img><?php
                      break;
                  }
                ?>
          </div>
          <div class ='nxs-usr-name'>
            <ul>
              <li><?php echo ucfirst($get['post'][$key]['surname']); ?></li>
              <li><?php echo ucfirst($get['post'][$key]['name']); ?></li>
            </ul>
          </div>
        </div>
              
        <div class ='nxs-usr-mid'>
          <div class ='nxs-usr-mail'>
            <ul>
              <li>Mot de passe : *******</li>
              <li>Email : <?php echo $get['post'][$key]['email']; ?></li>
            </ul>
          </div>
          <div class ='nxs-usr-infos'>
            <ul>
              <li>Derniere connexion : <?php echo $get['post'][$key]['lastCo']; ?></li>
              <li>Compte créé le : <?php echo $get['post'][$key]['date']; ?></li>
            </ul>
          </div>
          <div class ='nxs-jacket-edit-bar'>
            <button  id="delete-<?php echo $get['post'][$key]['id']; ?>" value="user" class="delete_btn">Supprimer</button>
            <button  id="revise-<?php echo $get['post'][$key]['id']; ?>" value="user" onclick="popup('large');" class="edit_btn">Modifier</button>     
          </div>        
        </div>
              
        <div class ='nxs-usr-right'>
          <div class ='nxs-usr-id'>ID : <?php echo $get['post'][$key]['id']; ?>
          </div>
        </div>
      </div>
    </div>
  </div>    