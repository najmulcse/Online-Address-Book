<nav class="navbar navbar-default navbar">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
           
<?php
$username="";
if( isset($_SESSION['username']) ){
           
           // header("Location: home.php");

            ?>
            <a class="navbar-brand" href="home.php">
                Online Contact Book
            </a>
            <?php } else { ?>
            <a class="navbar-brand" href="index.php">
                Online Contact Book
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
             
            <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <?php echo $username ;?><span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
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
