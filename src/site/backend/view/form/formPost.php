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

?>  
<?php 
	$get = $_POST;
?>
<div class="formContent">
<form name="addPost" id="form" action="" method="post" accept-charset="utf-8">	
	<section id="add-post-screen">
		<article id="add-post">
		    <div class="add-post-title-area">
		    	<label class="title"><h6>1 - Création du contenu:</h6></label>
		    	<?php 
		    		echo $get['form']['requestType'];
		    		echo $get['form']['author'];
		    		echo $get['form']['event'];
		    		echo $get['form']['id'];
		    		echo $get['form']['title'];
		    	?>
		    </div>
		    <div class="add-post-title-area">
		    	<?php echo $get['form']['resume']; ?>
		    </div>
		    <div class="add-post-link-area">

		    </div>
		    <div class="add-post-content-area">			   
			    <?php echo $get['form']['content']; ?>
			</div>
		</article>	
		<article id="add-post-option">
			<div class="post-option-publish">
				<label class="title"><h6>2 - Conditions de publication:</h6></label>
					<div class="post-option-inner">
					<?php echo $get['form']['state']; ?>
					</br>
					<?php echo $get['form']['view']; ?>
					</br>
					<?php echo $get['form']['apply']; ?>
					</br>
					<?php echo $get['form']['comment']; ?>
		
				<input type="submit" value="Publier" name="submit">	
				</div>
			</div>
			
			
	   				<?php 
	   				$i = 0;
	   				if (isset($get['cat'])) { ?>
					<div class="post-option-cat">
						<label class="title"><h6>Catégorie</h6></label>
			   				<div class="post-option-inner">	   				
		   					
		   				<select name="category">
		   			<?php	foreach ($get['cat'] as $key => $value) {
			   					if ($get['post']['0']['category'] == $get['cat'][$key]['name']) {?>
			   						<option value="<?php echo $get['cat'][$key]['name'] ; ?>" selected><?php echo $get['cat'][$key]['name'] ; ?></option>
			   					<?php 
									$i ++;
			   					}else if ($get['cat'][$key]['base'] == "true" && $i == 0){ ?>
			   						<option value="<?php echo $get['cat'][$key]['name'] ; ?>" selected><?php echo $get['cat'][$key]['name'] ; ?></option>
			   					<?php }else{ ?>
			   						<option value="<?php echo $get['cat'][$key]['name'] ; ?>" ><?php echo $get['cat'][$key]['name'] ; ?></option>
			   					<?php 
				   				}
			   				} ?>
			   				</div>
						</div>
					</select>
	   		  <?php }else{?>
	   					<input type="hidden" id="category" name="category" value="page" >
	   		  <?php }?>

			<div class="post-option-img">		
				<?php include '../jacket/media/mediaPanel.php'; ?>
				<label class="title"><h6>Image mise en avant</h6></label>
				<div id="image-content" onclick="image()">
						
					<?php if (isset($get['post']['0']['image'])) { ?>
						<img src="uploads/<?php echo $get['post']['0']['image'] ; ?>" style="width: 240px;height: 100px;">
						<?php foreach ($get['media'] as $key7 => $value) {
								 if ( $get['media'][$key7]['name'] == $get['post']['0']['image']){ ?>
								<div class="image-title"><?php echo $get['media'][$key7]['alt']; ?></div>
								<input type="hidden" name="image" id="image" value="<?php echo $get['media'][$key7]['name'] ; ?>">
							<?php }
							} ?>									
						<?php }else{ ?>
							<img src="uploads/default.jpg" style="width: 240px;height: 100px;">
							<div class="image-title">Image par défaut.</div>
							<input type="hidden" name="image" id="image" value="default.jpg">
					<?php 
					} ?>
					
				</div>
			</div>
		</article>
	</section>
</form>

<script type="text/javascript">
	function image() {
		document.getElementById("image-panel").style.display = "block";
	}

	function panelClose() {
		document.getElementById("image-panel").style.display = "none";
	}

	function chooseImage(attribute) {
		var temp =  document.getElementById("image-temp").value;
		document.getElementById("image-view").innerHTML = "";
		document.getElementById("image-view").innerHTML = "<img src='uploads/"+attribute+"'>";
		document.getElementById("image-case-"+attribute).style.border = "4px solid #1a8ae2";
		document.getElementById("image-info").innerHTML = "";
		document.getElementById("image-info").innerHTML = "<strong>Nom de l'image :</strong></br>"+attribute+"</br></br><strong>Desciption :</strong></br>"+attribute;
		document.getElementById("image-temp").value = attribute;
		if (typeof(temp) != 'none') {
			document.getElementById("image-case-"+temp).style.border = "4px solid transparent";
		}

	}

	function validImage() {
		var name = document.getElementById("image-temp").value;
		document.getElementById("image-content").innerHTML = '';
		document.getElementById("image-content").innerHTML = '<img src="uploads/'+name+'" style="width: 240px;height: 100px;"><div class="image-title">'+name+'</div><input type="hidden" name="image" id="image" value="'+name+'">';
	}
</script>
<script src="assets/js/eventReader.js"></script>
</div>

