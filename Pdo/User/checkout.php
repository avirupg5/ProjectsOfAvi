<?php
session_start();
include_once "../Includes/dbn.php";
	$uid=$_SESSION['userid'];
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$uid=$_SESSION['userid'];
	$yname=$_REQUEST['fulname'];
	$shpa=$_REQUEST['shpadd'];
	$pncd=$_REQUEST['pncde'];
	$nerby=$_REQUEST['nrby'];
	$phn=$_REQUEST['phnum'];
	$pytye=$_REQUEST['cod'];
	$cart_stat="1";
	$sql='UPDATE cart SET cart_status=:cart,full_name=:fulname,address=:adrs,
	pincode=:pncde,nearby=:nrby,mobile=:mble,payment=:pymnt WHERE u_id=:uid ';
	var_dump($sql);
	$statement=$connection->prepare($sql);
	if ($statement->execute([':cart'=>$cart_stat,':fulname'=>$yname,':adrs'=>$shpa,':pncde'=>$pncd,':nrby'=>$nerby,':mble'=>$phn,':pymnt'=>$pytye,':uid'=>$uid])) {
		header('Location:order.php');
	}
	else{
		echo "server error";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST">
	<label>Your name</label>
	<input type="text" name="fulname" placeholder="Fullname"><br>
	<label>Shipping address</label>
	<input type="text" name="shpadd" placeholder="Deliver address"><br>
	<label>Pincode</label>
	<input type="text" name="pncde" placeholder="Pincode"><br>
	<label>Nearby</label>
	<input type="text" name="nrby" placeholder="Nearby Location"><br>
	<label>Phone number</label>
	<input type="text" name="phnum" placeholder="Mobile number"><br>
	<label>Payment type</label>
	<input type="radio" name="cod" value="COD"><br>
	<input type="submit" name="submit" value="Proceed">
</form>
</body>
</html>