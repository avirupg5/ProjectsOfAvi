<?php
include_once "./includes/dbn.php";
if(isset($_COOKIE['email'])){
	session_start();
	$_SESSION['email']=$_COOKIE['email'];
	// header("location:./includes/product.php");
}
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $remember=$_POST['remember'];

    $sql="SELECT * FROM submdata WHERE Email=:Email AND Passd=:Password";
$statement=$connection->prepare($sql);
$statement->bindValue(':Email',$email);
$statement->bindValue(':Password',$password);
$statement->execute();
$result=$statement->fetchAll(PDO::FETCH_OBJ);
$i=0;
if ($statement->rowCount()>0) {
    

    
    	if (isset($remember)) {
    		setcookie("email",$email , time()+(60*60*24)*2);
    		setcookie("password",$password , time()+(60*60*24)*2);
    	}
    	session_start();
    	$_SESSION['email']=$email;
    	$_SESSION['user']=$result[$i]->usertype;
    	$_SESSION['userid']=$result[$i]->Id;
        // if ($_SERVER['usertype']=='Admin') {
        //     if ($_SESSION['user']==$_SERVER['usertype']) {
        //         # code...
        //     }
        // }
    	header("location:./Includes/product.php");
    
}
    else{
    	echo "invalid email or password";
    }
}
?>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="css/design1.css">
	
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body class="mbb">
	
  

    <section class="container">
    <div align="center">
        <form method="POST" class="ozx" >
        <h3 class="bdk" >Get started</h3>   
    <label id="pnm">Email</label>
	<input type="text" name="email" placeholder="EMAIL" value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>">
	<br>
    <label id="pnm">Password</label>
	<input type="Password" name="password" placeholder="PASSWORD" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];}?>">
	<br>
	<input type="checkbox" name="remember"  <?php if(isset($_COOKIE["email"])) { ?> checked
                <?php } ?> /> 
	<label id="pnm"><b>REMEMBER ME !</b></label>
	<br>
	<input type="submit" name="submit">

</form>
</div>
</section>



</body>
</html>