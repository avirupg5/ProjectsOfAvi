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
  $email = $_POST['Email'];
  $password = $_POST['Password'];
  $pic_name=$_FILES['pic']['name'];
  $pic_tmp=$_FILES['pic']['tmp_name'];
  $directory="UploadedImage/";
  $target=$directory.$pic_name;
  move_uploaded_file($pic_tmp,$target);
  $sql = 'UPDATE submdata SET email=:email, password=:password ,image=:image WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':email' => $email, ':password' => $password,':image'=>$target, ':id' => $id])) {
    header("Location: dashboard.php");
  }
}
}
?>

<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Copyright" content="arirusmanto.com">
<meta name="description" content="Admin MOS Template">
<meta name="keywords" content="Admin Page">
<meta name="author" content="Ari Rusmanto">
<meta name="language" content="Bahasa Indonesia">

<link rel="shortcut icon" href="stylesheet/img/devil-icon.png"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="mos-css/mos-style.css"> <!--pemanggilan file css-->
</head>

<body background="b.jpg">

      
<form name="RegistrationForm" enctype="multipart/form-data" style="width:300px" action="" method="post"> <br><br>
          <table class="table table-dark" style="margin-left: 500;color: #ffffff;">
            
             
               <tr>
                <td>Email</td>
                <td>:</td> 
                <td><input type="text" name="Email" id="Email" value="<?php echo $person->Email;?>"/></td>
              </tr>
              
               <tr><td>Password</td>
                <td>:</td>
           
                <td><input type="text" name="Password" id="Password" value="<?php echo $person->Passd;?>"/></td>
              </tr>
            
             
             <tr>
             <td>Customer Image</td>
             <td>:</td>
             <td>
       <input type="file" name="pic" accept=".jpeg,.jpg,.png" placeholder="Upload your Pic" value="Upload your Pic" required/>
       
       
             

               
                <tr>
                <td><input type="submit" name="submit" value="Submit"/></td>
                <td>:</td>
                <td><input type="reset" name="s2"/></td>
                </tr>
            </table>
        
        
    
      <div><?php echo $msg;?></div>
    
  </div>

</div></form>
</body>
</html>
