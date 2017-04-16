<!DOCTYPE html>
<html lang="en">
<!-- Header section-->
<?php
include "include/header.php";
?>

<body>
<!-- navigation bar and db connection -->
<?php
        ob_start();
        session_start();
         if( isset($_SESSION['username'])!="" ){
            header("Location: home.php");
        }
        include "include/navigationbar.php" ;
        include_once 'include/dbconnection.php';
        $error=false;

        $firstnameError="";
        $lastnameError="";
        $passError="";
        $usernameError="";
        $confPassError="";

// Signup form action is here
    if(isset($_POST['signup']))
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        $firstname = mysqli_real_escape_string($connection,$firstname);
        $lastname = mysqli_real_escape_string($connection,$lastname);
        $username = mysqli_real_escape_string($connection,$username);
        $password = mysqli_real_escape_string($connection,$password);



       // basic first name validation
      if (empty($firstname)) {
          $error = true;
          $firstnameError = "Please enter your first name.";
      }
       else if (!preg_match("/^[a-zA-Z ]+$/",$firstname)) {
          $error = true;
          $firstnameError = "Name must contain alphabets and space.";
      }

    // basic last name validation
        if (empty($lastname)) {
            $error = true;
            $lastnameError = "Please enter your last name.";
        }
        else if (!preg_match("/^[a-zA-Z ]+$/",$lastname)) {
            $error = true;
            $lastnameError = "Name must contain alphabets and space.";
        }


          // check username exist or not

            if(empty($username)){
                $error=true;
                $usernameError = "Please enter your  username.";

            }
            else {

                $query = "SELECT username from users where username='$username'";
                $query_username_result = mysqli_query($connection,$query);
                $check_username =mysqli_num_rows($query_username_result);
                if($check_username!=0){
                    $error = true;
                    $userError = "Provided Username is already in use.";
                }

            }


      // password validation
          if (empty($password)){
              $error = true;
              $passError = "Please enter password.";
          } else if(strlen($password) < 6) {
              $error = true;
              $passError = "Password must have atleast 6 characters.";
          }
        if (empty($confirm_password)){
            $error = true;
            $passError = "Please enter password.";
        } else if($password != $confirm_password) {
            $error = true;
            $conf_passError = "Password does not match";
        }

            if(!$error){



                        $hashFormat = "$2y$10$";
                        $salt = "iusesomecrazystrings22";
                        $hashF_and_salt = $hashFormat . $salt;
                        $password = crypt($password, $hashF_and_salt);
                        $query="INSERT INTO users(firstname,lastname,username,password)";
                        $query.="values('$firstname','$lastname','$username','$password')";
                        $query_insert_result = mysqli_query($connection,$query);
                        if($query_insert_result)
                        {
                            $errorType = "Success";
                            $errorMSG = "Successfully registered, you may login now";
                            unset($firstname);
                            unset($lastname);
                            unset($username);
                            unset($password);
                            header("Location: login.php");

                        }
                        else
                        {
                            $errorType = "Danger";
                            $errorMSG = "Something went wrong, try again later...";
                        }

                    }










    }
?>

<div class="container signcover" >
    <div class="row">

        <div class="col-sm-4">

        </div>
        <div class="col-sm-5 ">

            <?php

            ?>
            <div class="panel-body ">
                <h2>Sign up </h2>
                <form action="registration.php" method="POST" autocomplete="off">
                    <div class="form-group">
                        <?php
                           if(isset($errorMSG)){


                        ?>
                    </div>
                    <div class="form-group">
                        <div class="alert alert-<?php echo ($errorType=="Success") ? "Success" : $errorType; ?>">
                            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errorMSG; ?>
                        </div>
                    </div>
                    <?php
                    }
                    ?>

                    <div class="form-group">
                        <input class="form-control"  type="text" name="firstname" placeholder="First Name">
                        <span class="text-danger"><?php echo $firstnameError ?></span>
                    </div>
                    <div class="form-group">
                        <input class="form-control"  type="text" name="lastname" placeholder="Last Name">

                        <span class="text-danger"><?php echo $lastnameError ?></span>
                    </div>
                    <div class="form-group">
                        <input class="form-control"  type="text" name="username" placeholder="Username">
                        <span class="text-danger"><?php echo $usernameError ?></span>
                    </div>
                    <div class="form-group">
                        <input class="form-control"  type="password" name="password" placeholder="Password">
                        <span class="text-danger"><?php echo $passError ?></span>
                    </div>
                    <div class="form-group">
                        <input class="form-control"  type="password" name="confirm_password" placeholder="Confirmed Password">
                        <span class="text-danger"><?php echo $confPassError ?></span>
                    </div>
                    <div class="form-group">
                        <button  type="submit" class="btn btn-primary form-control" name="signup">Sign up</button>
                         <span>Already Register? Log in here. <a href="registration.php" class="btn bt-sm">Login </a></span>
                    </div>
                </form>

            </div>
        </div>
        <div class="col-sm-3"></div>

    </div>

</div>
<!-- Latest compiled and minified JavaScript -->


</body>



</html>
<?php ob_end_flush(); ?>