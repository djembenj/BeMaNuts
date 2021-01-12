<?php

function verif_session()
{
	//print_r($_SESSION);
	if (isset($_SESSION['Login']) && isset($_SESSION['Password'])) {
	    $login = $_SESSION['Login'];
	    $mdp = $_SESSION['Password'];
			$timestamp = $_SESSION['Timestamp'];
			//print_R($_SESSION);
	}
	else {
		entete();
		menu();
	  ?>
		<table height=100% width=100% align=center valign=center>
				<tr valign=center width=600>
					<td valign=center width=600><img src='/images/menu/datalake.png' width=600></td>
				</tr>
				<tr valign=center width=600>
					<td valign=center width=600>Cette partie est réservée à la communauté Nuts <br>Souhaitez-vous participer au BeMa DataLake Digital Ecologist ?<br> ping @ be-ma.fr</td>
				</tr>
		</table>
		<?php
		footer();
		exit;
	}
}

// Permet la notification des actions sur le consultants et opportunités.
function notification($db,$type_notification,$description_notification,$id,$table,$id_user)
{
	//echo "Notificaiton funsiotn<br>";
	$date_notification =$date=date("Y-m-d G:i:s");
	$ip_notifications=getenv("REMOTE_ADDR");
	$create_id_user=$id_user;
	$query_historisation="INSERT into
	notifications (id_notifications_type,date_notification,description_notification,id_table,la_table,create_id_user,ip_notifications)
	values
	('$type_notification','$date_notification','$description_notification','$id','$table','$create_id_user','$ip_notifications')";
	//echo "<br><br>".$query_historisation."<br><br><br><b>";
	$reponse_historisation = $db->query($query_historisation) or die("Insertion impossible de la notification :$query_historisation");;

}

?>
