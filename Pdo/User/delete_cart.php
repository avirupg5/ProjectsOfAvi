<?php
session_start();
include_once "../Includes/dbn.php" ;
$id=$_GET['id'];
$query= "DELETE from cart where cart_id=:id";
$statement=$connection->prepare($query);
$statement->execute([':id' => $id ]);
header('location:cart.php');
?>