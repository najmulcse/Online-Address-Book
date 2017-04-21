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
    <link rel="stylesheet" type="text/css" href="css/formelements.css ">
    <link href="css/bookadmin.css" rel="stylesheet">
    <link href="css/mystyle.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>

    <div id="wrapper">
    <section>
        <!-- Navigation -->
      <?php  include "include/navbar.php";?>
</section>
<section>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-sm-1">
                          <a class="btn btn-primary" href="home.php">Back </a> 
                    </div>
                    <div class="col-sm-11">
                    <!-- search -->
                         <?php include('search.php'); ?>

                        <?php
                            if(isset($_GET['details_id'])){
                                 $id=$_GET['details_id'];
                                 $query = "SELECT * from addresses where id='$id'";
                                 $query_username_result = mysqli_query($connection,$query);
                                 while( $row=mysqli_fetch_assoc($query_username_result)){ 
                                           
                                           $full_name=$row['full_name'];
                                           $nick_name=$row['nick_name']; 
                                           $email=$row['email'];
                                           $street_address=$row['street_address'];
                                           $city=$row['city'];
                                           $country=$row['country']; 
                                           $phone1=$row['phone1'];
                                           $phone2=$row['phone2'];
                                           $post_code=$row['post_code']; 
                                           $birthday=$row['birthday'];
                                           $website=$row['website'];
                            }
                            }
                        ?>

                    </div>
                </div>
                       
                        
                        <div class="row">

                           
                            <div class="col-sm-8">
                               <div class="panel-body">
                            <table class="table table-border table-hover">
                                <thead>
                                 <h1><?php echo $full_name ; ?></h1>
                            </thead>
                            <tbody>
                               <tr>
                                <td>Full Name</td>
                                <td><?php echo $full_name ;?></td>
                                </tr>
                                <tr>
                                <tr>
                                <td>Nick Name</td>
                                <td><?php echo $nick_name ;?> </td>
                                </tr>
                                <td>Email</td>
                                <td><?php echo $email ;?></td>
                                </tr>
                                <tr>
                                <td>Street Address</td>
                                <td><?php echo $street_address ;?></td>
                                </tr>
                                
                                <tr>
                                <td>Country</td>
                                <td><?php echo $country ;?></td>
                                </tr>
                                <tr>
                                <td>City</td>
                                <td><?php echo $city ;?></td>
                                </tr>
                                <tr>
                                <td>Post Code</td>
                                <td><?php echo $post_code ;?></td>
                                </tr>
                                <tr>
                                <td>Mobile 1</td>
                                <td><?php echo $phone1 ;?></td>
                                </tr>
                                <tr>
                                <td>Mobile 2</td>
                                <td><?php echo $phone2 ;?></td>
                                </tr>
                                <tr>
                                <td>Date of birth</td>
                                <td><?php echo $birthday ;?></td>
                                </tr>
                                <tr>
                                <td>Website</td>
                                <td><?php echo $website ;?></td>
                                </tr>
                            </tbody>
                            </table>
                         </div>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
         </div>
    </div><!-- /# end page-wrapper -->

  </section>
</div>

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

 </html>
