<!DOCTYPE html>
<html lang="en">


<?php
        ob_start();
        $errorMsg="";
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
    <link rel="stylesheet" type="text/css" href="css/formelements.css">
    <!-- Custom CSS -->
    <link href="css/bookadmin.css" rel="stylesheet">
    <link href="css/mystyle.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <section>
            <?php  include "include/navbar.php";?>
        </section>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-sm-12">
                       <?php include('search.php'); ?>
                     </div>
                </div>
                <div class="row">
                        <div class="col-sm-6">
                        <h1 class="page-header"> <ol class="breadcrumb">   Contacts </ol>  </h1>
                        </div>
                        <div>
                            
                        </div>
                </div>

                <div class="row">
                   <div class="col-sm-12">
                    <?php
                        if(isset($_POST['search']))
                            {
                            $search=$_POST['search_value'];
                            $user_id=$_SESSION['user_id'];
                            $query="SELECT * FROM addresses WHERE (full_name LIKE '%$search%' OR city LIKE '%$search%' OR nick_name LIKE '%$search%' OR street_address LIKE '%$search%' OR email LIKE '%$search%' OR phone1 LIKE '%$search%' OR country LIKE '%$search%' OR website LIKE '%$search%' OR phone2 LIKE '%$search%' OR birthday LIKE '%$search%') AND user_id='$user_id'"; 
                            $query_result=mysqli_query($connection,$query);
                            if(!$query_result){
                                die("Query failed".mysqli_error($connection));
                            }
                            $count=mysqli_num_rows($query_result);
                            if($count==0)
                            {
                                echo "No result found";
                            }else{
                        ?>
                       <div style="height: 400px; overflow: auto;">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Full Name</th> 
                                <th>Mobile</th>
                                <th>Street Address</th>
                                <th>City</th>
                                <th>Details</th>
                                <th>Edit</th>
                                <th>Delete</th> 
                            </tr>
                            </thead>

                            <tbody>

                     
                        <?php
                            
                            
                            
                            while($row=mysqli_fetch_assoc($query_result)){   ?>

                          
                                <tr>
                                <td><?php   echo $row['full_name']; ?></td>
                                <td><?php   echo $row['phone1']; ?></td>
                                <td><?php   echo $row['street_address'] ;?></td>
                                <td><?php   echo $row['city']; ?></td>
                             
                              
                                 <?php echo  " <td><a   href='contactDetails.php?details_id={$row['id']}&user_id={$user_id}' class='btn btn-success' >Details</a></td>"; ?>

                                <?php echo  " <td><a   href='contactEdit.php?edit_id={$row['id']}&user_id={$user_id}' class='btn btn-success' >Edit</a></td>"; ?>
                                <?php echo  " <td><a  href='home.php?delete_id={$row['id']}' class='btn btn-danger' >Delete</a></td>"; ?>    
                                </tr>
                             
                                </tr>
                                         
                             <?php    }}  }?>
                            </tbody>
                        </table>
                    
                    </div>
                </div>
                </div>
             </div>
                <!-- /.row -->
<!-- for deleting a contact-->

          <?php

            if(isset($_GET['delete_id']))
            {
                $delete_id=$_GET['delete_id'];
                $query="DELETE from addresses where id='$delete_id'";
                $query_result=mysqli_query($connection,$query);
                if($query_result)
                {
                    header("Location:home.php");
                }
                
            }    
             ?>
            </div>
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
