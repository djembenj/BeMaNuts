<?php
// La page de l'accueil public
// ne fournit que la calculatrice
// - mon Laptop
// - mon Ecran
// - mon Desktop
// - mon GSM
// - mon enceinte connectée

include("include/connexion.php");
include("include/auth.php");
include("include/equipement.php");
include("include/menu.php");

if ( $_GET['LANG'] ) {
  $LANG=$_GET['LANG'];
}
else {
  $_SESSION['Lang']="fr";
  $LANG=$_SESSION['Lang'];
}
include(".config_$LANG.php");
//print_r($_POST);
$db=connexion_db();
if ( $_POST['laptop'] or $_POST['smartphone']  or $_POST['enceinte'] or $_POST['desktop']  or $_POST['display'] or $_POST['display2'] or $_POST['tablette']) {
  $id_equipement=$_POST['laptop'];
  $id_equipement_smartphone=$_POST['smartphone'];
  $id_equipement_enceinte=$_POST['enceinte'];
  $id_equipement_desktop=$_POST['desktop'];
  $id_equipement_display=$_POST['display'];
  $id_equipement_display2=$_POST['display2'];
  $id_equipement_tablette=$_POST['tablette'];
  $duree_laptop=$_POST['duree_laptop'];
  $duree_display=$_POST['duree_display'];
  $duree_display2=$_POST['duree_display2'];
  $duree_desktop=$_POST['duree_desktop'];
  $duree_smartphone=$_POST['duree_smartphone'];
  $duree_enceinte=$_POST['duree_enceinte'];
  $duree_tablette=$_POST['duree_tablette'];
  //$LANG=$_POST['LANG'];

  $depasse=0;
  if ( $id_equipement) {
    $emission_equipement=donne_information_emission_equipement($db,$id_equipement,$duree_laptop);
    $data_laptop=donne_moyenne_emission_device($db,'1','');
    $moyenne_laptop=$data_laptop[0]/$emission_equipement['use_period'];
    if ( $emission_equipement['emission_annuel'] < $moyenne_laptop ) {
    $color_laptop="vert";
    $color_indic="";
    }
    else {
      $color_laptop="rouge";
      $color_indic="bleu";
      $indic_equipment="&#x21E7;";
      $depasse++;
    }
  }

  if ( $id_equipement_smartphone ){
    $emission_smartphone=donne_information_emission_equipement($db,$id_equipement_smartphone,$duree_smartphone);
    $data_smartphone=donne_moyenne_emission_device($db,'6','');
    $moyenne_smartphone=$data_smartphone[0]/$emission_smartphone['use_period'];
    if ( $emission_smartphone['emission_annuel'] < $moyenne_smartphone ) {
      $color_smartphone="vert";
      $color_indic_smartphone="";
    }
    else {
      $color_smartphone="rouge";
      $color_indic_smartphone="bleu";
      $indic_smartphone="&#x21E7;";
      $depasse++;
    }
  }

  if ( $id_equipement_enceinte ) {
    $emission_enceinte=donne_information_emission_equipement($db,$id_equipement_enceinte,$duree_enceinte);
    $data_enceinte=donne_moyenne_emission_device($db,'5','');
    $moyenne_enceinte=$data_enceinte[0]/$emission_enceinte['use_period'];
    if ( $emission_enceinte['emission_annuel'] < $moyenne_enceinte) {
    $color_enceinte="vert";
    $color_indic_smartdevice="";
    }
    else {
      $color_enceinte="rouge";
      $color_indic_smartdevice="bleu";
      $indic_smartdevice="&#x21E7;";
      $depasse++;
    }
  }

  if  ( $id_equipement_desktop ){
    $emission_desktop=donne_information_emission_equipement($db,$id_equipement_desktop,$duree_desktop);
    $data_desktop=donne_moyenne_emission_device($db,'2','');
    $moyenne_desktop=$data_desktop[0]/$emission_desktop['use_period'];
    if ( $emission_desktop['emission_annuel'] < $moyenne_desktop)
    $color_desktop="vert";
    else {
      $color_desktop="rouge";
      $depasse++;
    }
  }

  if  ( $id_equipement_display ) {
    $emission_display=donne_information_emission_equipement($db,$id_equipement_display,$duree_display);
    $data_display=donne_moyenne_emission_device($db,'7','');
    $moyenne_display=$data_display[0]/$emission_display['use_period'];
    if ( $emission_display['emission_annuel'] < $moyenne_display) {
    $color_display="vert";
    $color_indic_display="";
    }
    else {
      $color_display="rouge";
      $color_indic_display="bleu";
      $indic_display="&#x21E7;";
      $depasse++;
    }
  }

  if ( $id_equipement_display2 ) {
    $emission_display2=donne_information_emission_equipement($db,$id_equipement_display2,$duree_display2);
    $data_display=donne_moyenne_emission_device($db,'7','');
    $moyenne_display=$data_display[0]/$emission_display['use_period'];
    if ( $emission_display2['emission_annuel'] < $moyenne_display) {
    $color_display2="vert";
    $color_indic_display2="";
    }
    else {
      $color_display2="rouge";
      $color_indic_display2="bleu";
      $indic_display2="&#x21E7;";
      $depasse++;
    }
  }

  if ( $id_equipement_tablette ) {
    $emission_tablette=donne_information_emission_equipement($db,$id_equipement_tablette,$duree_tablette);
    $data_tablette=donne_moyenne_emission_device($db,'9','');
    $moyenne_tablette=$data_tablette[0]/$emission_tablette['use_period'];
    if ( $emission_tablette['emission_annuel'] < $moyenne_tablette) {
    $color_tablette="vert";
    $color_indic_tablette="";
    }
    else {
      $color_tablette="rouge";;//#FF5733
      $color_indic_tablette="bleu";
      $indic_tablette="&#x21E7;";
      $depasse++;
    }
  }
  $total=$emission_equipement['emission_annuel']+$emission_smartphone['emission_annuel']+$emission_enceinte['emission_annuel']+$emission_desktop['emission_annuel']+$emission_display['emission_annuel']+$emission_display2['emission_annuel']+$emission_tablette['emission_annuel'];
}
$portable=donne_liste_pc($db,$id_equipement);
$smartphone=donne_liste_smartphone($db,$id_equipement_smartphone);
$enceinte=donne_liste_enceinte($db,$id_equipement_enceinte);
$desktop=donne_liste_desktop($db,$id_equipement_desktop);
$display=donne_liste_monitor($db,$id_equipement_display);
$display2=donne_liste_monitor($db,$id_equipement_display2);
$tablette=donne_liste_tablette($db,$id_equipement_tablette);

if ( @$total ) {
  $nb_arbre=round($total/30,0);
  $nb_accord_paris=round($total/2100,2);
  $myconsoannuel_image=round($total,0);
  if ( $nb_arbre < 10 ){
    $align_arbre=142;
  }
  else if  ($nb_arbre < 100)
  {
    $align_arbre=138;
  }
  else {
    $align_arbre=134;
  }
  $image = imagecreate(213,214);
  $noir = imagecolorallocate($image, 100, 145, 187);
  $source = imagecreatefrompng("images/nutsresult.png");
  imagestring($source, 3, 47, 85, "$myconsoannuel_image Kg", $noir);
  imagestring($source, 3, $align_arbre, 85, $nb_arbre, $noir);
  imagestring($source, 3, 126, 173, "$nb_accord_paris%", $noir);
  $largeur_source = imagesx($source);
  $hauteur_source = imagesy($source);
  $dtms011 = mktime();
  $timestamp=time();
  $ip_host=$_SERVER['HTTP_X_REAL_IP'];
  $nom_image="generate/nutsresult-$dtms011-$ip_host.png";
  imagepng($source,"$nom_image");
  insertion_emission($db,$myconsoannuel_image,$nb_arbre,$nb_accord_paris,$ip_host,$timestamp);
}
deconnexion_db($db);
entete($LANG);
?>
<body class="homepage is-preload">
<div id="page-wrapper">
  <!-- Header -->
    <section id="header">
      <div class="container">
        <?php
        menu();
        ?>
        <div class="container_calculator">
    <header>
      <h2><?php echo $nuts_title2;?></h2>
    </header>
    <header>
      <h2><font style="border: solid 1px white;width:500px; left:130px;padding: 15px 1em;border-radius: 8%;background-color: #888;font-size: 20px;color: white;font-family:'digital-clock-font';" align=center>
      <?php echo $total." kg Co<sub>2</sub>/".$titre_an1; ?>
    </font></h2>
    </header>
    <form method="post" action="#">
    <!-- Ligne LAPTOP -->
    <div class="row">
      <div class="col-12 col-12-medium">
        <section>
            <div class="row aln-center">
              <div class="col-2 col-12-small aln-center">
                <div class="notify-container">
                  <img src="images/menu/laptop.png" class=image_menu alt='Laptop'><select name=laptop onChange="submit()"  class='calculator'><?php echo $portable;?></select>&nbsp;
                  <div class="fond<?php echo $color_laptop;?>"> <?php echo $emission_equipement['emission_annuel'];?></div>
                </div>
              </div>
              <div class="col-2 col-12-small">
                <div class="notify-container txtmini">
                <img src="images/menu/laptop.png" class=image_menu alt='Laptop'><?php echo $titre_an;?>&nbsp;<select name=duree_laptop onchange="submit()" class='calculator'><?php donne_duree_utilisation($emission_equipement['use_period'],$duree_laptop);?></select>
                <div class="fond<?php echo $color_indic;?>"><?php echo $indic_equipment;?></div>
              </div>
              </div>
              <div class="col-2 col-12-small">
                <div class="notify-container">
                  <img src="images/menu/monitor.png" class=image_menu_md valign=middle alt='Monitor'><br><select name=display onChange="submit()"  class='calculator'><?php echo $display;?></select>&nbsp;
                  <div class="fond<?php echo $color_display;?>"><?php echo $emission_display['emission_annuel'];?></div>
                </div>
              </div>
              <div class="col-2 col-12-small">
                <div class="notify-container txtmini">
                <img src="images/menu/monitor.png" class=image_menu_md valign=middle alt=''><?php echo $titre_an;?><select name=duree_display onchange="submit()" class='calculator'><?php donne_duree_utilisation($emission_display['use_period'],$duree_display);?></select>
                <div class="fond<?php echo $color_indic_display;?>"><?php echo $indic_display;?></div>
              </div>
              </div>
            </div>
        </section>
      </div>
    </div>
    <!-- Fin ligne -->
    <!-- Ligne DESKTOP -->
    <div class="row">
      <div class="col-12 col-12-medium">
        <section>
          <br>
        </section>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-12-medium">
        <section>
            <div class="row aln-center">
              <div class="col-2 col-12-small aln-center">
                <div class="notify-container">
                  <img src="images/menu/desktop.png" class=image_menu alt=''><br><select name=desktop onChange="submit()"  class='calculator'><?php echo $desktop;?></select>&nbsp;
                  <div class="fond<?php echo $color_desktop;?>"><?php echo $emission_desktop['emission_annuel'];?></div>
                </div>
              </div>
              <div class="col-2 col-12-small">
                <div class="notify-container txtmini">
                  <img src="images/menu/desktop.png" class=image_menu alt=''><?php echo $titre_an;?>&nbsp;<select name=duree_desktop onchange="submit()" class='calculator'><?php donne_duree_utilisation($emission_desktop['use_period'],$duree_desktop);?></select>
                </div>
              </div>
              <div class="col-2 col-12-small">
                <div class="notify-container">
                  <img src="images/menu/monitor.png" class=image_menu_md valign=middle alt=''><br><select name=display2 onChange="submit()"  class='calculator'><?php echo $display2;?></select>&nbsp;
                  <div class="fond<?php echo $color_display2;?>"><?php echo $emission_display2['emission_annuel'];?></div>
                </div>
              </div>
              <div class="col-2 col-12-small">
                <div class="notify-container txtmini">
                <img src="images/menu/monitor.png" class=image_menu_md valign=middle alt=''><?php echo $titre_an;?><select name=duree_display2 onchange="submit()" class='calculator'><?php donne_duree_utilisation($emission_display2['use_period'],$duree_display2);?></select>
                <div class="fond<?php echo $color_indic_display2;?>"><?php echo $indic_display2;?></div>
                </div>
              </div>
            </div>
        </section>
      </div>
    </div>
    <!-- Ligne SMARTPHONE -->
    <div class="row">
      <div class="col-12 col-12-medium">
        <section>
          <br>
        </section>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-12-medium">
        <section>
            <div class="row">
              <div class="col-2 col-12-small ">
                &nbsp;
              </div>
              <div class="col-2 col-12-small ">
                <div class="notify-container">
                  <img src="images/menu/smartphone.png" class=image_menu alt=''><br><select name=smartphone onChange="submit()"  class='calculator'><?php echo $smartphone;?></select>&nbsp;
                  <div class="fond<?php echo $color_smartphone;?>"><?php echo $emission_smartphone['emission_annuel'];?></div>
                </div>
              </div>
              <div class="col-2 col-12-small">
                <div class="notify-container txtmini">
                <img src="images/menu/smartphone.png" class=image_menu alt=''><?php echo $titre_an;?>&nbsp;<select name=duree_smartphone onchange="submit()" class='calculator'><?php donne_duree_utilisation($emission_smartphone['use_period'],$duree_smartphone);?></select>
                <div class="fond<?php echo $color_indic_smartphone;?>"><?php echo $indic_smartphone;?></div>
                </div>
              </div>
            </div>
        </section>
      </div>
    </div>
    <!-- Ligne TABLETTE -->
    <div class="row">
      <div class="col-12 col-12-medium">
        <section>
          <br>
        </section>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-12-medium">
        <section>
            <div class="row">
              <div class="col-2 col-12-small ">
                &nbsp;
              </div>
              <div class="col-2 col-12-small ">
                <div class="notify-container">
                  <img src="images/menu/tablette.png" class=image_menu alt=''><br><select name=tablette onChange="submit()"  class='calculator'><?php echo $tablette;?></select>&nbsp;
                  <div class="fond<?php echo $color_tablette;?>"><?php echo $emission_tablette['emission_annuel'];?></div>
                </div>
              </div>
              <div class="col-2 col-12-small">
                <div class="notify-container txtmini">
                <img src="images/menu/tablette.png" class=image_menu alt=''><?php echo $titre_an;?>&nbsp;<select name=duree_tablette onchange="submit()" class='calculator'><?php donne_duree_utilisation($emission_tablette['use_period'],$duree_tablette);?></select>
                <div class="fond<?php echo $color_indic_tablette;?>"><?php echo $indic_tablette;?></div>
                </div>
              </div>
            </div>
        </section>
      </div>
    </div>
    <!-- Ligne SMART DEVICE -->
    <div class="row">
      <div class="col-12 col-12-medium">
        <section>
          <br>
        </section>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-12-medium">
        <section>
            <div class="row">
              <div class="col-2 col-12-small ">
                &nbsp;
              </div>
              <div class="col-2 col-12-small ">
                <div class="notify-container">
                  <img src="images/menu/smartdevice.png" class=image_menu alt=''><br><select name=enceinte onChange="submit()"  class='calculator'><?php echo $enceinte;?></select>&nbsp;
                  <!-- $color_enceinte -->
                  <div class="fond<?php echo $color_enceinte;?>"><?php echo $emission_enceinte['emission_annuel'];?></div>
              </div>
              </div>
              <div class="col-2 col-12-small">
                <div class="notify-container txtmini">
                <img src="images/menu/smartdevice.png" class=image_menu alt=''><?php echo $titre_an;?>&nbsp;<select name=duree_enceinte onchange="submit()" class='calculator'><?php donne_duree_utilisation($emission_enceinte['use_period'],$duree_enceinte);?></select>
                <div class="fond<?php echo $color_indic_smartdevice;?>"><?php echo $indic_smartdevice;?></div>
                </div>
              </div>
            </div>
        </section>
      </div>
    </div>
  </form>
  <section>
	<br>
	<br>
  <form method="post" action="home_public.php">
    <input type=hidden name=LANG value=<?php echo $LANG; ?>>
    <input type=hidden name=laptop value=<?php echo $_POST['laptop']; ?>>
        <input type=hidden name=smartphone value=<?php echo $_POST['smartphone']; ?>>
        <input type=hidden name=enceinte value=<?php echo $_POST['enceinte']; ?>>
        <input type=hidden name=desktop value=<?php echo $_POST['desktop']; ?>>
        <input type=hidden name=display value=<?php echo $_POST['display']; ?>>
        <input type=hidden name=display2 value=<?php echo $_POST['display2']; ?>>
        <input type=hidden name=tablette value=<?php echo $_POST['tablette']; ?>>
        <input type=hidden name=duree_laptop value=<?php echo $_POST['duree_laptop']; ?>>
        <input type=hidden name=duree_display value=<?php echo $_POST['duree_display']; ?>>
        <input type=hidden name=duree_display2 value=<?php echo $_POST['duree_display2']; ?>>
        <input type=hidden name=duree_desktop value=<?php echo $_POST['duree_desktop']; ?>>
        <input type=hidden name=duree_smartphone value=<?php echo $_POST['duree_smartphone']; ?>>
        <input type=hidden name=duree_audio value=<?php echo $_POST['duree_enceinte']; ?>>
        <input type=hidden name=duree_tablette value=<?php echo $_POST['duree_tablette']; ?>>
        <input type=submit value="<?php echo $detail;?>">
  </form>
</section>
</div>
<br><br>
<?php if ( $total ){ ?>
<section>
  <div class="container">
    <div class="row aln-center">
      <div class="col-6 col-12-medium">
        VOS ÉQUIPEMENTS ÉMETENT PAR AN :
      <br>
      <b>  <?php echo $total." KgCO<small>2</small>eq / an";?></b>
    <br><br>
        POUR "COMPENSER" CES ÉMISSIONS, IL VOUS FAUDRAIT PLANTER:
      <br><b><?php echo $nb_arbre ;?><img src='/images/menu/arbre.png' class='image_menu'  alt='arbre'>tous les <?php echo $titre_an;?></b>
    <?php if (  $depasse ) { ?>
      <br><br>VOUS POUVEZ ÉGALEMENT CONSERVER VOS ÉQUIPEMENTS PLUS LONGTEMPS AFIN DE MINIMISER VOS ÉMISSIONS <img src="images/info/amelioration.png" class='image_menu_bg' alt="Amélioraiton" /><br>
    <?php } ?>
    <section>
        <br>L'ACCORD DE <a href="https://fr.wikipedia.org/wiki/Accord_de_Paris_sur_le_climat" target=_blank>PARIS</a> CIBLE À 2050<br> <b>2,1 tonnes de CO<sub>2</sub>eq</b> par habitant pour maintenir la température mondiale en dessous de <b>2°C</b>
      <br>
        <a href="http://unfccc.int/resource/docs/2015/cop21/fre/l09r01f.pdf" target=_blank><img src='/images/menu/pariscop21.png' class='image_menu' alt='Paris Cop 21'></a><br>VOTRE NUMÉRIQUE ÉMETS<b><br>
        <?php echo $nb_accord_paris."%";?></b> versus cet accord
      </section>
      </div>
      <div class="col-6 col-12-medium">
        <?php if ( @$total) { ?>
            <a download="BeMa-DigitalEco-Nuts.jpg" href="<?php echo "$nom_image";?>" title="BeMa-DigitalEco-Nuts"><?php echo $titre_resultat?><br><img src="<?php echo "$nom_image";?>" alt='Mon emission CO2'><br><?php echo $dw_resultat;?></a>
        <?php } ?>
      </div>
    </div>
</div>
</section>
<?php } ?>
  </div>
  </section>

<?php footer(); ?>
