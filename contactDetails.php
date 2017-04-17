<!DOCTYPE html>
<html lang="en">


<?php
        ob_start();
        session_start();
        if( !isset($_SESSION['username'])){
           
            header("Location: login.php");
               }

        include "include/dbconnection.php" ;
      

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home | Address Book </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/bookadmin.css" rel="stylesheet">
    <link href="css/mystyle.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
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
                    <li class="add_contact_button">
                        <a class=" btn btn-success " href="addNewContacts.php"><i class="fa fa-fw fa-dashboard"></i> Add new contact</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-bar-chart-o"></i> Import</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-bar-chart-o"></i> Export</a>
                    </li>
                   
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Contacts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">List 1</a>
                            </li>
                            <li>
                                <a href="#">List 2</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-8"></div>
                            <div class="col-sm-4">
                            <form action="" method="">
                               <div class="input-group col-md-12">
                                <input type="text" class="  search-query form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                            </form>
                            </div>
                        </div>
                        <h1 class="page-header"> <ol class="breadcrumb">   Contacts </ol>  </h1>
                       <div style="height: 400px; overflow: auto;">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th> 
                                <th>Mobile</th>
                                <th>City</th>
                                <th>Details</th>
                                <th>Edit</th>
                                <th>Delete</th> 
                            </tr>
                            </thead>

                            <tbody>

                            <?php
                            $query = "SELECT user_id from users where username='$username'";
                            $query_username_result = mysqli_query($connection,$query);
                            $row=mysqli_fetch_array($query_username_result);

                            $user_id=$row['user_id'];
                            $query = "SELECT * from addresses where user_id='$user_id'";
                            $query_username_result = mysqli_query($connection,$query);
                           while( $row=mysqli_fetch_assoc($query_username_result)){ ?>
                                <tr>
                                <td><?php   echo $row['full_name']; ?></td>
                                <td><?php   echo $row['phone1']; ?></td>
                                <td><?php   echo $row['city']; ?></td>
                              <?php echo  " <td><a  href='contactDetails.php?id={$row['id']}&user_id={$user_id}' class='btn btn-primary' >Details</a></td>"; ?>
                                <?php echo  " <td><a  href='contactEdit.php?edit_id={$row['id']}&user_id={$user_id}' class='btn btn-success' >Edit</a></td>"; ?>
                                <?php echo  " <td><a  href='contactEdit.php?delete_id={$row['id']}' class='btn btn-danger' >Delete</a></td>"; ?>    
                                </tr>
                             <?php    }  ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>

            <?php

            if(isset($_GET['delete_id']))
            {
                $delete_id=$_GET['delete_id'];
                $query="DELETE from addresses where id='$delete_id'";
                $query_result=mysqli_query($connection,$query);
                
            }    
             ?>
            
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
