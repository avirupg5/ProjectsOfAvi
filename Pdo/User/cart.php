<?php 
include_once"../Includes/dbn.php";
session_start();

$id=$_SESSION['userid'];
$query="SELECT * from cart where u_id=:id";
$statement=$connection->prepare($query);
$statement->execute([':id'=>$id]);
$result=$statement->fetchAll(PDO::FETCH_OBJ);



if ($_SERVER['REQUEST_METHOD']=='POST') {
	$uid=$_SESSION['userid'];
	$pid=$_REQUEST['pro_id'];
	$ptitel=$_REQUEST['titel'];
	$price=$_REQUEST['price'];
	$quan=$_REQUEST['quantity'];
	$img=$_REQUEST['image'];
	$check=$connection->prepare("SELECT p_id FROM cart WHERE p_id=:prod and u_id=:user");
	
	$check->execute([':prod'=>$pid,':user'=>$uid]);
	$check->fetchAll(PDO::FETCH_OBJ);
	

	
	if ($check->rowCount()>0) {
		$query= "UPDATE cart SET quantity=:quan  WHERE u_id=:id and p_id=:prod ";
		$statement=$connection->prepare($query);
		$statement->execute([':quan'=>$quan, ':id'=>$id ,':prod'=>$pid]);
		header('location:cart.php');
	}
	else{
	$sql='INSERT INTO cart(u_id,p_id,prod_titel,price,quantity,prod_image) values(:userid,:prodid,:prodtitel,:price,:quant,:imag) ';

	
	$found=$connection->prepare($sql);
	if($found->execute([':userid'=>$id,':prodid'=>$pid,':prodtitel'=>$ptitel,':price'=>$price,':quant'=>$quan,':imag'=>$img])){
	header('location:cart.php');

}
else{
	echo "not addeed server error";
}
}		
}
?>
<html>
<head>
	<title></title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="../css/cart.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>



<div class="container">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($result as $row){
							if (strlen($row->cart_status=="0")) {
								# code...
							
							?>
						<tr>
							<td data-th="Product">
								<div class="row">
									<div class="col-sm-2 hidden-xs"><img src="<?php echo $row->prod_image ?>" alt="..." class="img-responsive"/></div>
									<div class="col-sm-10">
										<h4 class="nomargin"><?php echo $row->prod_titel ?></h4>
										<!-- <p><?php echo $found->prod_image ?></p> -->
									</div>
								</div>
							</td>
							<td data-th="Price"><?php echo $row->price ?></td>
							<td data-th="Quantity" type="number" value=1>
								<?php echo $row->quantity ?>
								
								</td>
							</td>
							<td data-th="Subtotal" class="text-center"><?php 
    							echo $row->quantity* $row->price; ?></td>
							<td class="action" class="text-center" >
								<!-- <button class="btn btn-info btn-sm"><?php $row->quantity?></button> -->
								<button class="btn btn-danger btn-sm"><a href="delete_cart.php?id=<?= $row->cart_id; ?>"><i class="fa fa-trash-o" ></i></a></button>
								<!-- <button class="btn btn-danger btn-sm"><a href="delete_cart.php?id=<?php echo $row->cart_id?>">Delete cart!</a></button> -->								
							</td>
						</tr>
						<?php
					}
					}
					?>
					</tbody>
					<tfoot>
						<tr class="visible-xs">
							<td class="text-center"><strong>Total</strong></td>
						</tr>
						<tr>
							<td><a href="../Includes/product.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong>Total<!-- <?php echo $total += $subtotal;?> --> </strong></td>
							<td><a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>
				</table>
</div>

</body>
</html>