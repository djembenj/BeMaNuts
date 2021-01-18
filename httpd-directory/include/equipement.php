<?php
// donne la liste des portables = Laptop
function donne_liste_pc ($db,$id_equipement_recu)
{
  $txt='';
  $message='';
  $query="SELECT id_equipement,e.id_equipement_constructeur,nom_equipement,model_equipement,ref_equipement,nom_equipement_constructeur from equipement e ,equipement_constructeur c where id_type_equipement='1'  and e.id_equipement_constructeur=c.id_equipement_constructeur order by nom_equipement_constructeur,e.nom_equipement,e.model_equipement,e.ref_equipement,id_equipement_constructeur";

  $result = $db->query($query);
  $constructeur="";
  global $select_equipement_pc;
  // <optgroup label="Europe">
  if (!$result) {
    //$message  = 'Requête invalide : ' . mysql_error() . "\n";
    $message .= 'Requête complète : ' . $query;
      die($message);
    }
    else {
      $txt.= '<option>'.$select_equipement_pc.'</option>';
      while ($donnees_portable = $result->fetch())
      {
        if ( $constructeur != $donnees_portable['nom_equipement_constructeur']){
        $txt.="<optgroup label=".$donnees_portable['nom_equipement_constructeur'].">";
        }
        $constructeur=$donnees_portable['nom_equipement_constructeur'];
        $model_equipement=stripslashes($donnees_portable['model_equipement']);
        $id_equipement=$donnees_portable['id_equipement'];
        $nom_equipement=$donnees_portable['nom_equipement'];
        $ref_equipement=stripslashes($donnees_portable['ref_equipement']);
        $constructeur_equipement=$donnees_portable['constructeur_equipement'];
        if ( $id_equipement_recu == $id_equipement)
          $txt.= '<option value='.$id_equipement.' selected>'.$constructeur_equipement.' '.$nom_equipement.' '.$model_equipement.' '.$ref_equipement.'</option>';
        else
          $txt.= '<option value='.$id_equipement.'>'.$constructeur_equipement.' '.$nom_equipement.' '.$model_equipement.' '.$ref_equipement.'</option>';
      }
      return $txt;
    }
}

// donne la liste des ordinateurs de bureau
function donne_liste_desktop ($db,$id_equipement_recu)
{
  $txt='';
  $message='';
  $query="SELECT id_equipement,e.id_equipement_constructeur,nom_equipement,model_equipement,ref_equipement,nom_equipement_constructeur from equipement e ,equipement_constructeur c where id_type_equipement='2'  and e.id_equipement_constructeur=c.id_equipement_constructeur order by e.nom_equipement,e.model_equipement,e.ref_equipement,id_equipement_constructeur";

  $result = $db->query($query);
  $constructeur="";
  global $select_equipement_desktop;
  // <optgroup label="Europe">
  if (!$result) {
    //$message  = 'Requête invalide : ' . mysql_error() . "\n";
    $message .= 'Requête complète : ' . $query;
      die($message);
    }
    else {
      $txt.= '<option value=0>'.$select_equipement_desktop.'</option>';
      while ($donnees_portable = $result->fetch())
      {
        if ( $constructeur != $donnees_portable['nom_equipement_constructeur']){
        $txt.="<optgroup label=".$donnees_portable['nom_equipement_constructeur'].">";
        }
        $constructeur=$donnees_portable['nom_equipement_constructeur'];
        $model_equipement=$donnees_portable['model_equipement'];
        $id_equipement=$donnees_portable['id_equipement'];
        $nom_equipement=$donnees_portable['nom_equipement'];
        $ref_equipement=$donnees_portable['ref_equipement'];
        $constructeur_equipement=$donnees_portable['constructeur_equipement'];
        if ( $id_equipement_recu == $id_equipement)
          $txt.= '<option value='.$id_equipement.' selected>'.$constructeur_equipement.' '.$nom_equipement.' '.$model_equipement.' '.$ref_equipement.'</option>';
        else
          $txt.= '<option value='.$id_equipement.'>'.$constructeur_equipement.' '.$nom_equipement.' '.$model_equipement.' '.$ref_equipement.'</option>';
      }
      return $txt;
    }
}

// donne la liste des ordinateurs serveurs
function donne_liste_server ($db,$id_equipement_recu)
{
  $txt='';
  $message='';
  $query="SELECT id_equipement,e.id_equipement_constructeur,nom_equipement,model_equipement,ref_equipement,nom_equipement_constructeur from equipement e ,equipement_constructeur c where id_type_equipement='4'  and e.id_equipement_constructeur=c.id_equipement_constructeur order by id_equipement_constructeur";

  $result = $db->query($query);
  $constructeur="";
  global $select_equipement;
  // <optgroup label="Europe">
  if (!$result) {
    //$message  = 'Requête invalide : ' . mysql_error() . "\n";
    $message .= 'Requête complète : ' . $query;
      die($message);
    }
    else {
      $txt.= '<option value=0>'.$select_equipement.'</option>';
      while ($donnees_portable = $result->fetch())
      {
        if ( $constructeur != $donnees_portable['nom_equipement_constructeur']){
        $txt.="<optgroup label=".$donnees_portable['nom_equipement_constructeur'].">";
        }
        $constructeur=$donnees_portable['nom_equipement_constructeur'];
        $model_equipement=$donnees_portable['model_equipement'];
        $id_equipement=$donnees_portable['id_equipement'];
        $nom_equipement=$donnees_portable['nom_equipement'];
        $ref_equipement=$donnees_portable['ref_equipement'];
        $constructeur_equipement=$donnees_portable['constructeur_equipement'];
        if ( $id_equipement_recu == $id_equipement)
          $txt.= '<option value='.$id_equipement.' selected>'.$constructeur_equipement.' '.$nom_equipement.' '.$model_equipement.' '.$ref_equipement.'</option>';
        else
          $txt.= '<option value='.$id_equipement.'>'.$constructeur_equipement.' '.$nom_equipement.' '.$model_equipement.' '.$ref_equipement.'</option>';
      }
      return $txt;
    }
}

function donne_liste_smartphone ($db,$id_equipement_recu)
{
  $txt='';
  $message='';
  $query="SELECT id_equipement,e.id_equipement_constructeur,nom_equipement,model_equipement,ref_equipement,nom_equipement_constructeur from equipement e ,equipement_constructeur c where id_type_equipement='6' and e.id_equipement_constructeur=c.id_equipement_constructeur order by e.nom_equipement,e.model_equipement,e.ref_equipement,id_equipement_constructeur";
  $result = $db->query($query);
  $constructeur="";
  global $select_equipement_smartphone;
  if (!$result) {
    //$message  = 'Requête invalide : ' . mysql_error() . "\n";
    $message .= 'Requête complète : ' . $query;
      die($message);
    }
    else {
      $txt.= '<option value=0>'.$select_equipement_smartphone.'</option>';
      while ($donnees_portable = $result->fetch())
      {
        if ( $constructeur != $donnees_portable['nom_equipement_constructeur']){
        $txt.="<optgroup label=".$donnees_portable['nom_equipement_constructeur'].">";
        }
        $model_equipement=$donnees_portable['model_equipement'];
        $constructeur=$donnees_portable['nom_equipement_constructeur'];
        $id_equipement=$donnees_portable['id_equipement'];
        $nom_equipement=$donnees_portable['nom_equipement'];
        $ref_equipement=$donnees_portable['ref_equipement'];
        $constructeur_equipement=$donnees_portable['constructeur_equipement'];
        if ( $id_equipement_recu == $id_equipement)
          $txt.= '<option value='.$id_equipement.' selected>'.$constructeur_equipement.' '.$nom_equipement.' '.$model_equipement.' '.$ref_equipement.'</option>';
        else
          $txt.= '<option value='.$id_equipement.'>'.$constructeur_equipement.' '.$nom_equipement.' '.$model_equipement.' '.$ref_equipement.'</option>';
      }
      return $txt;
    }
}
function donne_liste_printer ($db,$id_equipement_recu)
{
  $txt='';
  $message='';
  $query="SELECT id_equipement,e.id_equipement_constructeur,nom_equipement,nom_equipement_constructeur,model_equipement from equipement e ,equipement_constructeur c where id_type_equipement='8' and e.id_equipement_constructeur=c.id_equipement_constructeur order by id_equipement_constructeur";
  $result = $db->query($query);
  $constructeur="";
  global $select_equipement;
  if (!$result) {
    //$message  = 'Requête invalide : ' . mysql_error() . "\n";
    $message .= 'Requête complète : ' . $query;
      die($message);
    }
    else {
      $txt.= '<option value=0>'.$select_equipement.'</option>';
      while ($donnees_portable = $result->fetch())
      {
        if ( $constructeur != $donnees_portable['nom_equipement_constructeur']){
        $txt.="<optgroup label=".$donnees_portable['nom_equipement_constructeur'].">";
        }
        $constructeur=$donnees_portable['nom_equipement_constructeur'];
        $model_equipement=$donnees_portable['model_equipement'];
        $id_equipement=$donnees_portable['id_equipement'];
        $nom_equipement=$donnees_portable['nom_equipement'];
        $constructeur_equipement=$donnees_portable['constructeur_equipement'];
        if ( $id_equipement_recu == $id_equipement)
          $txt.= '<option value='.$id_equipement.' selected>'.$constructeur_equipement.' '.$nom_equipement.' '.$model_equipement.'</option>';
        else
          $txt.= '<option value='.$id_equipement.'>'.$constructeur_equipement.' '.$nom_equipement.' '.$model_equipement.'</option>';
      }
      return $txt;
    }
}
function donne_liste_enceinte ($db,$id_equipement_recu)
{
  $txt='';
  $message='';
  global $select_equipement_enceinte;
  $query="SELECT id_equipement,e.id_equipement_constructeur,nom_equipement,model_equipement,nom_equipement_constructeur from equipement e ,equipement_constructeur c where id_type_equipement='5' and e.id_equipement_constructeur=c.id_equipement_constructeur order by e.id_equipement_constructeur";
  $result = $db->query($query);
  $constructeur="";
  if (!$result) {
    //$message  = 'Requête invalide : ' . mysql_error() . "\n";
    $message .= 'Requête complète : ' . $query;
      die($message);
    }
    else {
      $txt.= '<option value=0>'.$select_equipement_enceinte.'</option>';
      while ($donnees_portable = $result->fetch())
      {
        if ( $constructeur != $donnees_portable['nom_equipement_constructeur']){
        $txt.="<optgroup label=".$donnees_portable['nom_equipement_constructeur'].">";
        }
        $constructeur=$donnees_portable['nom_equipement_constructeur'];
        $model_equipement=$donnees_portable['model_equipement'];
        $id_equipement=$donnees_portable['id_equipement'];
        $nom_equipement=$donnees_portable['nom_equipement'];

        $constructeur_equipement=$donnees_portable['constructeur_equipement'];
        if ( $id_equipement_recu == $id_equipement)
          $txt.= '<option value='.$id_equipement.' selected>'.$constructeur_equipement.' '.$nom_equipement.' '.$model_equipement.'</option>';
        else
          $txt.= '<option value='.$id_equipement.'>'.$constructeur_equipement.' '.$nom_equipement.' '.$model_equipement.'</option>';
      }
      return $txt;
    }
}

function donne_liste_network ($db,$id_equipement_recu)
{
  $txt='';
  $message='';
  global $select_equipement;
  $query="SELECT id_equipement,e.id_equipement_constructeur,nom_equipement,model_equipement,nom_equipement_constructeur from equipement e ,equipement_constructeur c where id_type_equipement='12' and e.id_equipement_constructeur=c.id_equipement_constructeur order by e.id_equipement_constructeur";
  $result = $db->query($query);
  $constructeur="";
  if (!$result) {
    //$message  = 'Requête invalide : ' . mysql_error() . "\n";
    $message .= 'Requête complète : ' . $query;
      die($message);
    }
    else {
      $txt.= '<option value=0>'.$select_equipement.'</option>';
      while ($donnees_portable = $result->fetch())
      {
        if ( $constructeur != $donnees_portable['nom_equipement_constructeur']){
        $txt.="<optgroup label=".$donnees_portable['nom_equipement_constructeur'].">";
        }
        $constructeur=$donnees_portable['nom_equipement_constructeur'];
        $model_equipement=$donnees_portable['model_equipement'];
        $id_equipement=$donnees_portable['id_equipement'];
        $nom_equipement=$donnees_portable['nom_equipement'];

        $constructeur_equipement=$donnees_portable['constructeur_equipement'];
        if ( $id_equipement_recu == $id_equipement)
          $txt.= '<option value='.$id_equipement.' selected>'.$constructeur_equipement.' '.$nom_equipement.' '.$model_equipement.'</option>';
        else
          $txt.= '<option value='.$id_equipement.'>'.$constructeur_equipement.' '.$nom_equipement.' '.$model_equipement.'</option>';
      }
      return $txt;
    }
}

function donne_liste_monitor ($db,$id_equipement_recu)
{
  $txt='';
  $message='';
  global $select_equipement_monitor;
  $query="SELECT id_equipement,e.id_equipement_constructeur,nom_equipement,model_equipement,nom_equipement_constructeur from equipement e ,equipement_constructeur c where id_type_equipement='7' and e.id_equipement_constructeur=c.id_equipement_constructeur order by e.id_equipement_constructeur";
  $result = $db->query($query);
  $constructeur="";
  if (!$result) {
    //$message  = 'Requête invalide : ' . mysql_error() . "\n";
    $message .= 'Requête complète : ' . $query;
      die($message);
    }
    else {
      $txt.= '<option value=0>'.$select_equipement_monitor.'</option>';
      while ($donnees_portable = $result->fetch())
      {
        if ( $constructeur != $donnees_portable['nom_equipement_constructeur']){
        $txt.="<optgroup label=".$donnees_portable['nom_equipement_constructeur'].">";
        }
        $constructeur=$donnees_portable['nom_equipement_constructeur'];
        $model_equipement=$donnees_portable['model_equipement'];
        $id_equipement=$donnees_portable['id_equipement'];
        $nom_equipement=$donnees_portable['nom_equipement'];

        $constructeur_equipement=$donnees_portable['constructeur_equipement'];
        if ( $id_equipement_recu == $id_equipement)
          $txt.= '<option value='.$id_equipement.' selected>'.$constructeur_equipement.' '.$nom_equipement.' '.$model_equipement.'</option>';
        else
          $txt.= '<option value='.$id_equipement.'>'.$constructeur_equipement.' '.$nom_equipement.' '.$model_equipement.'</option>';
      }
      return $txt;
    }
}

function donne_liste_tablette ($db,$id_equipement_recu)
{
  $txt='';
  $message='';
  global $select_equipement_tablette;
  $query="SELECT id_equipement,e.id_equipement_constructeur,nom_equipement,model_equipement,nom_equipement_constructeur,ref_equipement from equipement e ,equipement_constructeur c where id_type_equipement='9' and e.id_equipement_constructeur=c.id_equipement_constructeur ";
  $result = $db->query($query);
  $constructeur="";
  if (!$result) {
    //$message  = 'Requête invalide : ' . mysql_error() . "\n";
    $message .= 'Requête complète : ' . $query;
      die($message);
    }
    else {
      $txt.= '<option value=0>'.$select_equipement_tablette.'</option>';
      while ($donnees_portable = $result->fetch())
      {
        if ( $constructeur != $donnees_portable['nom_equipement_constructeur']){
        $txt.="<optgroup label=".$donnees_portable['nom_equipement_constructeur'].">";
        }
        $constructeur=$donnees_portable['nom_equipement_constructeur'];
        $model_equipement=$donnees_portable['model_equipement'];
        $id_equipement=$donnees_portable['id_equipement'];
        $nom_equipement=$donnees_portable['nom_equipement'];
        $ref_equipement=$donnees_portable['ref_equipement'];

        $constructeur_equipement=$donnees_portable['constructeur_equipement'];
        if ( $id_equipement_recu == $id_equipement)
          $txt.= '<option value='.$id_equipement.' selected>'.$constructeur_equipement.' '.$nom_equipement.' '.$model_equipement.' '.$ref_equipement.'</option>';
        else
          $txt.= '<option value='.$id_equipement.'>'.$constructeur_equipement.' '.$nom_equipement.' '.$model_equipement.' '.$ref_equipement.'</option>';
      }
      return $txt;
    }
}
// donne la liste des equipements
function donne_liste_type_equipement ($db,$id_type_equipement_recu)
{
  $txt='';
  $query="SELECT id_type_equipement,nom_type_equipement from type_equipement order by nom_type_equipement";

  $result = $db->query($query);
  if (!$result) {
    //$message  = 'Requête invalide : ' . mysql_error() . "\n";
    $message .= 'Requête complète : ' . $query;
      die($message);
    }
    else {
      $txt.= '<option>Selectionner un type d\'équipement</option>';
      while ($donnees_portable = $result->fetch())
      {
        $id_type_equipement=$donnees_portable['id_type_equipement'];
        $nom_type_equipement=$donnees_portable['nom_type_equipement'];

        if ( $id_type_equipement_recu == $id_type_equipement)
          $txt.= '<option value='.$id_type_equipement.' selected>'.$nom_type_equipement.'</option>';
        else
          $txt.= '<option value='.$id_type_equipement.'>'.$nom_type_equipement.'</option>';
      }
      return $txt;
    }
}

// donne la liste des constructeur //
function donne_liste_constructeur ($db,$id_equipement_constructeur_recu)
{
  $txt='';
  $query="SELECT id_equipement_constructeur,nom_equipement_constructeur from equipement_constructeur order by nom_equipement_constructeur";

  $result = $db->query($query);
  if (!$result) {
    //$message  = 'Requête invalide : ' . mysql_error() . "\n";
    $message .= 'Requête complète : ' . $query;
      die($message);
    }
    else {
      $txt.= '<option>Selectionner un constructeur</option>';
      while ($donnees_portable = $result->fetch())
      {
        $id_equipement_constructeur=$donnees_portable['id_equipement_constructeur'];
        $nom_equipement_constructeur=$donnees_portable['nom_equipement_constructeur'];

        if ( $id_equipement_constructeur_recu == $id_equipement_constructeur)
          $txt.= '<option value='.$id_equipement_constructeur.' selected>'.$nom_equipement_constructeur.'</option>';
        else
          $txt.= '<option value='.$id_equipement_constructeur.'>'.$nom_equipement_constructeur.'</option>';
      }
      return $txt;
    }
}

// donne la liste des constructeur //
function donne_liste_use_location ($db,$id_location_recu)
{
  $txt='';
  $query="SELECT id_use_location,nom_use_location from use_location order by id_use_location";

  $result = $db->query($query);
  if (!$result) {
    //$message  = 'Requête invalide : ' . mysql_error() . "\n";
    $message .= 'Requête complète : ' . $query;
      die($message);
    }
    else {
      $txt.= '<option value=0>Selectionner une location</option>';
      while ($donnees = $result->fetch())
      {
        $id_use_location=$donnees['id_use_location'];
        $nom_use_lcoation=$donnees['nom_use_location'];

        if ( $id_equipement_constructeur_recu == $id_use_location)
          $txt.= '<option value='.$id_use_location.' selected>'.$nom_use_lcoation.'</option>';
        else
          $txt.= '<option value='.$id_use_location.'>'.$nom_use_lcoation.'</option>';
      }
      return $txt;
    }
}


function donne_information_emission_equipement ($db,$id_equipement,$nb_annee) {
$query ="SELECT
g.id_gaz_emission_equipement,
g.recycling_gaz_emission_equipement,
g.transport_gaz_emission_equipement,
g.custumer_user_gaz_emission_equipement,
g.production_gaz_emission_equipement,
g.kg_co2_eq_gaz_emission_equipement,
g.use_period_equipement,
g.date_emission_equipement,
g.id_equipement,
e.ref2_equipement,
e.information_equipement,
g.source_gaz_emission_equipement from gaz_emission_equipement g, equipement e  where g.id_equipement='$id_equipement' and e.id_equipement=g.id_equipement";

$result = $db->query($query);
if (!$result) {
  //$message  = 'Requête invalide : ' . mysql_error() . "\n";
  $message .= 'Requête complète : ' . $query;
  die($message);
  }
  else {
    while ($donnees_emission_equipement = $result->fetch())
    {
        $kg=$donnees_emission_equipement['kg_co2_eq_gaz_emission_equipement'];
        $use=$donnees_emission_equipement['use_period_equipement'];
      if ( $nb_annee ){
        $emission_equipement['emission_annuel']=round(($kg/$nb_annee),2);
      }

      else {
        $emission_equipement['emission_annuel']=round(($kg/$use),2);
      }
      $emission_equipement['recycling']=$donnees_emission_equipement['recycling_gaz_emission_equipement'];
      $emission_equipement['transport']=$donnees_emission_equipement['transport_gaz_emission_equipement'];
      $emission_equipement['custumer']=$donnees_emission_equipement['custumer_user_gaz_emission_equipement'];
      $emission_equipement['production']=$donnees_emission_equipement['production_gaz_emission_equipement'];
      $emission_equipement['total']=$kg;
      $emission_equipement['use_period']=$use;
      $emission_equipement['date_emission']=$donnees_emission_equipement['date_emission_equipement'];
      $emission_equipement['source']=$donnees_emission_equipement['source_gaz_emission_equipement'];
      $emission_equipement['ref2']=$donnees_emission_equipement['ref2_equipement'];
      $emission_equipement['info']=$donnees_emission_equipement['information_equipement'];

    }
    return $emission_equipement;
  }
}

function insert_equipepement($db,$id_constructeur,$nom,$ref,$ref2,$id_type,$id_user,$information,$model) {
  $query ="
  INSERT into equipement
  (id_equipement_constructeur,nom_equipement,ref_equipement,ref2_equipement,id_type_equipement,information_equipement,model_equipement)
  VALUES
  ('$id_constructeur','$nom','$ref','$ref2','$id_type','$information','$model')";
  //echo $query;
  $reponse = $db->query($query) or die("Insertion impossible de la notification :$query");;
  $last_id=$db->lastInsertId();

  switch ($id_type) {
    case 1 : $type_notification=3 ; $texte="ADD LAPTOP ".$nom; break;
    case 2 : $type_notification=4 ; $texte="ADD DESKTOP ".$nom; break;
    case 3 : $type_notification=5 ; $texte="ADD BOX ".$nom; break;
    case 4 : $type_notification=6 ; $texte="ADD SERVER ".$nom; break;
    case 5 : $type_notification=7 ; $texte="ADD AUDIO ".$nom; break;
    case 6 : $type_notification=1 ; $texte="ADD SMARTPHONE ".$nom; break;
    case 7 : $type_notification=8 ; $texte="ADD DISPLAY ".$nom; break;
    case 8 : $type_notification=9 ; $texte="ADD PRINTER ".$nom; break;
    case 9 : $type_notification=10 ; $texte="ADD TABLETTE ".$nom; break;
    case 10 : $type_notification=11 ; $texte="ADD SMARTDEVICE ".$nom; break;
    case 11 : $type_notification=31 ; $texte="ADD BAIE STOCKAGE ".$nom; break;
    case 12 : $type_notification=34 ; $texte="ADD NETWORK  ".$nom; break;

  }
  notification($db,$type_notification,$texte,$last_id,"equipement",$id_user);
  return $last_id;
}

function insert_emission_equipement($db,$recycling,$transport,$custumer,$production,$kg,$period,$date,$id_equipement,$source,$id_user,$variation,$use_location,$kg2,$variation2,$id_type) {
$query = "
INSERT INTO gaz_emission_equipement (recycling_gaz_emission_equipement,transport_gaz_emission_equipement,custumer_user_gaz_emission_equipement,production_gaz_emission_equipement,kg_co2_eq_gaz_emission_equipement,use_period_equipement,date_emission_equipement,id_equipement,source_gaz_emission_equipement,variation_kg_co2_gaz_emission_equipement,id_use_location,kg2_co2_eq_gaz_emission_equipement,variation2_kg_co2_gaz_emission_equipement)
VALUES
('$recycling','$transport','$custumer','$production','$kg','$period','$date','$id_equipement','$source','$variation','$use_location','$kg2','$variation2');
";
//echo $query."<br>";
$reponse_ = $db->query($query) or die("Insertion impossible de la notification :$query");;
$last_id=$db->lastInsertId();
switch ($id_type) {
  case 1 : $type_notification=12 ; $texte="ADD LAPTOP EMISSION ".$nom; break;
  case 2 : $type_notification=13 ; $texte="ADD DESKTOP EMISSION ".$nom; break;
  case 3 : $type_notification=14 ; $texte="ADD BOX EMISSION ".$nom; break;
  case 4 : $type_notification=15 ; $texte="ADD SERVER EMISSION ".$nom; break;
  case 5 : $type_notification=16 ; $texte="ADD AUDIO EMISSION ".$nom; break;
  case 6 : $type_notification=2 ; $texte="ADD SMARTPHONE EMISSION ".$nom; break;
  case 7 : $type_notification=17 ; $texte="ADD DISPLAY EMISSION ".$nom; break;
  case 8 : $type_notification=18 ; $texte="ADD PRINTER EMISSION ".$nom; break;
  case 9 : $type_notification=19 ; $texte="ADD TABLETTE EMISSION ".$nom; break;
  case 10 : $type_notification=20 ; $texte="ADD SMARTDEVICE EMISSION ".$nom; break;
  case 11 : $type_notification=32 ; $texte="ADD BAIE STOCKAGE EMISSION".$nom; break;
  case 12 : $type_notification=35 ; $texte="ADD NETWORK EMISSION ".$nom; break;

}
notification($db,$type_notification,$texte,$last_id,"gaz_emission_equipement",$id_user);
return $last_id;
}

function insert_information_equipement($db,$id_user,$id_equipement,$nom,$screen,$weight,$tec,$assembly,$cpu,$dram,$psu,$share,$date,$id_type,$capacity_stockage){

if ( !$screen )
  $screen=0;
if ( !$capacity_stockage)
  $capacity_stockage=0;
if ( !$weight )
  $weight=0;

$query = "
INSERT INTO equipement_informations (screen_size_equipement_informations,weight_equipement_informations,tec_equipement_informations,assembly_location,date_equipement_informations,id_equipement,capacity_stockage_equipement_informations)
VALUES
('$screen','$weight','$tec','$assembly','$date','$id_equipement','$capacity_stockage');
";
//echo $query."<br>";
$reponse_ = $db->query($query) or die("Insertion impossible de la notification :$query");;
$last_id=$db->lastInsertId();
switch ($id_type) {
  case 1 : $type_notification=21 ; $texte="ADD LAPTOP INFORMATION ".$nom; break;
  case 2 : $type_notification=22 ; $texte="ADD DESKTOP INFORMATION ".$nom; break;
  case 3 : $type_notification=23 ; $texte="ADD BOX INFORMATION ".$nom; break;
  case 4 : $type_notification=24 ; $texte="ADD SERVER INFORMATION ".$nom; break;
  case 5 : $type_notification=25 ; $texte="ADD AUDIO INFORMATION ".$nom; break;
  case 6 : $type_notification=26 ; $texte="ADD SMARTPHONE INFORMATION ".$nom; break;
  case 7 : $type_notification=27 ; $texte="ADD DISPLAY INFORMATION ".$nom; break;
  case 8 : $type_notification=28 ; $texte="ADD PRINTER INFORMATION ".$nom; break;
  case 9 : $type_notification=29 ; $texte="ADD TABLETTE INFORMATION ".$nom; break;
  case 10 : $type_notification=30 ; $texte="ADD SMARTDEVICE INFORMATION ".$nom; break;
  case 11 : $type_notification=33 ; $texte="ADD BAIE STOCKAGE INFORMATION ".$nom; break;
  case 12 : $type_notification=36 ; $texte="ADD NETWORK INFORMATION ".$nom; break;
}
notification($db,$type_notification,$texte,$last_id,"equipement_informations",$id_user);
return $last_id;
}

function donne_duree_utilisation($duree,$duree_recu) {
  $i=0;
  $txt="";
  if ( ! $duree_recu)
  $duree_recu=$duree;
  while (  $i < 10 )
  {
    if ( $i == $duree_recu )
    $txt="selected";
    else {
      $txt="";
    }
    if ( $i == $duree )
      echo "<option value='$i' $txt>$i - Défault</option>";
    else {
      echo "<option value='$i' $txt>$i</option>";
    }
    $i++;
  }
}

function donne_moyenne_emission_device($db,$type_equipement,$annee){
  $query="SELECT AVG(g.kg_co2_eq_gaz_emission_equipement) as kg_co2,avg(custumer_user_gaz_emission_equipement) as user from equipement e ,equipement_informations i, gaz_emission_equipement g  where  e.id_type_equipement='$type_equipement' and e.id_equipement=i.id_equipement and e.id_equipement=g.id_equipement  ";
  $result = $db->query($query);
  while ($donnees = $result->fetch())
  {
        $data[0]=$kg_co2=$donnees['kg_co2'];
        $data[1]=$user=$donnees['user'];
  }
  return $data;
}
?>
