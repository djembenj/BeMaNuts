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
  $duree_audio=$_POST['duree_audio'];
  $duree_tablette=$_POST['duree_tablette'];
  //$LANG=$_POST['LANG'];


  $emission_equipement=donne_information_emission_equipement ($db,$id_equipement);
  $emission_smartphone=donne_information_emission_equipement ($db,$id_equipement_smartphone);
  $emission_enceinte=donne_information_emission_equipement($db,$id_equipement_enceinte);
  $emission_desktop=donne_information_emission_equipement($db,$id_equipement_desktop);
  $emission_display=donne_information_emission_equipement($db,$id_equipement_display);
  $emission_display2=donne_information_emission_equipement($db,$id_equipement_display2);
  $emission_tablette=donne_information_emission_equipement($db,$id_equipement_tablette);
}
$portable=donne_liste_pc($db,$id_equipement);
$smartphone=donne_liste_smartphone($db,$id_equipement_smartphone);
$enceinte=donne_liste_enceinte($db,$id_equipement_enceinte);
$desktop=donne_liste_desktop($db,$id_equipement_desktop);
$display=donne_liste_monitor($db,$id_equipement_display);
$display2=donne_liste_monitor($db,$id_equipement_display2);
$tablette=donne_liste_tablette($db,$id_equipement_tablette);

deconnexion_db($db);
entete();
menu();
$myconsoannuel=0;
?>
<div id='content_millieu'>
<form method=post>
  <table class=nuts1>
    <tr>
      <td colspan=8 class="center cadre-titre-h1"><?php echo $titre_Index2;?></td>
    </tr>
    <tr class=bgcolor_gris>
      <td colspan=2 class="center cadre-titre"><?php echo $titre_equipement;?></td>
      <td class="center cadre-titre-white bgcolor_bleu taille85">Total</td>
      <td class="center cadre-titre-white bgcolor_bleu taille85">Production</td>
      <td class="center cadre-titre-white bgcolor_bleu taille85">Transport</td>
      <td class="center cadre-titre-white bgcolor_vert taille85">Usage</td>
      <td class="center cadre-titre-white bgcolor_bleu taille85">Recycle</td>
      <td class="center cadre-titre taille85"><?php echo $titre_annuel;?></td>
    </tr>
  <tr>
    <td class=left><?php echo $titre_mon_portable;?></td>
    <td class=left><select name=laptop onChange="submit()"><?php echo $portable;?></select><?php echo "<a href='".$emission_equipement['source']."' target=\"_blank\">LINK</a>"; ?>
      <?php
      if ( $_POST['laptop'] ) {
        if ( $LANG=="fr" )
        $emission_equipement['date_emission']=date_fr($emission_equipement['date_emission']);
      echo "<br>".$date_mon_portable." : ".$emission_equipement['date_emission']."<br>"?><?php echo $emission_equipement['ref2']."<br>".$emission_equipement['info'];?>
    <?php } ?>
    </td>
    <?php
    $emission_annuel="";

    if ( $duree_laptop )
        $emission_annuel=round($emission_equipement['total']/$duree_laptop,2);

    if ( $emission_equipement['use_period'] && ! $duree_laptop)
      $emission_annuel=round($emission_equipement['total']/$emission_equipement['use_period'],2);

    if ($emission_annuel !="NAN")
    $myconsoannuel+=$emission_annuel;
    $production=round($emission_equipement['total']*$emission_equipement['production']/100,0);
    $transport=round($emission_equipement['total']*$emission_equipement['transport']/100,0);
    $custumer=round($emission_equipement['total']*$emission_equipement['custumer']/100,0);
    $recycling=round($emission_equipement['total']*$emission_equipement['recycling']/100,0);

    echo '
    <td class=center>100% <br />'.$emission_equipement['total'].'</td>
    <td class=center><b>'.$emission_equipement['production'].'% <br />'.$production.'</b></td>
    <td class=center>'.$emission_equipement['transport'].'% <br />'.$transport.'</td>
    <td class=center><b>'.$emission_equipement['custumer'].'% <br />'.$custumer.'</b></td>
    <td class=center>'.$emission_equipement['recycling'].'% <br />'.$recycling.'</td>
    <td class=center>'.$emission_annuel.'</td>';
    ?>
  </tr>
  <tr>
    <td class=left><?php echo $titre_duration;?></td>
    <td class=left colspan="7"><select name=duree_laptop onchange="submit()"><?php donne_duree_utilisation($emission_equipement['use_period'],$duree_laptop);?></select> <?php echo $titre_an;?></td>
  </tr>
  <tr>
    <td class=left><?php echo $titre_screen;?></td>
    <td class=left><select name=display onChange="submit()"><?php echo $display;?></select><?php echo "<a href='".$emission_display['source']."' target=\"_blank\">LINK</a>"; ?>
    <?php
    $emission_annuel="";

    if ( $duree_display )
        $emission_annuel=round($emission_display['total']/$duree_display,2);

    if ( $emission_display['use_period'] && ! $duree_display)
    $emission_annuel=round($emission_display['total']/$emission_display['use_period'],2);
    if ($emission_annuel !="NAN")
    $myconsoannuel+=$emission_annuel;
    $production=round($emission_display['total']*$emission_display['production']/100,0);
    $transport=round($emission_display['total']*$emission_display['transport']/100,0);
    $custumer=round($emission_display['total']*$emission_display['custumer']/100,0);
    $recycling=round($emission_display['total']*$emission_display['recycling']/100,0);

    echo '
    <td class=center>100% <br />'.$emission_display['total'].'</td>
    <td class=center><b>'.$emission_display['production'].'% <br />'.$production.'</b></td>
    <td class=center>'.$emission_display['transport'].'% <br />'.$transport.'</td>
    <td class=center><b>'.$emission_display['custumer'].'% <br />'.$custumer.'</b></td>
    <td class=center>'.$emission_display['recycling'].'% <br />'.$recycling.'</td>
    <td class=center>'.$emission_annuel.'</td>';
    ?>
  </tr>
  <tr>
    <td class=left><?php echo $titre_duration;?></td>
    <td class=left colspan="7"><select name=duree_display onchange="submit()"><?php donne_duree_utilisation($emission_display['use_period'],$duree_display);?></select> <?php echo $titre_an;?></td>
  </tr>
  <tr>
    <td colspan=8><hr></td>
  </tr>
  <tr>

    <td class=left><?php echo $titre_desktop;?></td>
    <td class=left><select name=desktop onChange="submit()"><?php echo $desktop;?></select><?php echo "<a href='".$emission_desktop['source']."' target=\"_blank\">LINK</a>"; ?>
    <?php
    $emission_annuel="";

    if ( $duree_desktop )
        $emission_annuel=round($emission_desktop['total']/$duree_desktop,2);

    if ( $emission_desktop['use_period'] && !$duree_desktop)
    $emission_annuel=round($emission_desktop['total']/$emission_desktop['use_period'],2);
    if ($emission_annuel !="NAN")
      $myconsoannuel+=$emission_annuel;
    $production=round($emission_desktop['total']*$emission_desktop['production']/100,0);
    $transport=round($emission_desktop['total']*$emission_desktop['transport']/100,0);
    $custumer=round($emission_desktop['total']*$emission_desktop['custumer']/100,0);
    $recycling=round($emission_desktop['total']*$emission_desktop['recycling']/100,0);

    echo '
    <td class=center>100% <br />'.$emission_desktop['total'].'</td>
    <td class=center><b>'.$emission_desktop['production'].'% <br />'.$production.'</b></td>
    <td class=center>'.$emission_desktop['transport'].'% <br />'.$transport.'</td>
    <td class=center><b>'.$emission_desktop['custumer'].'% <br />'.$custumer.'</b></td>
    <td class=center>'.$emission_desktop['recycling'].'% <br />'.$recycling.'</td>
    <td class=center>'.$emission_annuel.'</td>';
    ?>
  </tr>
  <tr>
    <td class=left><?php echo $titre_duration;?></td>
    <td class=left colspan="7"><select name=duree_desktop onchange="submit()"><?php donne_duree_utilisation($emission_desktop['use_period'],$duree_desktop);?></select> <?php echo $titre_an;?></td>
  </tr>
  <tr>

    <td class=left><?php echo $titre_screen;?></td>
    <td class=left><select name=display2 onChange="submit()"><?php echo $display2;?></select><?php echo "<a href='".$emission_display2['source']."' target=\"_blank\">LINK</a>"; ?>
    <?php
    $emission_annuel="";

    if ( $duree_display2 )
        $emission_annuel=round($emission_display2['total']/$duree_display2,2);

    if ( $emission_display2['use_period'] && ! $duree_display2)
    $emission_annuel=round($emission_display2['total']/$emission_display2['use_period'],2);
    if ($emission_annuel !="NAN")
    $myconsoannuel+=$emission_annuel;
    $production=round($emission_display2['total']*$emission_display2['production']/100,0);
    $transport=round($emission_display2['total']*$emission_display2['transport']/100,0);
    $custumer=round($emission_display2['total']*$emission_display2['custumer']/100,0);
    $recycling=round($emission_display2['total']*$emission_display2['recycling']/100,0);

    echo '
    <td class=center>100% <br />'.$emission_display2['total'].'</td>
    <td class=center><b>'.$emission_display2['production'].'% <br />'.$production.'</b></td>
    <td class=center>'.$emission_display2['transport'].'% <br />'.$transport.'</td>
    <td class=center><b>'.$emission_display2['custumer'].'% <br />'.$custumer.'</b></td>
    <td class=center>'.$emission_display2['recycling'].'% <br />'.$recycling.'</td>
    <td class=center>'.$emission_annuel.'</td>';

    ?>
  </tr>
  <tr>

    <td class=left><?php echo $titre_duration;?></td>
    <td class=left colspan="7"><select name=duree_display2 onchange="submit()"><?php donne_duree_utilisation($emission_display2['use_period'],$duree_display2);?></select> <?php echo $titre_an;?></td>
  </tr>
  <tr>
    <td colspan=8><hr></td>
  </tr>
  <tr>
    <td class=left><?php echo $titre_telephone;?></td>
    <td class=left><select name=smartphone onChange="submit()"><?php echo  $smartphone;?></select><?php echo "<a href='".$emission_smartphone['source']."' target=\"_blank\">LINK</a>"; ?>
      <?php
      $emission_annuel="";

      if ( $duree_smartphone )
          $emission_annuel=round($emission_smartphone['total']/$duree_smartphone,2);

      if ( $emission_smartphone['use_period'] && ! $duree_smartphone)
      $emission_annuel=round($emission_smartphone['total']/$emission_smartphone['use_period'],2);
      if ($emission_annuel !="NAN")
      $myconsoannuel+=$emission_annuel;
      $production=round($emission_smartphone['total']*$emission_smartphone['production']/100,0);
      $transport=round($emission_smartphone['total']*$emission_smartphone['transport']/100,0);
      $custumer=round($emission_smartphone['total']*$emission_smartphone['custumer']/100,0);
      $recycling=round($emission_smartphone['total']*$emission_smartphone['recycling']/100,0);

      echo '
      <td class=center>100% <br />'.$emission_smartphone['total'].'</td>
      <td class=center><b>'.$emission_smartphone['production'].'% <br />'.$production.'</b></td>
      <td class=center>'.$emission_smartphone['transport'].'% <br />'.$transport.'</td>
      <td class=center><b>'.$emission_smartphone['custumer'].'% <br />'.$custumer.'</b></td>
      <td class=center>'.$emission_smartphone['recycling'].'% <br />'.$recycling.'</td>
      <td class=center>'.$emission_annuel.'</td>';
      ?>
  </tr>
  <tr>
    <td class=left><?php echo $titre_duration;?></td>
    <td class=left colspan="7"><select name=duree_smartphone onchange="submit()"><?php donne_duree_utilisation($emission_smartphone['use_period'],$duree_smartphone);?></select> <?php echo $titre_an;?></td>
  </tr>
  <tr>
    <td colspan=8><hr></td>
  </tr>
  <tr>
    <td class=left><?php echo $titre_tablette;?></td>
    <td class=left><select name=tablette onChange="submit()"><?php echo  $tablette;?></select><?php echo "<a href='".$emission_tablette['source']."' target=\"_blank\">LINK</a>"; ?>
      <?php
      $emission_annuel="";

      if ( $duree_tablette)
          $emission_annuel=round($emission_tablette['total']/$duree_tablette,2);

      if ( $emission_tablette['use_period'] && ! $duree_tablette)
      $emission_annuel=round($emission_tablette['total']/$emission_tablette['use_period'],2);
      if ($emission_annuel !="NAN")
      $myconsoannuel+=$emission_annuel;
      $production=round($emission_tablette['total']*$emission_tablette['production']/100,0);
      $transport=round($emission_tablette['total']*$emission_tablette['transport']/100,0);
      $custumer=round($emission_tablette['total']*$emission_tablette['custumer']/100,0);
      $recycling=round($emission_tablette['total']*$emission_tablette['recycling']/100,0);

      echo '
      <td class=center>100% <br />'.$emission_tablette['total'].'</td>
      <td class=center><b>'.$emission_tablette['production'].'% <br />'.$production.'</b></td>
      <td class=center>'.$emission_tablette['transport'].'% <br />'.$transport.'</td>
      <td class=center><b>'.$emission_tablette['custumer'].'% <br />'.$custumer.'</b></td>
      <td class=center>'.$emission_tablette['recycling'].'% <br />'.$recycling.'</td>
      <td class=center>'.$emission_annuel.'</td>';
      ?>
  </tr>
  <tr>

    <td class=left><?php echo $titre_duration;?></td>
    <td class=left colspan="7"><select name=duree_tablette onchange="submit()"><?php donne_duree_utilisation($emission_tablette['use_period'],$duree_tablette);?></select> <?php echo $titre_an;?></td>
  </tr>
  <tr>
    <td colspan=8><hr></td>
  </tr>
  <tr>

    <td class=left><?php echo $titre_audio;?></td>
    <td class=left><select name=enceinte onChange="submit()"><?php echo  $enceinte;?></select><?php echo "<a href='".$emission_enceinte['source']."' target=\"_blank\">LINK</a>"; ?>
      <?php
      $emission_annuel="";

      if ( $duree_audio )
          $emission_annuel=round($emission_enceinte['total']/$duree_audio,2);

      if ( $emission_enceinte['use_period'] && ! $duree_audio )
      $emission_annuel=round($emission_enceinte['total']/$emission_enceinte['use_period'],2);
      if ($emission_annuel !="NAN")
      $myconsoannuel+=$emission_annuel;
      $production=round($emission_enceinte['total']*$emission_enceinte['production']/100,0);
      $transport=round($emission_enceinte['total']*$emission_enceinte['transport']/100,0);
      $custumer=round($emission_enceinte['total']*$emission_enceinte['custumer']/100,0);
      $recycling=round($emission_enceinte['total']*$emission_enceinte['recycling']/100,0);

      echo '
      <td class=center>100% <br />'.$emission_enceinte['total'].'</td>
      <td class=center><b>'.$emission_enceinte['production'].'% <br />'.$production.'</b></td>
      <td class=center>'.$emission_enceinte['transport'].'% <br />'.$transport.'</td>
      <td class=center><b>'.$emission_enceinte['custumer'].'% <br />'.$custumer.'</b></td>
      <td class=center>'.$emission_enceinte['recycling'].'% <br />'.$recycling.'</td>
      <td class=center>'.$emission_annuel.'</td>';
      ?>
  </tr>
  <tr>
    <td class=left><?php echo $titre_duration;?></td>
    <td class=left colspan="7"><select name=duree_audio onchange="submit()"><?php donne_duree_utilisation($emission_enceinte['use_period'],$duree_audio);?></select> <?php echo $titre_an;?></td>
  </tr>
  <tr>
    <td colspan=8><hr></td>
  </tr>

  <tr class=bgcolor_gris>
      <td colspan=3 class=center><br>&nbsp;<b>Digital Ecologist</b><br>&nbsp;</td>
      <td colspan="5" class=center><b><?php echo  $myconsoannuel;?> KgCO<sub>2</sub>eq / <?php echo $titre_an; ?></b></td>
  </tr>
  <?php
    if ( $myconsoannuel > 0 ){
    // 1 abres absrobe 30KG de CO2/an versus https://ecotree.green/calculer-co2-numerique
    $nb_arbre=round($myconsoannuel/30,0);
    $nb_accord_paris=round($myconsoannuel/2100,2);
    $myconsoannuel_image=round($myconsoannuel,0);
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
 ?>
 <tr>
     <td colspan="3" class=center><img src='/images/menu/co2.png' class='image_menu' alt='co2'><br><b><?php echo  $myconsoannuel;?></b> KgCO<sub>2</sub>eq / <?php echo $titre_an; ?></td>
     <td colspan="5" class=center><img src='/images/menu/arbre.png' class='image_menu'  alt='arbre'><br><b><?php echo $nb_arbre;?> arbres / <?php echo $titre_an; ?></b></td>
 </tr>
 <tr class=bgcolor_gris>
    <td colspan="3" class=center>Accord de Paris cible à 2050 : <br> <b>2,1 tonnes de CO<sub>2</sub></b> pour 2°C</td>
    <td colspan="5" class=center><a href='https://fr.wikipedia.org/wiki/Conf%C3%A9rence_de_Paris_de_2015_sur_les_changements_climatiques' target=\"_blank\"><img src='/images/menu/pariscop21.png' class='image_menu' alt='Paris Cop 21'></a><br><b><?php echo $nb_accord_paris; ?> % versus COP21</b></td>
  </tr>
  <?php
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
  <tr>
    <td colspan="8" class=center><br><a download="BeMa-DigitalEco-Nuts.jpg" href="<?php echo "$nom_image";?>" title="BeMa-DigitalEco-Nuts"><?php echo $titre_resultat?><br><img src="<?php echo "$nom_image";?>" alt='Mon emission CO2'><br><?php echo $dw_resultat;?></a><br>&nbsp;</td>
  </tr>
 <?php
 }
 ?>
</table>
</form>
</div>
</div>
<?php footer();?>
