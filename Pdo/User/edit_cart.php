<?php
session_start();
include_once "../includes/dbn.php";
$ID=$_GET['id'];
$sql = 'SELECT * FROM cart WHERE cart_id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $ID ]);
$fetch = $statement->fetch(PDO::FETCH_OBJ);
if($_SERVER['REQUEST_METHOD']=='POST'){
$quan=$_REQUEST['quantity'];
$query= "UPDATE cart SET quantity=:quan WHERE cart_id=:id ";
$statement=$connection->prepare($query);
if ($statement->execute([':quan'=>$quan, ':id'=>$ID])) {
header("location: cart.php");
}

}

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/edit_cart.css">
</head>
<body>
<form method="POST" enctype="multipart/form-data" class="frm_dsig">
	<div align="center">
	<label>Product Titel</label>
	<input type="text" disabled="disabled" name="titel" value="<?php echo $fetch->prod_titel?>">
	<br>
	<label>Quantity</label>
    <input type="number" name="quantity" value="<?php echo $fetch->quantity?>">
    <br>
  <input type="submit" name="sub" value="Update">
  </div>
</form>
</body>
</html>