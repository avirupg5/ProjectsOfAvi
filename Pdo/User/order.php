<?php
include_once"../Includes/dbn.php";
session_start();
$id=$_SESSION['userid'];
$query="SELECT * from cart where u_id=:id";
$statement=$connection->prepare($query);
$statement->execute([':id'=>$id]);
$result=$statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/order.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
</head>
<body>
<?php
foreach ($result as $res) {
   

?>

<div class="container-fluid my-5 d-sm-flex justify-content-center">
    <div class="card px-2">
        <div class="card-header bg-white">
            <div class="row justify-content-between">
                <div class="col">
                    <p class="text-muted"> Order ID <span class="font-weight-bold text-dark"><?php echo $res->cart_id?></span></p>
                    <p class="text-muted"> Place On <span class="font-weight-bold text-dark"><?php echo $res->order_place_at?></span> </p>
                </div>
                <div class="flex-col my-auto">
                    <h6 class="ml-auto mr-3"> <a href="#">View Details</a> </h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="media flex-column flex-sm-row">
                <div class="media-body ">
                    <h5 class="bold"><?php echo $res->prod_titel?></h5>
                    <p class="text-muted"><?php echo $res->quantity?></p>
                    <h4 class="mt-3 mb-4 bold"> <span class="mt-5">&#x20B9;</span><span class="small text-muted"> <?php echo $res->payment?></span></h4>
                    <p class="text-muted">Tracking Status on: <span class="Today">11th july</span></p> <button type="button" class="btn btn-outline-primary d-flex">Reached Hub, Kolkata</button>
                </div><img class="align-self-center img-fluid" src="<?php echo $res->prod_image?>" width="180 " height="180">
            </div>
        </div>
        <div class="row px-3">
            <div class="col">
                <ul id="progressbar">
                    <li class="step0 active " id="step1">PLACED</li>
                    <li class="step0 active text-center" id="step2">SHIPPED</li>
                    <li class="step0 text-muted text-right" id="step3">DELIVERED</li>
                </ul>
            </div>
        </div>
        <div class="card-footer bg-white px-sm-3 pt-sm-4 px-0">
            <div class="row text-center ">
                <div class="col my-auto border-line ">
                    <h5>Track</h5>
                </div>
                <div class="col my-auto border-line ">
                    <h5>Cancel</h5>
                </div>
                <div class="col my-auto border-line ">
                    <h5>Pre-pay</h5>
                </div>
                <div class="col my-auto mx-0 px-0 "><img class="img-fluid cursor-pointer" src="https://img.icons8.com/ios/50/000000/menu-2.png" width="30" height="30"></div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
</body>
</html>