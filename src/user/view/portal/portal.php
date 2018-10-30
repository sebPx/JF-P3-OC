<?php
/** 
Template:       Noxus
Theme URL:      https://noxus.fr
Author:         Sebastien P.
Author URL:     https://noxus.fr/creator
Description:    Noxus engine production ©
Version:        1.0
License:        GNU General Public License v3 or later
License URI:    http://www.gnu.org/licenses/gpl-3.0.html
Text Domain:    Noxus ©
Mention légale: Textes codés et utilisé par Noxus engine © ayant droit d'auteur sur le contenu suivant.
*/
?>
<!doctype html>
<html lang="fr">
  
  <head>
    <meta charset="utf-8">
    <title>Portail Naxter</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/frontend/images/logo-noxus.png" />
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="assets/portal/css/portal.css">
    <script src="assets/js/ajaxRequest.js"></script>
    <script src="assets/js/eventReader.js"></script>
  </head>

  <body>
    <!-- Section connexion -->
      <section>
        <div id="panel">
            <article class="logo">
              <figure>
                <img src="assets/frontend/images/logo-noxus.png" alt="Logo noxus">
              </figure>
            </article>
            
            <article class="connexion">
              <div id="login">
                <h1><a href="https://noxus.fr" title="Propulsé par noxus" tabindex="-1">Administration Naxter</a></h1>
              <div id="errorArea"></div>
              <div class="formContent">
                <?php
                  include ("../src/user/view/form/login.php");
                 ?>
               </div>
            </div>
            </article>
        </div>
      </section>
    <!-- Fin Section connexion -->
    
    <!-- Bottom navigation -->
      <div class="bottom-nav">
        <div id="panel">
          <article class="logo">
            <a href="index.php">← Retour</a>
          </article>
          <article class="connexion">
            <a href="http://centralcity.noxus.fr/wp-login.php?action=lostpassword">Mot de passe oublié&nbsp;?</a>
          </article>
        </div>
      </div>
    <!-- Fin Bottom navigation -->
    
    <footer>
      <!-- .site-info -->  
        <div class="site-info">
          <span class="copy-info">2018 Naxter ©</span>
          <span class="sep"> | </span>
        <a href="https://naxter.fr" >Produit par Naxter tous drois réservés.</a><span class="sep"> | </span><a href="/?page_id=566">Mentions légales</a>
        </div>
    </footer>
  
  </body>
</html>