<?php
include("include/connexion.php");
include("include/auth.php");
include("include/equipement.php");
include("include/menu.php");

if ( $_GET['LANG'] ) {
  $LANG=$_GET['LANG'];
}
else {
  $_SESSION['Lang']="fr";
  $LANG="fr";
}
include(".config_$LANG.php");
session_start();
//verif_session();

entete();
menu();
?>

<br><br><br><br><br><br>
<table width=550 align=center valign=center>
  <tr valign=center width=550>
    <td valign=center align=left width=550>Nuts by BeMa est une plateforme afin d’éclairer les impacts sur l'environnement liés à notre consommation du numérique<br>
      <br>En effet, nous émettons des <b>G</b>az à <b>E</b>ffet de <b>S</b>erres (GES) avec l'usage de nos appareils, de nos équipements numériques.<br>
      <br>Nuts est un datalake regroupant les données constructeurs autour des émissions des GES,
      pour les différentes phase de fabrication d'un équipement :<br>
- Production & fabrication <br>
- Transport <br>
- Usage <br>
- Recyclage <br><br>
Nuts a pour vocation de faire apparaître vos émisisons de GES (CO<sub>2</sub>eq) lors de l'usage de vos équipements.<br>
Les émissions affichées sont basées sur des données constructeurs, cela prend en compte un usage moyen.<br> Donc plus vous utiliserez vos appareils et plus vous utiliserez de l'éléctricite (par exemple), plus votre impact sera en augmentation.  <br><br><b>Un conseil pensez simplement à augmenter la durée de vie de vos appareils et vous serez déjà un Digital Ecologist</b><br>
<center><a href='home_public.php' class=titre><img src="/images/menu/home.png" class='image_menu_md'><br>C'est par ici</a></center><br>
<br><sub>Sources : <br>
- l'ensemble des informations affichées sont liées a des documents constructeurs<br>- 1 Arbre c'est une absorbtion de 30KgCO<sub>2</sub>, nous avons retenue cette hyptohèse, car en fonction de l'arbre de sa taille etc cela peut varier.
Merci de votre compréhension.</sub>
 </td>
</tr>
</table>
<table width=550 align=center valign=center>
  <tr valign=center width=550>
  </tr>
    <tr valign=center width=550>
      <td valign=center width=600><img src='/images/menu/datalake.png' width=475></td>
    </tr>

</table>
<?php
footer();

?>
