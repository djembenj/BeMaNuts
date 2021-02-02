<?php

function entete($LANG) {

	switch($LANG){
		case "fr" ; $lang='fr-FR'; break;
		case "uk" ; $lang='en-US'; break;
	}


?>
<!DOCTYPE html>
<html lang="<?php echo $lang;?>" prefix="og: http://ogp.me/ns#" class="no-js">
<head>
<meta charset="UTF-8">
<meta name='description' content='Nuts by BeMa : Digital Ecologist ( de la sobriété numérique et du numérique responsable). Ma calculatrice carbone de mes outils numérique. Jakubowski Benjamin'>
<link rel="canonical" href="http://nuts.Be-Ma.fr/" />
<link rel="icon"  href="/images/nuts.ico">
<meta property="og:locale" content="fr_FR" />
<meta property="og:type" content="artcile" />
<meta property="og:title" content="Nuts by BeMa : Digital Ecologist - La calculatrice carbone de mes outils numériques. " />
<meta property="og:description" content="Nuts, le Digital Lake de BeMa Digital Ecologist : 4 réduire les Gaz à Effet de Serre." />
<meta property="og:url" content="http://nuts.Be-Ma.fr/" />
<meta property="og:site_name" content="Nuts by BeMa device carbon calculator" />
<meta property="og:image" content="https://nuts.be-ma.fr/images/menu/datalake.png" />
<meta name="google-site-verification" content="googleb1386507053e6e1b">
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:description" content="Nuts by BeMa :  La calculatrice carbone de mes ouitls numériques. " />
<meta name="twitter:title" content="NUTS Device Carbon Footprint Calculator, by BeMa #digitaleco " />
<meta name="twitter:site" content="@BemaDigital" />
<meta name="twitter:creator" content="@jakubenj" />
<meta name="twitter:image" content="https://nuts.be-ma.fr/images/menu/datalake.png" />
<title>NUTS Device Carbon Footprint Calculator, by BeMa #digitaleco </title>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="stylesheet" href="/assets/css/main.css" />
</head>

<?php
}

function menu()
{

		$link_acceuil="/calculator.php";
		$link_login="/home.php";
		$img_login="login.png";
		$txt_login="Login";

?>

	<nav id="nav">
		<ul>
			<li><a href="/index.php"><img src="/images/menu/info.png" class="image_menu_md"><br><span>Accueil</span></a></li>
			<li><a href="/calculator.php"><img src="/images/nuts.png"  class="image_menu_md"><br><span>Nuts</span></a></li>
			<li><a href="/sources.php"><img src="/images/menu/entreprise.png"  class="image_menu_md"><br><span>Sources</span></a></li>
			<li><a href="/?LANG=fr"><img src="/images/menu/fr.png"  class="image_menu_md"><br><span>FR</span></a></li>
			<li><a href="/?LANG=uk"><img src="/images/menu/uk.png" class="image_menu_md"><br><span>EN</span></a></li>
			<a href="https://www.facebook.com/BeMaDigitalEco/" target=_blank border=0><img src="/images/network/facebook.png" class='image_menu_md'></a>&nbsp;<a href="https://twitter.com/BemaDigital" target=_blank><img src="/images/network/twitter.png" class='image_menu_md'></a>
			<a href="https://www.instagram.com/bemadigitaleco/" target=_blank><img src="/images/network/instagram.png" class='image_menu_md'></a>&nbsp;<a href="https://github.com/djembenj/BeMaNuts" target=_blank><img src="/images/network/github.png" class='image_menu_md'></a>

		</ul>
	</nav>
<?php }?>



<?php
}

function footer()
{

	$version ="1.1 20210201";
	global $footer_question,$footer_question2,$footer_questions3,$envoyer;
?>
<!-- Footer -->
</section>
	<section id="footer">
		<div class="container">
			<header>
				<h2><?php echo $footer_question;?> <strong><?php echo $footer_question2;?></strong></h2>
			</header>
			<div class="row">
				<div class="col-6 col-12-medium">
					<section>
						<form method="POST" action="contact.php">
							<div class="row gtr-50">
								<div class="col-6 col-12-small">
									<input name="name" placeholder="Name" type="text" />
								</div>
								<div class="col-6 col-12-small">
									<input name="prenom" placeholder="Prenom" type="text" />
								</div>
								<div class="col-6 col-12-small">
									<input name="tel" placeholder="Tel" type="text" />
								</div>
								<div class="col-6 col-12-small">
									<input name="email" placeholder="Email" type="text" />
								</div>
								<div class="col-12">
									<textarea name="message" placeholder="Message"></textarea>
								</div>
								<div class="col-12">
									<input type=submit class="form-button-submit button icon solid fa-envelope" value"<?php echo $envoyer;?>">
								</div>
							</div>
						</form>
					</section>
				</div>
				<div class="col-6 col-12-medium">
					<section>
						<p><?php echo $footer_questions3;?></p>
						<div class="row">
							<div class="col-6 col-12-small">
								<ul class="icons">
									<li class="icon solid fa-envelope">
										<a href="#">nuts @ be-ma.fr</a>
									</li>
								</ul>
							</div>
							<div class="col-6 col-12-small">
								<ul class="icons">
									<li class="icon brands fa-twitter">
										<a href="#">@BemaDigital</a>
									</li>
									<li class="icon brands fa-instagram">
										<a href="#">instagram.com/bemadigitaleco/</a>
									</li>
									<li class="icon brands fa-github">
										<a href="#">github.com/djembenj/BeMaNuts</a>
									</li>
									<li class="icon brands fa-facebook-f">
										<a href="#">facebook.com/BeMaDigitalEco/</a>
									</li>
								</ul>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
		</section>
	<div id="copyright" class="container">
	  <ul class="links">
	    <li>Nuts <?php echo $version;?> / Copyright &copy; 2021 BeMa. All rights reserved.</li><li>Inspired by: <a href="http://html5up.net">HTML5 UP</a></li>
	  </ul>
	</div>


	</div>

	<!-- Scripts -->
	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/js/jquery.dropotron.min.js"></script>
	<script src="/assets/js/browser.min.js"></script>
	<script src="/assets/js/breakpoints.min.js"></script>
	<script src="/assets/js/util.js"></script>
	<script src="/assets/js/main.js"></script>

	</body>
	</html>
<?php
}

function date_fr($date)
{
	return strftime("%d/%m/%Y",strtotime($date));
}
?>
