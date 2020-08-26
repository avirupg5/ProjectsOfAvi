<?php
session_start();
include_once "../Includes/dbn.php";
$id=$_REQUEST['id'];
if ($_SERVER['REQUEST_METHOD']=='POST') { 
$Firstname=$_REQUEST['finame'];
$Lastname=$_REQUEST['laname'];
$Username=$_REQUEST['usname'];
$Email=$_REQUEST['Email'];
$Birth=$_REQUEST['Dob'];
$Gender=$_REQUEST['gender'];
$Passd=$_REQUEST['Password'];
$Rpassd=$_REQUEST['Rpassword'];
$Resu=$_REQUEST['myfile'];
$query="UPDATE submdata SET Firstname= :Firstname, Lastname=:Lastname ,Username=:Username,Email=:Email,Passd=:Passd,Rpassd=:Rpassd,Resu=:Resu,Birth=:dob,Gender=:gend where Id=:id";

     $statement=$connection->prepare($query);
    if ($statement->execute([':Firstname'=>$Firstname,':Lastname'=>$Lastname,':Username'=>$Username,':Email'=>$Email,':Passd'=>$Passd,':Rpassd'=>$Rpassd,':Resu'=>$Resu,':dob'=>$Birth,':gend'=>$Gender,':id'=>$id])) {
        header("location:user_detail.php");
    }
}
 $id=$_REQUEST['id'];
 $updt= "SELECT * FROM submdata where Id=:id";
$statement=$connection->prepare($updt);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
 // $sty=mysqli_query($dbconnection,$updt);
 // $book=mysqli_fetch_array($sty);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="../css/design.css">
<body>
    <div align="center">
<form class="yup" name="RegForm" onsubmit="return formStore()" method="POST">
	<br>
    <label for="fname" id="zxc">First Name*</label><br>
    <input type="text" id="fname" name="finame" placeholder="First Name" value="<?php echo $person->Firstname?>">
    <br>
    <br>
    <label for="lname" id="zxc">Last Name*</label><br>
    <input type="text" id="lname" name="laname" placeholder="Last Name" value="<?php echo $person->Lastname?>">
    <br>
    <br>
    <label for="uname" id="zxc1">User name</label><br>
    <input type="text" id="uname" name="usname" placeholder="User Name" value="<?php echo $person->Username?>">
    <br>
    <br>
    <label for="eml" id="zxc2">Email*</label><br>
    <input type="text" id="eml" name="Email" placeholder="Email" value="<?php echo $person->Email ?>">
    <br>
    <br>
   <label for="Dob" id="zxc3">Date of birth</label>
    <input type="date" id="clc" name="Dob" value="<?php echo $person->Birth?>">
    <br>
   
    <br>
    
    <input type="radio" name="gender" value="Male" value="<?php echo $person->Gender?>">
    <label id="zxc3">Male</label>
    <input type="radio" name="gender" value="Female" value="<?php echo $person->Gender?>">
    <label id="zxc3">Female</label>
    <input type="radio" name="gender" value="others" value="<?php echo $person->Gender?>">
    <label id="zxc3">Others</label>
<br>
<br>
     <label for="pwd" id="zxc1">Password*</label><br>
    <input type="Password" id="pwd" name="Password" placeholder="Password" value="<?php echo $person->Passd?>">

    <br>
    <br>

     <label for="rpwd" id="zxc5">Retype Password*</label><br>
    <input type="Password" id="rpwd" name="Rpassword" placeholder="Retype Password" value="<?php echo $person->Rpassd ?>">
<br>
<br>
<label for="myfile" id="fol">Attach your resume!</label>
  <input type="file" id="file" name="myfile" value="<?php echo $person->Resu?>"><br><br>

  <br>
    <input type="submit" value="Update" ><br>
    <br>
</section>  
</form>
</div>
</body>
</html>