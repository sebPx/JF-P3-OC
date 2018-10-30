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

<div id="contact-review">
<div id="contact-builder">
	<div id="page-menu-top">
		<button  id="add" value="contact" onclick="popup('large');" >Liste des contacts</button>
		<button  id="add" value="courier" onclick="popup('large');" >Archives des courriers</button>
	</div>

	<div id="grid-recup">
		<?php //recupPost(3); ?>
	</div>
</div>
<div id="contact-config">
	<div id="table-config-mailer">
	<h4>Configuration du Mailer :</h4>
		<div class="add-post-title-area">
		    <label for="form-email">Email d'envoi</label>
		    <input type="text" id="form-email" name="form-email" disabled="disabled" value="contact@noxus.fr"/>
	    </div>
		<div class="add-post-title-area">
		    <label for="form-name">Nom de l'expéditeur</label>
		    <input type="text" id="form-name" name="form-name" disabled="disabled" value="Noxus.fr"/>
	    </div>
		<div class="form-option-type">
			<label><h5>Type de SMTP :</h5></label>
   				<div class="form-option-inner">	
   					<label for="Type">
   					<input type="radio" id="Type2"
     				name="Type2" value="1" checked="checked" disabled="disabled">
    				Php</label>

				    <label for="Type">
				    <input type="radio" id="Type"
				     name="Type2" value="2" disabled="disabled">
				    Google</label>

				    <label for="Type">
				    <input type="radio" id="Type"
				     name="Type2" value="3" disabled="disabled">
				    Autre</label>
				</div>
		</div>
		<h5>SMTP personnalisé :</h5>
		<div class="add-post-title-area">
		    <label for="smtp-host">Hote</label>
		    <input type="text" id="smtp-host" name="smtp-host" disabled="disabled" value="localhost"/>
	    </div>
		<div class="add-post-title-area">
		    <label for="smtp-port">Port</label>
		    <input type="text" id="smtp-port" name="smtp-port" disabled="disabled" value="25"/>
	    </div>
		<div class="form-option-code">
			<label><h5>Type de cryptage :</h5></label>
   				<div class="post-option-inner">	
   					<label for="Type">
   					<input type="radio" id="Type"
     				name="Type" value="1" disabled="disabled">
    				Aucun</label>

				    <label for="Type">
				    <input type="radio" id="Type"
				     name="Type" value="2" checked="checked" disabled="disabled">
				    TLS</label>

				    <label for="Type">
				    <input type="radio" id="Type"
				     name="Type" value="3" disabled="disabled">
				    SSL</label>
				</div>
		</div>
		<h5>Authentification</h5>
		<div class="add-post-title-area">
		    <label for="form-mailer-id">SMTP nom d'utilisateur</label>
		    <input type="text" id="form-mailer-id" name="form-mailer-id" disabled="disabled" value="contact@noxus.fr"/>
	    </div>
		<div class="add-post-title-area">
		    <label for="form-mailer-pass">Mot de pass</label>
		    <input type="text" id="form-mailer-pass" name="form-mailer-pass" disabled="disabled" value="*******"/>
	    </div>	

	</div>
</div>
</div>
<script src="assets/js/eventReader.js"></script>