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
if ( $_POST['laptop'] or $_POST['smartphone']  or $_POST['enceinte'] or $_POST['desktop'] ) {
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


  $emission_equipement=donne_information_emission_equipement($db,$id_equipement,$duree_laptop);
  $emission_smartphone=donne_information_emission_equipement($db,$id_equipement_smartphone,$duree_smartphone);
  $emission_enceinte=donne_information_emission_equipement($db,$id_equipement_enceinte,$duree_enceinte);
  $emission_desktop=donne_information_emission_equipement($db,$id_equipement_desktop,$duree_desktop);
  $emission_display=donne_information_emission_equipement($db,$id_equipement_display,$duree_display);
  $emission_display2=donne_information_emission_equipement($db,$id_equipement_display2,$duree_display2);
  $emission_tablette=donne_information_emission_equipement($db,$id_equipement_tablette,$duree_tablette);
  $total=$emission_equipement['emission_annuel']+$emission_smartphone['emission_annuel']+$emission_enceinte['emission_annuel']+$emission_desktop['emission_annuel']+$emission_display['emission_annuel']+$emission_display2['emission_annuel']+$emission_tablette['emission_annuel'];
}
$portable=donne_liste_pc($db,$id_equipement);
$smartphone=donne_liste_smartphone($db,$id_equipement_smartphone);
$enceinte=donne_liste_enceinte($db,$id_equipement_enceinte);
$desktop=donne_liste_desktop($db,$id_equipement_desktop);
$display=donne_liste_monitor($db,$id_equipement_display);
$display2=donne_liste_monitor($db,$id_equipement_display2);
$tablette=donne_liste_tablette($db,$id_equipement_tablette);

$data_laptop=donne_moyenne_emission_device($db,'1','');
$data_smartphone=donne_moyenne_emission_device($db,'6','');
$data_enceinte=donne_moyenne_emission_device($db,'5','');
$data_desktop=donne_moyenne_emission_device($db,'2','');
$data_display=donne_moyenne_emission_device($db,'7','');
$data_tablette=donne_moyenne_emission_device($db,'9','');

$moyenne_laptop=$data_laptop[0]/$emission_equipement['use_period'];
$moyenne_smartphone=$data_smartphone[0]/$emission_smartphone['use_period'];
$moyenne_enceinte=$data_enceinte[0]/$emission_enceinte['use_period'];
$moyenne_desktop=$data_desktop[0]/$emission_desktop['use_period'];
$moyenne_display=$data_display[0]/$emission_display['use_period'];
$moyenne_tablette=$data_tablette[0]/$emission_tablette['use_period'];

$depasse=0;
if ( $emission_equipement['emission_annuel'] < $moyenne_laptop)
$color_laptop="#16A085";
else {
  $color_laptop="#C70039";;
  $depasse++;
}

if ( $emission_smartphone['emission_annuel'] < $moyenne_smartphone)
$color_smartphone="#16A085";
else {
  $color_smartphone="#C70039";;
  $depasse++;
}

if ( $emission_enceinte['emission_annuel'] < $moyenne_enceinte)
$color_enceinte="#16A085";
else {
  $color_enceinte="#C70039";;
  $depasse++;
}

if ( $emission_desktop['emission_annuel'] < $moyenne_desktop)
$color_desktop="#16A085";
else {
  $color_desktop="#C70039";;
  $depasse++;
}

if ( $emission_display['emission_annuel'] < $moyenne_display)
$color_display="#16A085";
else {
  $color_display="#C70039";;
  $depasse++;
}
if ( $emission_display2['emission_annuel'] < $moyenne_display)
$color_display2="#16A085";
else {
  $color_display2="#C70039";;
  $depasse++;
}
if ( $emission_tablette['emission_annuel'] < $moyenne_tablette)
$color_tablette="#16A085";
else {
  $color_tablette="#C70039";;//#FF5733
  $depasse++;
}





deconnexion_db($db);
entete();
menu();
if ($total)
  $align="auto";
else $align="auto";
?>
<form method=POST>
<div id='content_millieu' align=center>
  <div style="float:left;width:100%;" align=center>
    <div style="float:<?php echo $align;?>;margin-right: 40px;padding: 10px;border-radius: 8%;;width:650px;height: 450px;background: linear-gradient(to right, #fbfbfd 0%, #595959 100%);background-image: url('http://nuts.be-ma.fr/images/nuts-iceberg.png');">
      <div style=";width:80%;min-height: 10vh;" align=center>
          <div>
          &nbsp;
          </div>
          <div style="border: solid 1px white;width:60%;padding: 15px 1em;border-radius: 8%;background-color: #888;font-size: 40px;color: white;font-family:'digital-clock-font';" align=center>
          <?php echo $total." kgCo<sub>2</sub>/".$titre_an1; ?>
          </div>
      </div>
      <br>
      <div style="float:left;margin-left: 10px;width:75%;" align=left>
      &nbsp;<br>&nbsp;
      </div>
      <!-- LAPTOP -->
      <div style="float:left;margin-left: 10px;width:75%;vertical-align: top;" align=left>
        <img src="images/menu/laptop.png" class=image_menu alt=''>&nbsp;<select name=laptop onChange="submit()"><?php echo $portable;?></select>&nbsp;<select name=duree_laptop onchange="submit()"><?php donne_duree_utilisation($emission_equipement['use_period'],$duree_laptop);?></select> <?php echo $titre_an;?>
      </div>
      <div style="float:right;width:20%;height:20px">
        <?php if ( $emission_equipement['emission_annuel'] ) { ?>
          <div style="text-align: center;float:left;width:20%;height:10px;background-color: <?php echo $color_laptop;?>;color: white;padding:10px;border-radius: 50%;">
        <?php echo $emission_equipement['emission_annuel'];?>
          </div>
        <?php }?>
      </div>
      <!-- // -->
      <div style="float:left;margin-left: 10px;width:75%;" align=left>
      &nbsp;
      </div>
        <!-- DISPLAY -->
      <div style="float:left;margin-left: 30px;width:75%;" align=left>
        <img src="images/menu/monitor.png" class=image_menu_md valign=middle alt=''>&nbsp;<select name=display onChange="submit()"><?php echo $display;?></select>&nbsp;<select name=duree_display onchange="submit()"><?php donne_duree_utilisation($emission_display['use_period'],$duree_display);?></select> <?php echo $titre_an;?>
      </div>
      <div style="float:left;width:20%;height:20px">
        <?php if ( $emission_display['emission_annuel'] ) { ?>
          <div style="text-align: center;float:left;width:20%;height:10px;background-color: <?php echo $color_display;?>;color: white;padding:10px;border-radius: 50%;">
        <?php echo $emission_display['emission_annuel'];?>
          </div>
        <?php }?>
      </div>
      <!-- // -->
      <div style="float:left;margin-left: 10px;width:75%;" align=left>
      &nbsp;
      </div>
      <!-- DESKTOP -->
      <div style="float:left;margin-left: 10px;width:75%;" align=left>
        <img src="images/menu/desktop.png" class=image_menu alt=''>&nbsp;<select name=desktop onChange="submit()"><?php echo $desktop;?></select>&nbsp;<select name=duree_desktop onchange="submit()"><?php donne_duree_utilisation($emission_desktop['use_period'],$duree_desktop);?></select> <?php echo $titre_an;?>
      </div>
      <div style="float:right;width:20%;height:20px">
        <?php if ( $emission_desktop['emission_annuel'] ) { ?>
          <div style="text-align: center;float:left;width:20%;height:10px;background-color: <?php echo $color_desktop;?>;color: white;padding:10px;border-radius: 50%;">
        <?php echo $emission_desktop['emission_annuel'];?>
          </div>
        <?php }?>
      </div>
      <!-- // -->
      <div style="float:left;margin-left: 10px;width:75%;" align=left>
      &nbsp;
      </div>
      <!-- DISPLAY -->
      <div style="float:left;margin-left: 30px;width:75%;" align=left>
        <img src="images/menu/monitor.png" class=image_menu_md valign=middle  alt=''>&nbsp;<select name=display2 onChange="submit()"><?php echo $display2;?></select>&nbsp;<select name=duree_display2 onchange="submit()"><?php donne_duree_utilisation($emission_display2['use_period'],$duree_display2);?></select> <?php echo $titre_an;?>
      </div>
      <div style="float:right;width:20%;height:20px">
        <?php if ( $emission_display2['emission_annuel'] ) { ?>
          <div style="text-align: center;float:left;width:20%;height:10px;background-color: <?php echo $color_display2;?>;color: white;padding:10px;border-radius: 50%;">
        <?php echo $emission_display2['emission_annuel'];?>
          </div>
        <?php }?>
      </div>
      <!-- // -->
      <div style="float:left;margin-left: 10px;width:75%;" align=left>
      &nbsp;
      </div>
      <!-- SMARTPHONE -->
      <div style="float:left;margin-left: 10px;width:75%;" align=left>
        <img src="images/menu/smartphone.png" class=image_menu valt=''>&nbsp;<select name=smartphone onChange="submit()"><?php echo $smartphone;?></select>&nbsp;<select name=duree_smartphone onchange="submit()"><?php donne_duree_utilisation($emission_smartphone['use_period'],$duree_smartphone);?></select> <?php echo $titre_an;?>
      </div>
      <div style="float:right;width:20%;height:20px">
        <?php if ( $emission_smartphone['emission_annuel'] ) { ?>
        <div style="text-align: center;float:left;width:20%;height:10px;background-color: <?php echo $color_smartphone;?>;color: white;padding:10px;border-radius: 50%;">
        <?php echo $emission_smartphone['emission_annuel'];?>
        </div>
        <?php }?>
      </div>
      <!-- // -->
      <div style="float:left;margin-left: 10px;width:75%;" align=left>
      &nbsp;
      </div>
      <!-- TABLETTE -->
      <div style="float:left;margin-left: 10px;width:75%;" align=left>
        <img src="images/menu/tablette.png" class=image_menu alt=''>&nbsp;<select name=tablette onChange="submit()"><?php echo $tablette;?></select>&nbsp;<select name=duree_tablette onchange="submit()"><?php donne_duree_utilisation($emission_tablette['use_period'],$duree_tablette);?></select> <?php echo $titre_an;?>
      </div>
      <div style="float:right;width:20%;height:20px">
        <?php if ( $emission_tablette['emission_annuel'] ) { ?>
          <div style="text-align: center;float:left;width:20%;height:10px;background-color: <?php echo $color_tablette;?>;color: white;padding:10px;border-radius: 50%;">
        <?php echo $emission_tablette['emission_annuel'];?>
          </div>
        <?php }?>
      </div>
      <!-- // -->
      <div style="float:left;margin-left: 10px;width:75%;" align=left>
      &nbsp;
      </div>
      <!-- SMART DEVICE -->
      <div style="float:left;margin-left: 10px;width:75%;" align=left>
        <img src="images/menu/smartdevice.png" class=image_menu alt=''>&nbsp;<select name=enceinte onChange="submit()"><?php echo $enceinte;?></select>&nbsp;<select name=duree_enceinte onchange="submit()"><?php donne_duree_utilisation($emission_enceinte['use_period'],$duree_enceinte);?></select> <?php echo $titre_an;?>
      </div>
      <div style="float:right;width:20%;height:20px">
        <?php if ( $emission_enceinte['emission_annuel'] ) { ?>
        <div style="text-align: center;float:left;width:20%;height:10px;background-color: <?php echo $color_enceinte;?>;color: white;padding:10px;border-radius: 50%;">
        <?php echo $emission_enceinte['emission_annuel'];?>
        </div>
        <?php }?>
      </div>
      </FORM>
      <form method=POST action="home_public.php">
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
      <div style="float:left;margin-left: 10px;width:100%;" align=center>
        <input type=submit value="<?php echo $detail;?>">
      </div>
    </div>
      <!-- // -->
    <?php if ( @$total ) {
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
      $ip_host=$_SERVER['REMOTE_ADDR'];
      $nom_image="generate/nutsresult-$dtms011-$ip_host.png";
      imagepng($source,"$nom_image");
       ?>
      <div style="float:auto;margin-right: 40px;padding: 10px;border-radius: 8%;;width:20%;" align=center>

        <a download="BeMa-DigitalEco-Nuts.jpg" href="<?php echo "$nom_image";?>" title="BeMa-DigitalEco-Nuts"><?php echo $titre_resultat?><br><img src="<?php echo "$nom_image";?>" alt='Mon emission CO2'><br><?php echo $dw_resultat;?></a>
      </div>
    <?php } ?>

  </div>
</div>
</div>

<?php
footer();
?>
