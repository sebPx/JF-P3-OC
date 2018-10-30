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
?>

<content>
	<div id="content">	
		<div class="profil-title">
			<div class="teg_container">
				<section class="article">
					<div class="subtitle">
						<div class="articleTop">
							<h3><div class="articleTitle"><?php echo $get['post'][0]['title']; ?></div></h3>	
							<div class="articleCat">
								<img src="assets/frontend/images/tag.png" alt="Logo Noxus.fr" style="height: 15px;position: relative;top: 2px;" />
								<a href="index.php?frontend/site/category/<?php echo $get['post'][0]['category']; ?>"><?php echo $get['post'][0]['category']; ?></a>
								</div>
						</div>
						<div class="articleDate">
							<div class="articleInfos"><?php echo "Par ".$get['post'][0]['author']." le ".$get['post'][0]['date']; ?></div>
							<div class="articleModified"><?php echo "Dernière modification le  ".$get['post'][0]['modified']; ?></div>
						</div>					
					</div>
				</section>		
			</div>
		</div>
		<div class="teg_container">
	  		<article class="nxs-page-pattern">
				<section class="article">	
					<div class="articleContent"><?php echo $get['post'][0]['content']; ?></div>
					<h5>A propos de l'auteur,</h5>
					<div class="articleAuthor">
							
						<div class="authorName">
							<img src="assets/frontend/images/logo-noxus.png" alt="Logo Noxus.fr" style="height: 40px;">
							<a href=""><h4><?php echo $get['post'][0]['author']; ?></h4></a>						
						</div>
						<div class="authorQuote">
							<quote>"Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. "</quote>				
						</div>
					</div>
						
					<h3>Commentaires :</h3>
					<?php include ('../src/site/frontend/view/comment/comment.php'); ?>
					<div class="addComment">
						<div class="addCommentLeft">
							<div class="addCommentRegister">
								Pour une meilleure experience je vous conseille, pour partager vos impressions d'avoir un compte personnel.
								</br></br><button id="userRegister" class="launcher" onclick="popup('small');">Inscription gratuite !</button>										
							</div>
							<div class="addCommentConnect">
								Je vous invite à vous connecter si vous possédez déjà un compte sur mon site !
								</br></br><button id="userLogin" class="getter" onclick="popup('small');">Connexion</button>										
							</div>
						</div>
						<div class="addCommentRight">
							<div id="infoArea"></div>
							<div class="formContent">
								<?php include ('../src/site/frontend/view/form/comment.php'); ?>
							</div>
						</div>
					</div>
				</section>
	  		</article>
		</div>
	</div>
</content>