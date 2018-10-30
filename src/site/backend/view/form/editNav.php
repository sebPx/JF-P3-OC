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

<form action="../nxs-admin/config/submit-edited-menu.php" method="post" enctype="multipart/form-data">
<section id="add-post-screen">
	<article id="add-post">
		<div class="add-post-title-area">
			<label for="post-name"><h6>Description du menu</h6></label>
			<input type="text" id="descMenu" name="descMenu" value="<?php echo $_SESSION[editMenu][0][menu_alt]; ?>"/>
			<input type="hidden" name ="menuId" value ="<?php echo $_SESSION[editMenu][0][menu_id]; ?>"></input>
		</div>
	<label for="post-name"><h6>Liens ajoutés</h6></label>
	<ul id="links">
		<?php 
		$i = 0;
			foreach ($_SESSION[editMenu] as $key => $value) {
				 echo "<li><div class='nxs-menu-name'>".$_SESSION[editMenu][$i][name]."<input type='hidden' name ='linkName".$i."' value='".$_SESSION[editMenu][$i][name]."'></input><input type='hidden' name ='lineId".$i."' value='".$_SESSION[editMenu][$i][id_line]."'></input></div>";
				 echo "<div class='nxs-menu-link'>Permalien : #post=".$_SESSION[editMenu][$i][link]."<input type='hidden' name ='linkId".$i."' value='".$_SESSION[editMenu][$i][link]."'></input></div>";
				 echo "<input id='delete_btn' name='delete_btn' type='button' onclick='delLi(this);'' value='Supprimer'></input></li>";
				$i = $i +1;
			}
	 	?>
	</ul>
	</article>	
	<article id="add-post-option">
		<div class="post-option-publish">
		    <div class="add-post-title-area">
			    <label for="post-name"><h6>Ajouter un lien</h6></label>
			    <input type="text" id="lienMenu" name="post-name" required="TRUE"
				onfocus="if(this.value == 'Nom du lien')this.value = '';" onblur="if(this.value == '')this.value = 'Nom du lien';" value="Nom du lien"/>
		    </div>
		    <div class="add-post-title-area">
			    <label for="post-name"><h6>Lier au post</h6></label>
		    	<select name="postCat" id="postCat">
					<option value="Pages"selected>Pages</option>
					<option value="Articles">Articles</option>
					<option value="Evenements">Evénements</option>
					<option value="Tous">Tous</option>
				</select>
				
				<select name="postId" id="postId">
				</select>
		    </div>
			<input type="button" onclick="addLi();" value="Ajouter" name="submit">				
		</div>
		<input type="submit" value="Enregistrer le nouveau menu" name="submit">
	</article>
</section>
</form>

<script type='text/javascript'>

var postCat = document.getElementById("postCat");

    if (postCat.value == "Pages") {
    	$('#postId').append("<?php selectMenuPage(); ?>");
    }

postCat.addEventListener("change", function() {
    
    if (postCat.value == "Pages") {
		    $('#postId option').filter(function() {
		        return +this.value >= 0;
		    }).remove();
    	$('#postId').append("<?php selectMenuPage(); ?>");
    }
    if (postCat.value == "Articles") {
		    $('#postId option').filter(function() {
		        return +this.value >= 0;
		    }).remove();
    	$('#postId').append("<?php selectMenuArticle(); ?>");
    }
    if (postCat.value == "Evenements") {
		    $('#postId option').filter(function() {
		        return +this.value >= 0;
		    }).remove();
    	$('#postId').append("<?php selectMenuEvent(); ?>");
    }
    if (postCat.value == "Tous") {
		    $('#postId option').filter(function() {
		        return +this.value >= 0;
		    }).remove();
    	$('#postId').append("<?php selectMenuAll(); ?>");
    }
});

function addLi() {
    var iLength = document.getElementById("links").getElementsByTagName("LI").length; // longueur de la liste (nombre d'items)
    var lienMenu = document.getElementById("lienMenu").value;
    var lienPost = document.getElementById("postId").value;

    var oLi = document.createElement("LI"); // on cré un nouveau noeud item de liste
    var line = "<div class='nxs-menu-name'>"+lienMenu+"<input type='hidden' name ='linkName"+iLength+"' value='"+lienMenu+"'></input><input type='hidden' name ='lineId"+iLength+"' value='none'></input></div><div class='nxs-menu-link'>Permalien : #post="+lienPost+"<input type='hidden' name ='linkId"+iLength+"' value='"+lienPost+"'></input></div><input type='button' onclick='delLi(this);'' value='Supprimer' id='delete_btn'>";
    oLi.innerHTML = line;
    //oLi.appendChild(line); // on attache le noeud texte au noeud item de liste
    document.getElementById("links").appendChild(oLi); // on attache le noeud item de liste au noeud liste
    return oLi;
}
function delLi(a) {
	a.parentNode.parentNode.removeChild(a.parentNode);
}
</script>