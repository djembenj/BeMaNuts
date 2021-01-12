<?php

function connexion_db ()
{
	$HOST_DB="<HOSTNAME_DB_SERVER>"; // CHANGE
	$LOGIN_DB="<LOGIN_DB_SERVER"; // CHANGE
	$PASSWORD_DB="<PASSWORD_DB_SERVER>"; // CHANGE
try
{
	$bdd = new PDO('mysql:host='$HOST_DB';dbname=digitaleco;charset=utf8', '$LOGIN_DB', '$PASSWORD_DB');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if (!$bdd) {
    echo('Connexion impossible : ' . mysql_error());
}
else return $bdd;
}


function deconnexion_db($db)
{
	$db =  null;
}

$version ="1.1";

?>
