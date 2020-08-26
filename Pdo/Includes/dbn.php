<?php
try{
	$connection= new PDO('mysql:host=localhost;dbname=details_fld','root','');
	// echo "Connection is live";//if an exception is thrwon within the try block the scripts stops executing and close directy to the first catch block,in exception class handle any problem may occurs in databse quaries
}
	catch(PDOException $p){
		echo "Connection is fault" .$p->getMesaage();//from catch block we about to know the error
	}

?>