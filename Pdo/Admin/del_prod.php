<?php
session_start();
include_once "../Includes/dbn.php" ;
$id=$_REQUEST['id'];
$query= "delete from product where id=:id";
$statement=$connection->prepare($query);
$statement->execute([':id' => $id ]);
header('location:../Includes/product.php');
?>