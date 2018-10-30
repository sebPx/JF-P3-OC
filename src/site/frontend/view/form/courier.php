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
	if (isset($_POST['return'])) {
		$get = $_POST;
		?><script src="assets/js/eventReader.js"></script><?php
	}
 ?>
<div class="formContent">
	<form id="form" action="" method="post" accept-charset="utf-8">
		<div class="courier-content">
			<h4>1 - Saisissez vos coordonnées :</h4>
			<div class="courier-top">
					<img src="assets/frontend/images/user-book.png" alt="Information importante" style="height: 24px;width: 24px;position: relative;left: 10px;top:  15px;" />
				<div class="courier-left">	
					<?php 
						echo $get['form']['id'];
						echo $get['form']['requestType'];
						echo $get['form']['event'];
						if ($get['userID'] == ""){ 
							echo $get['form']['surname'];
							echo $get['form']['name'];
						}else{
						?>
							<input type="text" name="surname" value="<?php echo $get['userID']['0']['surname']; ?>">
							<input type="text" name="name" value="<?php echo $get['userID']['0']['name']; ?>">
					<?php
						} 
					?>			
				</div>
					<img src="assets/frontend/images/mail-book.png" alt="Information importante" style="height: 24px;width: 24px;position: relative;left: 10px;top:  15px;" />	
				<div class="courier-right">

					<?php 
						if ($get['userID'] == ""){ 
							echo $get['form']['email'];
						}else{
						?>
							<input type="text" name="email" value="<?php echo $get['userID']['0']['email']; ?>">
					<?php
						}
						echo $get['form']['subject'];
					?>			
				</div>
			</div>
			<h4>2 - Rédigez le contenu de vorte demande :</h4>
			<div class="courier-bot">
				<?php
					echo $get['form']['content'];
				?>			
				<input type="submit" value="Envoyer" name="submit">
			</div>
		</div>
	</form>
</div>
