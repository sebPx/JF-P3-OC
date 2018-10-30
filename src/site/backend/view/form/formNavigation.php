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
	$get = $_POST;
?>
<div class="formContent">
<section id="add-post-screen">
	<div class="listNav" style="width: 100%;">
		<form id="form" action="" method="post" accept-charset="utf-8">	
			<article id="add-post">
				<div class="add-post-title-area">
					<label class="title"><h6>1 - Identité du menu</h6></label>			
					<?php echo $get['form']['id']; ?>
					<?php echo $get['form']['requestType']; ?>
					<?php echo $get['form']['event']; ?>
					<?php echo $get['form']['nav']; ?>
					</br>
					<?php echo $get['form']['alt']; ?>
					<?php $var = count($get['post']['link']) ?>
					<input type="hidden" name="count" id="count" value="<?php echo $var; ?>">
				</div>
			<label class="title"><h6>Liens ajoutés</h6></label>
			<ul id="links">
				<?php 
				$i = 0;
					foreach ($get['post']['link'] as $key => $value) {
				?>
						 <li>
						 	<div class='nxs-menu-name'><?php echo $get['post']['link'][$key]['name']; ?>
						 		<input type='hidden' name ='name-<?php echo $key ; ?>' value='<?php echo $get['post']['link'][$key]['name']; ?>'></input>
						 		<input type='hidden' name ='link-<?php echo $key ; ?>' value='<?php echo $get['post']['link'][$key]['link']; ?>'></input>
						 		<input type='hidden' name ='url-<?php echo $key ; ?>' value='<?php echo $get['post']['link'][$key]['url']; ?>'></input>
						 	</div>
							 <div class='nxs-menu-link'>Lié à :<?php echo $get['post']['link'][$key]['link']; ?></div>
							 <input id='delete_btn' name='delete_btn' type='button' onclick='delLi(this);'' value='Supprimer'></input>
						</li>
				<?php } ?>
			</ul>
			</article>
			<input type="submit" value="Enregistrer le nouveau menu" name="submit" style="position: relative;left: 918px;width: 252px;bottom: 162px;">
		</form>
	</div>
	<article id="add-post-option">
		<div class="post-option-publish">
		    <div class="add-post-title-area">
			    <label class="title"><h6>2 - Ajouter un lien</h6></label>
			    <input type="text" id="nameLink" placeholder="Nom du lien">
		    </div>
		    <div class="add-post-title-area">
			   <label class="title"><h6>3 - Définission de la cible du lien</h6></label>
		    	<select name="postCat" id="typeLink">
					<option value="page"selected>Pages</option>
					<option value="article">Articles</option>
					<option value="event">Evénements</option>
					<option value="category">Catégories</option>
					<option value="template">Autres pages</option>
					<option value="all">Tous</option>
				</select>
				
				<select name="postId" id="targetLink">
					<?php foreach ($get['items'] as $key => $value){?>
						<optgroup id="<?php echo $key ?>" label="<?php echo $key ?>">
							<?php foreach ($get['items'][$key] as $key2 => $value){
									if (isset($get['items'][$key][$key2]['title'])) {
								?>
									<option value="<?php echo $get['items'][$key][$key2]['id']; ?>"><?php echo $get['items'][$key][$key2]['title']; ?></option>
								<?php }elseif (isset($get['items'][$key][$key2]['name'])){  ?>
									<option value="<?php echo $get['items'][$key][$key2]['name']; ?>"><?php echo $get['items'][$key][$key2]['name']; ?></option>							
								<?php } ?>
							<?php } ?>
						</optgroup>
					<?php } ?>
					<optgroup label="Autres">
						<option value="home">Page Home</option>
						<option value="contact">Page Contact</option>
						<option value="calendar">Calendrier des évènements</option>
						<option value="repertory">Repertoire des catégories</option>						
					</optgroup>
				</select>
		    </div>
			<input type="button" onclick="addLi();" value="Ajouter" name="submit">				
		</div>
	</article>
</section>
</div>

<script type='text/javascript'>

function addLi() {
    var iLength = document.getElementById("links").getElementsByTagName("LI").length; // longueur de la liste (nombre d'items)
	var type =  document.getElementById("typeLink").value;
	var target =  document.getElementById("targetLink").value;
	var name =  document.getElementById("nameLink").value;
	var count =  document.getElementById("count").value;

	if (type  == "template") {
		var url = "frontend/site/";
	}else if (type  == "all") {

	}else{
		var url ="frontend/site/"+type ;
	}

    var oLi = document.createElement("LI"); // on cré un nouveau noeud item de liste
    var line = "<div class='nxs-menu-name'>"+name+
    				"<input type='hidden' name ='name-"+iLength+"' 	value='"+name+"'></input>"+
    				"<input type='hidden' name ='link-"+iLength+"' 	value='"+target+"'></input>"+
    				"<input type='hidden' name ='url-"+iLength+"' 	value='"+url+"'></input>"+
    			"</div>"+
    			
    			"<div class='nxs-menu-link'>Lié à : "+type+" - "+target+"</div>"+
    			
    			"<input type='button' onclick='delLi(this);'' value='Supprimer' id='delete_btn'>";
    oLi.innerHTML = line;
    //oLi.appendChild(line); // on attache le noeud texte au noeud item de liste
    document.getElementById("links").appendChild(oLi); // on attache le noeud item de liste au noeud liste
    count++;
    document.getElementById("count").value = count;
    return oLi;
}
function delLi(a) {
	var count =  document.getElementById("count").value;
	count --;
    document.getElementById("count").value = count;
	a.parentNode.parentNode.removeChild(a.parentNode);
}
</script>
<script src="assets/js/eventReader.js"></script>