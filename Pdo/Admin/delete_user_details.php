<?php
session_start();
include_once "../Includes/dbn.php" ;
$id=$_REQUEST['id'];
$query= "delete from submdata where Id=:id";
$statement=$connection->prepare($query);
$statement->execute([':id' => $id ]);
header('location:user_detail.php');
?>
