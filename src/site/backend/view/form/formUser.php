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
<form  id="form" action="" method="post" accept-charset="utf-8">			
	<div class="add-contact">
	<?php 
		echo $get['form']['id'];
		echo $get['form']['requestType'];
		echo $get['form']['event'];
		if ($get['form']['pass'] == "") {
			
			/*function genererChaineAleatoire($longueur = 10){
				$caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$longueurMax = strlen($caracteres);
				$chaineAleatoire = '';
				for ($i = 0; $i < $longueur; $i++) {
					$chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
				}
				
				return $chaineAleatoire;
			}
			$value = genererChaineAleatoire(20);

			?><input type="hidden" name="pass" value="<?php echo $value; ?>"><?php*/		
		
		}else{
			echo $get['form']['pass'];
		}
		
		echo $get['form']['login'];
		echo "</br></br>";
		echo $get['form']['email'];
		echo "</br></br>";
		echo $get['form']['level'];

	 ?>
	</div>
	<input type="submit" value="Enregistrer" name="submit">
</form>
</div>
<script src="assets/js/eventReader.js"></script>
