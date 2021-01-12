<?php
include("../include/connexion.php");
include("../include/equipement.php");
include("../include/menu.php");
include("../include/auth.php");
session_start();
verif_session();

entete();
function menu_admin() {
  if ($_SESSION['Login']){
	$link_acceuil="admin/add_equipement.php";
	$link_login="../close.php";
	$img_login="logout.png";
	$txt_login="Logout";
	}
	else {
		$link_acceuil="add_equipement.php";
		$link_login="../acceuil.php";
		$img_login="login.png";
		$txt_login="Login";
	}
  ?>
  <div class='container'>
  	<div id='content_haut'>
  <div class="notify-container"><button class='btn-menu'><a href="/<?php echo $link_acceuil;?>" class=titre><img src="/images/nuts.png" class='image_menu'></a></button></div>
  </div>
  </div>
  <?php
}
menu_admin();

$db=connexion_db();
//print_r($_POST);
$type_equipement_list=donne_liste_type_equipement ($db,$_POST['type_equipement']);
$constructeur_list=donne_liste_constructeur ($db,'');
$use_location_list=donne_liste_use_location ($db,'');

if ( $_POST  && $_POST['type_form']== "2") {

  /*print_r($_POST);
  echo "<br><br>";*/

  // ADD ON INFORMATION
  $screen=$_POST['screen'];
  $weight=$_POST['weight'];
  $tec=$_POST['tec'];
  $assembly=$_POST['assembly'];
  $cpu=$_POST['cpu'];
  $dram=$_POST['dram'];
  $psu=$_POST['psu'];;
  $share=$_POST['share'];
  $capacity_stockage=$_POST['capacity_stockage'];

  $id_user=$_SESSION['Id_User'];
  $type_equipement=$_POST['type_equipement'];
  $constructeur=$_POST['constructeur'];
  $nom=$_POST['nom'];
  $ref=addslashes($_POST['ref']);
  $model=$_POST['model'];
  $ref2=$_POST['ref2'];
  $kg=$_POST['kg'];
  $kg2=$_POST['kg2'];
  $variation=$_POST['variation'];
  $variation2=$_POST['variation2'];
  if ( $variation == "" or $variation == "0")
    $variation="0";
  if ( $variation2 == "" or $variation2 == "0")
    $variation2="0";
  $transport=$_POST['transport'];
  $recycling=$_POST['recycling'];
  $use=$_POST['use'];
  $production=$_POST['production'];
  $nb_year=$_POST['nb_year'];
  $date=$_POST['date'];
  $source=$_POST['source'];
  $use_location=$_POST['use_location'];

  if  ( is_numeric($transport) && is_numeric($recycling) && is_numeric($use) && is_numeric($production) && is_numeric($nb_year) && is_numeric($variation2) && is_numeric($variation) && is_numeric($kg) && is_numeric($kg2) )
  {
    $information=addslashes($_POST['information']);
    $nom=addslashes(trim($nom));
    $ref=addslashes($ref);
    $ref2=addslashes($ref2);
    $model=addslashes(trim($model));

    $last_id=insert_equipepement($db,$constructeur,$nom,$ref,$ref2,$type_equipement,$id_user,$information,$model);
    //$last_id=12;
    if ( $last_id) {
      echo "<b>Insertion equipement $nom $model $ref : OK</b><br><br>";
      $last_id_emission=insert_emission_equipement($db,$recycling,$transport,$use,$production,$kg,$nb_year,$date,$last_id,$source,$id_user,$variation,$use_location,$kg2,$variation2,$type_equipement);
      if ($last_id_emission) {
        echo "<b>Insertion emission $kg: OK</b><br><br>";
        }
      else {
        echo "Erreur insertion emission";
      }
      $last_id_information=insert_information_equipement($db,$id_user,$last_id,$nom,$screen,$weight,$tec,$assembly,$cpu,$dram,$psu,$share,$date,$type_equipement,$capacity_stockage);
      if ($last_id_information) {
        echo "<b>Insertion information $nom $model: OK</b><br><br>";
        }
      else {
        echo "Erreur insertion information";
      }
    }
    else {
      echo "Erreur insertion equipement";
    }
  }
  else {
    echo "Erreur dans la saisie des informations";
  }

}
else if ( $_POST  && $_POST['type_form']==1 ) {
  //echo "On a selection le type d'equipement";
  $type_equipement=$_POST['type_equipement'];
  // on va ajouter le formulaire specifique a l'equipement
  $screen="<td>Screen Size</td><td><input type=number min=0 step=1 name=screen value=0></td>";
  $weight="<td>Product Weight<br>Kg</td><td><input type=number min=0 name=weight step=\"0.001\" value=0></td>";
  $tec="<td>Energy Demand kWh<br>(Yearly TEC)</td><td><input type=number min=0 step=\"0.01\"  name=tec value=0></td>";
  $assembly="<td>Assembly Location</td><td><select name=assembly value=1>$use_location_list</select></td>";
  $nb_cpu="<td>CPU Quantity***</td><td><input type=number min=0 step=1 name=cpu value=0></td>";
  $nb_dram="<td>DRAM Capacity***<br>(GB)</td><td><input type=number min=0 step=2 name=dram value=0></td>";
  $nb_psu="<td>Number of PSUs***</td><td><input type=number min=0 step=1 name=psu value=0></td>";
  $nb_share="<td>Number of servers sharing rack***</td><td><input type=number min=0 step=1 name=share value=0></td>";
  $capacity_stockage="<td>Capacité de stockage<br>(To)***</td><td><input type=number min=0 step=1 name=capacity_stockage value=0></td>";
  $gb_Storage="<td>Storage Size***</td><td><input type=number min=0 step=1 value=0 name=gb_storage>GB</td>";
  $cpu_information="<td>CPU Information***</td><td><input type=texte min=0 step=1 value=0 name=cpu_information></td>";
  $txt_information_en_cours="<tr><td>*** not available</td></tr>";

  switch ($type_equipement) {
    case 7; case 10: $text_input="<table align=center cellspacing=10 bgcolor=ddddd><tr><td colspan=2 align=center><b></b></td></tr><tr>$screen</tr><tr>$weight</tr><tr>$tec</tr><tr>$assembly</tr>$txt_information_en_cours</table>"; break;
    case 3; case 5; case 8; case 12 : $text_input="<table align=center cellspacing=10 bgcolor=ddddd><tr><td colspan=2 align=center><b></b></td></tr><tr>$weight</tr><tr>$tec</tr><tr>$assembly</tr>$txt_information_en_cours</table>"; break;
    // serveurs
    case 4; $text_input="<table align=center cellspacing=10 bgcolor=ddddd><tr><td colspan=2 align=center><b></b></td></tr><tr>$weight</tr><tr>$tec</tr><tr>$assembly</tr><tr>$nb_cpu</tr><tr>$nb_dram</tr><tr>$nb_psu</tr><tr>$nb_share</tr>$txt_information_en_cours</table>"; break;
    case 2; $text_input="<table align=center cellspacing=10 bgcolor=ddddd><tr><td colspan=2 align=center><b></b></td></tr><tr>$weight</tr><tr>$tec</tr><tr>$assembly</tr><tr>$nb_cpu</tr><tr>$nb_dram</tr>$txt_information_en_cours</table>"; break;
    case 1: $text_input="<table align=center cellspacing=10 bgcolor=ddddd><tr><td colspan=2 align=center><b></b></td></tr><tr>$screen</tr><tr>$weight</tr><tr>$tec</tr><tr>$assembly</tr><tr>$gb_Storage</tr><tr>$cpu_information</tr>$txt_information_en_cours</table>"; break;
    case 6; case 9 : $text_input="<table align=center cellspacing=10 bgcolor=ddddd><tr><td colspan=2 align=center><b></b></td></tr><tr>$screen</tr><tr>$weight</tr><tr>$tec</tr><tr>$assembly</tr>$txt_information_en_cours</table>"; break;
    case 11 : $text_input="<table align=center cellspacing=10 bgcolor=ddddd><tr><td colspan=2 align=center><b></b></td></tr><tr>$weight</tr><tr>$tec</tr><tr>$assembly</tr><tr>$capacity_stockage</tr>$txt_information_en_cours</table>"; break;
    default :$text_input=""; break;
  }
}
deconnexion_db($db);

?>
<form method=POST>
  <input type=hidden name=type_form value=1>
<table align=center cellspacing=10 >
  <tr>
    <td valign=top>
<table align=center cellspacing=10>
<tr><td><b>Choissisez le Type equipement</td><td><select name=type_equipement required onchange="submit()"><?php echo $type_equipement_list;?></select></form></td><form method=POST><input type=hidden name=type_form value=2><input type=hidden name=type_equipement value=<?php echo $type_equipement;?>><td>Constructeur Equipement</td><td><select name=constructeur required><?php echo $constructeur_list?></select></td></tr>
<tr><td><b>Nom equipement</td><td><input type=text name=nom required></td><td><b>Model equipement</b><br><sub>(Annee)</td><td><input type=text name=model></td></tr>
<tr><td>Reference equipement<br><sub>(Ecran)</td><td><input type=text name=ref></td><td>Reference (bis) equipement<br><sub>(Ref-Model Type etc ...)</td><td><input type=text name=ref2></td></tr>
<tr><td>
<tr><td><b>Kg CO2 eq Gaz Emission</td><td><input type=number step="1" min=0 name=kg required></td><td><b>Variation Kg CO2 eq Gaz Emission</td><td><input type=number step="1" min=0  name=variation value=0></td></tr>
<tr><td>Kg CO2 eq Gaz Emission <br>(Other organizations)</td><td><input type=number step="1" min=0  name=kg2 value=0 required></td><td>Variation Kg CO2 eq Gaz Emission <br>(Other organizations)</td><td><input type=number step="1" min=0 name=variation2 value=0></td></tr>
<tr><td><b>Use location</td><td><select name=use_location required><?php echo $use_location_list;?></select></td></tr>
<tr><td><b>%Production Gaz Emission</td><td><input type=number max="100"  min=0  step="0.1" name=production required></td><td><b>%Recycling Gaz Emission</td><td><input type=number max="100"  min=0  step="0.1" name=recycling required></td></tr>
<tr><td><b>%Transport Gaz Emission</td><td><input type=number max="100"  min=0  step="0.1" name=transport required></td><td><b>%Use Gaz Emission</td><td><input type=number max="100"  min=0  step="0.1" name=use required></td></tr>
<tr><td><b>Use Period (year)</td><td><input type=number  min=1 step="1" name=nb_year required></td><td><b>Date</td><td><input type=text name=date required id='datepicker'></td></tr>
<tr><td><b>Source Emission</td><td><input type=text name=source required></td><td>Information Equipement</td><td><input type=text name=information></td></tr>
<tr><td colspan=4 align=center><input type=submit></td></tr>
</table>
</td>
<td valign=top><?php echo $text_input;?></td>
</tr>
</table>
</form>

<?php
footer();
?>
