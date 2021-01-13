<?php

function entete() {
	$LANG=$_SESSION['Lang'];
	switch($LANG){
		case "fr" ; $lang='fr-FR'; break;
		case "uk" ; $lang='en-US'; break;
	}

?>
<!DOCTYPE html>
<html lang="<?php echo $lang;?>" prefix="og: http://ogp.me/ns#" class="no-js">
<head>
<meta charset="UTF-8">
<meta name="description" content="Nuts, le Digital Lake de BeMa Digital Ecologist : 4 réduire les Gaz à Effet de Serre."/>
<link rel="canonical" href="http://nuts.Be-Ma.fr/" />
<link rel="icon"  href="images/nuts.ico">
<meta property="og:locale" content="fr_FR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="BeMa - 1ere plate-forme pour vous aider à comprendre la sobriété numérique, et vous accompagner sur vos gestes." />
<meta property="og:description" content="Nuts, le Digital Lake de BeMa Digital Ecologist : 4 réduire les Gaz à Effet de Serre." />
<meta property="og:url" content="http://nuts.Be-Ma.fr/" />
<meta property="og:site_name" content="Nuts by BeMa" />
<meta name="google-site-verification" content="googleb1386507053e6e1b">
<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="Nuts, le Digital Lake de BeMa Digital Ecologist : 4 réduire les Gaz à Effet de Serre." />
<meta name="twitter:title" content="BeMa - 1ere plate-forme pour vous aider à comprendre la sobriété numérique, et vous accompagner sur vos gestes." />
<link rel="stylesheet" href="/css/nuts.css">
<title>NUTS By BeMa #digitaleco : calculator cabon footprint device</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
		$( function() {
			//$.datepicker.setDefaults( $.datepicker.regional[ \"us\" ] );
			$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd'});
		} );
		$( function() {
			$( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd'});
		} );
		$( function() {
			$( "#datepicker3" ).datepicker({ dateFormat: 'yy-mm-dd'});
		} );
		$( function() {
			$( "#datepicker4" ).datepicker({ dateFormat: 'yy-mm-dd'});
		} );
		$( function() {
			$( "#datepicker5" ).datepicker({ dateFormat: 'yy-mm-dd'});
		} );
		</script>
</head>
<body class="home page-template-default page page-id-979 site_layout_2  header_style_4 wpb-js-composer js-comp-ver-5.1.1 vc_responsive">
<?php
}

function menu()
{
	if ($_SESSION['Login']){
	$link_acceuil="/home_public.php";
	$link_login="/close.php";
	$img_login="logout.png";
	$txt_login="Logout";
	}
	else {
		$link_acceuil="/home_public.php";
		$link_login="/home_public.php";
		$img_login="login.png";
		$txt_login="Login";
	}
?>
<div class='container'>
	<div id='content_haut'>

<div class="notify-container"><button class='btn-menu'><a href="<?php echo $link_acceuil;?>" class=titre><img src="/images/nuts.png" class='image_menu_md'><br>Accueil</a></button></div>
	<div class="notify-container"><button class='btn-menu'><a href="?LANG=fr" class=titre><img src="/images/menu/fr.png" class='image_menu_md'><br>FR</a></button></div>
	<div class="notify-container"><button class='btn-menu'><a href="?LANG=uk" class=titre><img src="/images/menu/uk.png" class='image_menu_md'><br>EN</a></button></div>
	<div class="notify-container"><button class='btn-menu'><a href="info.php" class=titre><img src="/images/menu/info.png" class='image_menu_md'><br>Information</a></button></div>
	<div class="notify-container"><button class='btn-menu'><a href="<?php echo $link_login;?>" class=titre><img src="/images/menu/<?php echo $img_login;?>" class='image_menu_md'><br><?php echo $txt_login;?></a></button></div>

</div>

<?php
}
function footer()
{

	$version ="0.5";
	$annee=date('Y');
echo "
<div class='container'>
<div id='content_bas'>
<hr width=90%>
<p class='bas' align=center>Nuts V $version /  Copyright © $annee BeMa. Tous droits réservés <br>Follow BeMa : <a href='https://www.facebook.com/BeMaDigitalEco/' target=_blank>Facebook</a>- <a href='https://www.instagram.com/BemaDigitaleco/' target=_blank>Instagram</a>- <a href='https://github.com/djembenj/BeMaNuts' target=_blank>Git</a></p>
</div>
</div>
</html>
";
}

function date_fr($date)
{
	return strftime("%d/%m/%Y",strtotime($date));
}
?>
