<?php
session_start();
include_once "../Includes/dbn.php" ;
define("ROW_PER_PAGE", 2);
$search_keyword="";
if($_SERVER['REQUEST_METHOD']=='POST'){
  $search_keyword=$_POST['search'];
}
$sql = 'SELECT * FROM submdata WHERE Firstname LIKE :keyword ';
$page_per_html='';
$page = 1;
    $counter=0;
    if(!empty($_POST["page"])) {
        $page = $_POST["page"];
        $counter=($page-1) * ROW_PER_PAGE;
      }
        $limit=" limit " . $counter . "," . ROW_PER_PAGE;
      $pagination_statement = $connection->prepare($sql);
      $pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
      $pagination_statement->execute();
      $row_count=$pagination_statement->rowCount();
      $page_per_html .= "<div style='text-align:center;margin:20px 0px;'>";
      if(!empty($row_count)){
        $page_per_html .= "<div style='text-align:center;margin:20px 0px;'>";
        $page_count=ceil($row_count/ROW_PER_PAGE);//**ceil func is used to convert interger 
        if($page_count>1) {
            for($i=1;$i<=$page_count;$i++){
                if($i==$page){
                    $page_per_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page current" />';
                } else {
                   $page_per_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page" />';
                }
            }
        }
        $page_per_html .= "</div>";
    }
    $query = $sql.$limit;
    $pdo_statement = $connection->prepare($query);
    $pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
    $pdo_statement->execute();
    $result = $pdo_statement->fetchAll(PDO::FETCH_OBJ);
?>
<html>
<head>
	<title>
	</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/SEARCH.CSS">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark indigo mb-4">

  <!-- Navbar brand -->
  <a class="navbar-brand" href="#">Navbar</a>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <form class="form-inline ml-auto" action="" method="POST">
      <div class="md-form my-0">
        <input class="form-control" type="text" name="search" placeholder="Search" aria-label="Search">
      </div>
      <button href="#!" class="btn btn-outline-white btn-md my-0 ml-sm-2" type="submit" name="submit">Search</button>
   

  </div>
  <!-- Collapsible content -->

</nav>

	<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Editable table</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
            class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-responsive-md table-striped text-center">

        <thead>
          <tr>
            <th class="text-center">First Name</th>
            <th class="text-center">Last Name</th>
            <th class="text-center">User Name</th>
            <th class="text-center">Email Id</th>
            <th class="text-center">Birth Day</th>
            <th class="text-center">Gender</th>
            <th class="text-center">Password</th>
            <th class="text-center">Resume</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Remove</th>
          </tr>
        </thead>
	
	

	
	<tbody>
    <?php
foreach ($result as $res) {
  

            ?>
          <tr>
            

            <td class="pt-3-half" contenteditable="true"><p><?php echo $res->Firstname?></p></td>
            <td class="pt-3-half" contenteditable="true"><?php echo $res->Lastname?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo $res->Username?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo $res->Email?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo $res->Birth?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo $res->Gender?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo $res->Passd?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo $res->Resu?></td>
            
            <td>
              <span class="table-remove"> 
                  <a href="edit_user_detail.php?id=<?php echo $res->Id?>" class="btn btn-primary btn-rounded btn-sm my-0">Update</a></span>

            </td>
            <td>
              <span class="table-remove">
                 <a href="delete_user_details.php?id=<?php echo $res->Id?>" class="btn btn-danger btn-rounded btn-sm my-0">Discard</a></span>

            </td>
          </tr>
          <?php
          }
          ?>
        </tbody>
	



</table>
<?php echo $page_per_html; ?>
 </form>
</div>
</div>
</div>
</body>
</html>