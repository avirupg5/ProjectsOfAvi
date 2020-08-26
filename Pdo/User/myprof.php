<?php
session_start();
  include_once "../Includes/dbn.php";
  $msg="";
  if (strlen($_SESSION['userid']==0)) {
  header('location:login.php');
  } 
  
  else{
  
  $id=$_SESSION['userid'];

$sql = 'SELECT * FROM submdata WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);

if ($_SERVER['REQUEST_METHOD']=='POST') {
 $Firstname=$_REQUEST['finame'];
$Lastname=$_REQUEST['laname'];
$Username=$_REQUEST['usname'];
$Email=$_REQUEST['Email'];
$Birth=$_REQUEST['Dob'];
$Gender=$_REQUEST['gender'];
$Passd=$_REQUEST['Password'];
$Rpassd=$_REQUEST['Rpassword'];
$Resu_name=$_FILES['myfile']['name'];

$Resu=$Resu_name;
$img_name=$_FILES['image']['name'];//uploaded file name
$img_size=$_FILES['image']['size'];//uploaded file size
$tmp_loc=$_FILES['image']['tmp_name'];//temporary file location

$directory='../img_uplod/';
$trgt_file=$directory.$img_name;//(../img_uplod/acb.jpg) folder location after uploading the file to the database

if ($img_size>2097152) {
  echo "Check your file it need not more than 2mb";  
}
else{
move_uploaded_file($tmp_loc, $trgt_file);//move the file from temporary file loaction to the uploaded file location
$query="UPDATE submdata SET Firstname= :Firstname, Lastname=:Lastname ,Username=:Username,Email=:Email,Passd=:Passd,Rpassd=:Rpassd,Resu=:Resu,Birth=:dob,Gender=:gend,upld_img=:folv where Id=:id";

     $statement=$connection->prepare($query);
    if ($statement->execute([':Firstname'=>$Firstname,':Lastname'=>$Lastname,':Username'=>$Username,':Email'=>$Email,':Passd'=>$Passd,':Rpassd'=>$Rpassd,':Resu'=>$Resu,':dob'=>$Birth,':gend'=>$Gender,':folv'=>$trgt_file,':id'=>$id])) {
  header("location:myprof.php");
  }
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="../css/design.css">
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap" rel="stylesheet">
<body class="pog">
    <div align="center">
        <h3 id="nnp">Your Profile</h3>
<form class="yup" name="RegForm" method="POST" enctype="multipart/form-data">
	<br>
    <label for="fname" id="zxc">First Name*</label><br>
    <input type="text" id="fname" name="finame" placeholder="First Name" value="<?php echo $person->Firstname;?>">
    <br>
    <br>
    <label for="lname" id="zxc">Last Name*</label><br>
    <input type="text" id="lname" name="laname" placeholder="Last Name" value="<?php echo $person->Lastname;?>">
    <br>
    <br>
    <label for="uname" id="zxc1">User name</label><br>
    <input type="text" id="uname" name="usname" placeholder="User Name" value="<?php echo $person->Username;?>">
    <br>
    <br>
    <label for="eml" id="zxc2">Email*</label><br>
    <input type="text" id="eml" name="Email" placeholder="Email" value="<?php echo $person->Email;?>">
    <br>
    <br>
    <label for="Dob" id="zxc3">Date of birth</label>
    <input type="date" id="clc" name="Dob" value="<?php echo $person->Birth;?>">
    <br>
   
    <br>
    
    <input type="radio" name="gender" value="Male" value="<?php echo $person->Gender;?>">
    <label id="zxc3">Male</label>
    <input type="radio" name="gender" value="Female" value="<?php echo $person->Gender;?>">
    <label id="zxc3">Female</label>
    <input type="radio" name="gender" value="others" value="<?php echo $peson->Gender;?>">
    <label id="zxc3">Others</label>
<br>
<br>
     <label for="pwd" id="zxc1">Password*</label><br>
    <input type="Password" id="pwd" name="Password" placeholder="Password" value="<?php echo $person->Passd;?>">

    <br>
    <br>

     <label for="rpwd" id="zxc5">Retype Password*</label><br>
    <input type="Password" id="rpwd" name="Rpassword" placeholder="Retype Password" value="<?php echo $person->Rpassd;?>">
<br>
<br>
<label for="myfile" id="fol">Attach your resume!</label>
  <input type="file" id="file" name="myfile" value="<?php echo $person->Resu;?>"><br><br>

  <br>
  <label for="file" id="fol">Attach your picture!</label>
  <input type="file" id="file" name="image" ><br><br>

  <br>
    <input type="submit" value="Update" ><br>
    <br>
</section>  

</form>
</div>
</body>
</html>