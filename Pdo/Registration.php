<?php 
session_start();
include_once "./Includes/dbn.php";
if ($_SERVER['REQUEST_METHOD']=='POST'){
$fname=$_REQUEST['finame'];
$uname=$_REQUEST['laname'];
$usame=$_REQUEST['usname'];
$maild=$_REQUEST['Email'];
$dob=$_REQUEST['Dob'];
$gend=$_REQUEST['gender'];
$passd=$_REQUEST['Password']; 
$retyp=$_REQUEST['Rpassword'];
$format=$_REQUEST['myfile'];

$query=$connection->prepare("select Email from submdata where Email=?");
$query->bindValue(1,$maild);
$query->execute();
if ($query->rowCount()>0) {
    echo "Check mail it's registerd";
}
else
{
    $sql= 'INSERT INTO submdata(Firstname,Lastname,Username,Email,Birth,Gender,Passd,Rpassd,Resu)
    VALUES(:Firstname,:Lastname,:Username,:Email,:Birth,:Gender,:Passd,:Rpassd,:Resu)';
    $statement=$connection->prepare($sql);
    if ($statement->execute([':Firstname'=>$fname,':Lastname'=>$uname,':Username'=>$usame,':Email'=>$maild,':Birth'=>$dob,':Gender'=>$gend,':Passd'=>$passd,':Rpassd'=>$retyp,':Resu'=>$format])) {
        echo "Data inserted";
    }


    }
}
?>
<html>
<head>
	<title>Your credentials!</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap" rel="stylesheet">
</head>
<link rel="stylesheet" type="text/css" href="css/design.css">
<body class="pog">
    <!-- <?php
// include_once "Includes/nav.php"
?> -->
    <div align="center">
        <h3 id="nnp">Submit Details</h3>
 <section class="container">     
<form class="yup" name="RegForm" onsubmit="return formStore()" method="POST">
	<br>
    <label for="fname" id="zxc">First Name*</label><br>
    <input type="text" id="fname" name="finame" placeholder="First Name">
    <br>
    <br>
    <label for="lname" id="zxc">Last Name*</label><br>
    <input type="text" id="lname" name="laname" placeholder="Last Name">
    <br>
    <br>
    <label for="uname" id="zxc1">User name</label><br>
    <input type="text" id="uname" name="usname" placeholder="User Name">
    <br>
    <br>
    <label for="eml" id="zxc2">Email*</label><br>
    <input type="text" id="eml" name="Email" placeholder="Email">
    <br>
    <br>
    <label for="Dob" id="zxc3">Date of birth</label>
    <input type="date" id="clc" name="Dob">
    <br>
   
    <br>
    
    <input type="radio" name="gender" value="Male">
    <label id="zxc3">Male</label>
    <input type="radio" name="gender" value="Female">
    <label id="zxc3">Female</label>
    <input type="radio" name="gender" value="others">
    <label id="zxc3">Others</label>
<br>
<br>
     <label for="pwd" id="zxc1">Password*</label><br>
    <input type="Password" id="pwd" name="Password" placeholder="Password">

    <br>
    <br>

     <label for="rpwd" id="zxc5">Retype Password*</label><br>
    <input type="Password" id="rpwd" name="Rpassword" placeholder="Retype Password">
<br>
<br>
<label for="myfile" id="fol">Attach your resume!</label>
  <input type="file" id="myfile" name="myfile"><br><br>
<input type="checkbox" name="check"  value="Accept terms and the policies" >
    <label for="chkbx" id="zxc4"><u id="ij">Accept terms and the policies</u></label>
    <br>
  <br>
    <input type="submit" value="Register" ><br>
    <br>
</section>  
</form>
    <script src="Js/validation.js">
    
</script>

</body>
</html>