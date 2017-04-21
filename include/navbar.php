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

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a class=" " href="addNewContacts.php"><i class="fa fa-fw fa-dashboard"></i> Add new contact</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-bar-chart-o"></i> Import</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-bar-chart-o"></i> Export</a>
                    </li>
                      <li>
                        <a href="home.php"><i class="fa fa-fw fa-bar-chart-o"></i> All contacts</a>
                    </li>
                   
                    
                    
                </ul>
            </div>
            </div>
            <!-- /.navbar-collapse -->
        </nav>