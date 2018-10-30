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
    switch ($get['post'][$key]['level']) {
	    case '11':
    	  ?><li style ='border-left: 5px solid #b73a3a; background-color: #cccccc8c;border-bottom: 1px solid white;'><?php
        break;
	    case '9':
    	  ?><li style ='border-left: 5px solid #3a6db7; background-color: #cccccc8c;border-bottom: 1px solid white;'><?php
        break;
	    case '6':
    	  ?><li style ='border-left: 5px solid #ff9600; background-color: #cccccc8c;border-bottom: 1px solid white;'><?php
        break;
	    case '3':
    	  ?><li style ='border-left: 5px solid #009688; background-color: #cccccc8c;border-bottom: 1px solid white;'><?php
        break;
	    case '1':
    	  ?><li style ='border-left: 5px solid #1a8ae2; background-color: #cccccc8c;border-bottom: 1px solid white;'><?php
        break;
        }
?>

	<div class="li-review">
		<div class="li-review-content"> 
			<div class="li-review-top">
				<div class="li-review-left">
					<div class='review-author' >Login : <strong><?php echo $get['post'][$key]['login']; ?></strong></div>
					<div class='review-author' >Nom : <?php echo $get['post'][$key]['name']; ?></div>
					<div class='review-date' >Prénom : <?php echo $get['post'][$key]['surname']; ?></div>
				</div>
				<div class="li-review-center">
					<div class='review-title' >E-mail : <strong><?php echo $get['post'][$key]['email']; ?></strong></div>
					<div class='review-resume' >Date d'inscription : <?php echo $get['post'][$key]['date']; ?></div>
				</div>
			</div>
			
			<div class ='li-review-bot'>							
				<button  id="edit-<?php echo $get['post'][$key]['id']; ?>" value="user" class="uncheck_btn">Modifier</button>
				<button  id="delete-<?php echo $get['post'][$key]['id']; ?>" value="user" class="delete_btn" >Supprimer</button>
			</div>
		</div>
		
		<div class="li-review-right">
			<div class='review-id' >ID : <?php echo $get['post'][$key]['id']; ?></div>
		</div>
	</div>
</li>	