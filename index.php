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
<section>
    <?php 	
    
		include "include/dbconnection.php" ;
      
    ?>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <?php
            $username="";
            if( isset($_SESSION['username']) ){
                       
           // header("Location: home.php");

            ?>
            <a class="navbar-brand" href="home.php">
                Online Address Book
            </a>
            <?php } else { ?>
            <a class="navbar-brand" href="index.php">
                Online Address Book
            </a>
            <?php } ?>


        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->



            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->


            <?php
            $username="";
            if( isset($_SESSION['username'])!="" ){
                $username=$_SESSION['username'];
            ?>
             <li > <a href="home.php">Home</a></li>
            <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <?php echo $username ;?><span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li> <a href="#"> <i class="fa  fa-btn fa-user-circle"> </i> Profile</a> </li>
                        <li><a href="logout.php"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
             <?php  } else { 
?>



                <li><a href="login.php">Login</a></li>
                <li><a href="registration.php">Register</a></li>
<?php } ?>

                


            </ul>
</div>
</div>
</nav>
</section>

<section class="">
    <div class="container-fluid">
	<div class="row landing_cover">
        <div class="col-sm-4">
            <figure>
                <img src="imgs/adress-book.jpg" class="img-responsive">
            </figure>
        </div>
        <div class="col-sm-8 landing_text">
            <p class=""> I’m pretty proud of what i’m built with the FullContact Address Book. It imports directly from just about anywhere and it keeps all of your contacts up to date. You can also roll back any changes that you don’t like, so you never have to worry about things getting messy.</p>
        </div>
        </div>
        <div class="row landing_works_positon">
        <h1 class="text-center">FEATURES</h1>
        <div class="col-sm-4 interest_hover">
         <div>
                <i class="fa fa-5x fa-address-book"></i>
            </div>
            <div>
                <h3 >Note Book </h3>
                <p>A online note book is very essential for accessing contacts from anywhere.All of the contacts can be easily saved .  </p>
        </div>
        </div>
        <div class="col-sm-4 interest_hover">
            <div>
                <i class="fa fa-5x fa-address-book"></i>
            </div>
            <div>
                <h3 >Contacts  </h3>
                <p> Personal information of others can save for future requirements . </p>
        </div>
        </div>
        
        <div class="col-sm-4 interest_hover">
            <div>
                <i class="fa fa-5x fa-address-book"></i>
            </div>
            <div>
                <h3 >Editing & Searching</h3>
                <p> The important feature is edit and search of the entered contacts .User can get which contact is craying need by searching . Time consuming and faster access of the contacts . </p>
        </div>
        </div>
        </div>
        </div>
        </div>
    
    </div>

 </div>
</section>
<!-- Latest compiled and minified JavaScript -->
<section class="footer_cover">
    <footer class="footer_view">
        <p>@onlineaddressbook.com</p>
    </footer>
</section>

</body>



</html>
