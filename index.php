<!DOCTYPE html>


<html lang="en">


          <?php
      		  ob_start();
        	  session_start();
        	  $username="";
       		  if( isset($_SESSION['username'])!="" ){
                    $username=$_SESSION['username'];
                     header("Location: home.php");
                    } 

           ?>
<!-- Header section-->
<?php
    include "include/header.php";
?>

<body>

<?php 	include "include/navigationbar.php"; 
		include "include/dbconnection.php" ;
?>

<div class="container">
	<div class="row">

	    <div class="col-sm-12">
	       <h1>Landing page</h1>
	     </div>
	   
			
	</div>

</div>
<!-- Latest compiled and minified JavaScript -->


</body>



</html>
