<?php
session_start();
include_once "../Includes/dbn.php" ;
$id=$_REQUEST['id'];
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $Titel=$_REQUEST['ttl'];
    $Des=$_REQUEST['des'];
    $Price=$_REQUEST['prc'];
    $img_name=$_FILES['img']['name'];
    $img_size=$_FILES['img']['size'];
    $tmp_loc=$_FILES['img']['tmp_name'];
    $directory='../prod_img/';
    $trgt_file=$directory.$img_name;
    move_uploaded_file($tmp_loc, $trgt_file);
    $query="UPDATE product SET Titel= :titl, Des=:decr ,Price=:prce,trgt_file=:fol where Id=:id";

     $statement=$connection->prepare($query);
    if ($statement->execute([':titl'=>$Titel,':decr'=>$Des,':prce'=>$Price,':fol'=>$trgt_file,':id'=>$id])) {
        header('location:../Includes/product.php');
    }
}
// else{echo "Error";}

 $id=$_REQUEST['id'];
 $updt= "SELECT * FROM product where Id=:id";
$statement=$connection->prepare($updt);
$statement->execute([':id' => $id ]);
$prdt = $statement->fetch(PDO::FETCH_OBJ);
    
 
 

// $id=$_REQUEST['id'];
//  $ftch_data= "select * from product where id='$id'";
//  $finds=mysqli_query($dbconnection,$ftch_data);
//  $tabl_ftch=mysqli_fetch_array($finds);
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/design2.css">
</head>
<body>
<form method="POST" enctype="multipart/form-data" class="frm_dsg">
    <div align="center">
    <label for="ttl">Titel</label>
    <input type="text"  name="ttl" placeholder="Titel" value="<?php echo $prdt->Titel?>"><br><br>
    <label for="des">Description</label>
    <input type="text" name="des" placeholder="Description" value="<?php echo $prdt->Des?>"><br><br>
    <label for="prc" >Price</label>
    <input type="text"  name="prc" placeholder="Price" value="<?php echo $prdt->Price?>"><br><br>
    <label for="img" >Product Image</label>
  <input type="file"  name="img" value="<?php echo $prdt->trgt_file ?>"><br><br>
  <input type="submit" name="sub" value="Update">
</form>
</body>
</html>