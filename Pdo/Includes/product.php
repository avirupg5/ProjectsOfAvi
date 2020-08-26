<?php
session_start();
include_once "../Includes/dbn.php" ;
define("ROW_PER_PAGE", 3);
$search_keyword="";
if($_SERVER['REQUEST_METHOD']=='POST'){
  $search_keyword=$_POST['search'];
}
$sql = 'SELECT * FROM product WHERE Titel LIKE :keyword ';
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
<link rel="stylesheet" type="text/css" href="../css/product_search.css">
</head>

<body>
<?php
include_once "nav.php";
?>
 <form class="form-inline md-form mr-auto mb-4" action="product.php" method="POST">
  
  <input class="form-control mr-sm-2" type="text" placeholder="Search product" aria-label="Search" name="search">
  <button class="btn btn-outline-warning btn-rounded btn-sm my-0" type="submit" name="submit">Search</button>


  <div class="container">
  <div class="row">
    <?php
  foreach($result as $res) {
    ?>
    <div class="col">
  <div class="card" style="width: 18rem;">
  <img src="<?php echo $res->trgt_file?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Product title</h5>
    <p class="card-text"><?php echo $res->Titel?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo $res->Des?></li>
    <li class="list-group-item"><?php echo $res->Price?></li>
    <div class="card-body">
    <span class="card-remove">
    <a href="../Admin/edt_prod.php?id=<?php echo $res->id?>" class="btn btn-primary btn-rounded btn-sm my-0">Edit</a>
   <a href="../Admin/del_prod.php?id=<?php echo $res->id?>" class="btn btn-danger btn-rounded btn-sm my-0">Delete</a>
   <a href="../User/details_product.php?id=<?php echo $res->id?>" class="btn btn-primary btn-rounded btn-sm my-0">Details</a>
   </span>
  </div>
   
  </ul>
</div>
</div>
  <?php
}

?>
</div>
</div>

<?php echo $page_per_html; ?>
</form>
</body>
</html>


