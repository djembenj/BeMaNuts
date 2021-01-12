<?php
$_SESSION = array();
session_start();
session_destroy();
session_commit();
HEADER('Location:./');
?>
