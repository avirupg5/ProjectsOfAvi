<?php
session_start();
include_once "../Includes/dbn.php" ;
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$Titel=$_REQUEST['ttl'];
	$Des=$_REQUEST['des'];
	$Price=$_REQUEST['prc'];
	$img_name=$_FILES['img']['name'];
	$img_size=$_FILES['img']['size'];
	$tmp_loc=$_FILES['img']['tmp_name'];
	$directory='../prod_img/';
	$trgt_file=$directory.$img_name;
	move_uploaded_file($tmp_loc,$trgt_file );
	$sql= 'INSERT INTO product(Titel,Des,Price,trgt_file)
    VALUES(:tol,:descr,:prce,:fol)';
    $statement=$connection->prepare($sql);
    if ($statement->execute([':tol'=>$Titel,':descr'=>$Des,':prce'=>$Price,':fol'=>$trgt_file])) {
    	echo "Product added succesfully";
	
	
}
}
?>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="../css/design2.css">
<body>
<form method="POST" enctype="multipart/form-data" class="frm_dsg">
	<div align="center">
	<label for="ttl">Titel</label>
    <input type="text"  name="ttl" placeholder="Titel"><br><br>
    <label for="des">Description</label>
    <input type="text" name="des" placeholder="Description"><br><br>
    <label for="prc" >Price</label>
    <input type="text"  name="prc" placeholder="Price"><br><br>
    <label for="img" >Product Image</label>
  <input type="file"  name="img"><br><br>
  <input type="submit" name="sub" value="Submit">
</form>
</div>
</body>
</html>