<?php
include_once "Includes/nav.php"
?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/index-card.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>


</head>
<body>

<!-- <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/books.jpg" class="d-block w-100" alt="..." height="auto" >
    </div>
    <div class="carousel-item">
      <img src="images/smartphone.jpg" class="d-block w-100" alt="..." height="auto">
    </div>
    <div class="carousel-item">
      <img src="images/laptops.jpg" class="d-block w-100" alt="..." height="auto">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->

<section>


<div id="make-3D-space">
    <div id="product-card">
        <div id="product-front">
        	<div class="shadow"></div>
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt.png" alt="" />
            <div class="image_overlay"></div>
            <div id="view_details">View details</div>
            <div class="stats">        	
                <div class="stats-container">
                    <span class="product_price">$39</span>
                    <span class="product_name">Adidas Originals</span>    
                    <p>Men's running shirt</p>                                            
                    
                    <div class="product-options">
                    <strong>SIZES</strong>
                    <span>XS, S, M, L, XL, XXL</span>
                    <strong>COLORS</strong>
                    <div class="colors">
                        <div class="c-blue"><span></span></div>
                        <div class="c-red"><span></span></div>
                        <div class="c-white"><span></span></div>
                        <div class="c-green"><span></span></div>
                    </div>
                </div>                       
                </div>                         
            </div>
        </div>
        <div id="product-back">
	        <div class="shadow"></div>
            <div id="carousel">
                <ul>
                    <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large.png" alt="" /></li>
                    <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large2.png" alt="" /></li>
                    <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large3.png" alt="" /></li>
                </ul>
                <div class="arrows-perspective">
                    <div class="carouselPrev">
                        <div class="y"></div>
	                    <div class="x"></div>
                    </div>
                    <div class="carouselNext">
                        <div class="y"></div>
	                    <div class="x"></div>
                    </div>
                </div>
            </div>
            <div id="flip-back">
            	<div id="cy"></div>
                <div id="cx"></div>
            </div>
        </div>	  
    </div>	
</div>	
</section>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="Js/card-js.js"></script>

</body>
</html>