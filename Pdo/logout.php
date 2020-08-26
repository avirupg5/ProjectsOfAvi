<?php
session_start();
$_SESSION['email']="";
if ($_SESSION['email']=="") {
	header("location:indx.php");
}
session_destroy();
?>
