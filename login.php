<!DOCTYPE html>


<html lang="en">

<!-- Header section-->
<?php
include "include/header.php";
?>

<body>

<?php
        ob_start();
        session_start();
        $username="";
        if( isset($_SESSION['username'])!="" ){
            header("Location: home.php");

        }
    
?>


<?php  include_once 'include/dbconnection.php';
        include "allfunctions.php";
        $error=false;
        $passError="";
        $usernameError="";

        if(isset($_POST['login']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $username = mysqli_real_escape_string($connection,$username);
            $password = mysqli_real_escape_string($connection,$password);
            if(empty($username)){
                $error=true;
                $usernameError = "Please enter your  username.";

            }


            if (empty($password)){
                $error = true;
                $passError = "Please enter password.";
            }

            if(!$error)
            {
               $errMSG=check_login($username,$password);
            }
        }

?>
<section>
 <?php include "include/navbarlanding.php"; ?>  
 </section>

<section class="logcover">

<div class="container ">
    <div class="row">

        <div class="col-sm-4">

        </div>
        <div class="col-sm-4 logbackground">
            <div class=""> 
                <h2>Login </h2>
                <form action="login.php" method="POST">

                    <?php
                    if ( isset($errMSG) ) {

                        ?>
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="username" placeholder="Username">
                        <span class="text-danger"><?php echo $usernameError ?></span>
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="password" name="password" placeholder="Password">
                        <span class="text-danger"><?php echo $passError ?></span>
                    </div>
                    <div class="form-group">
                        <button  name="login" type="submit" class="btn btn-success btn-lg form-control">Login</button>
                        <span>Yet not registered? Register here. <a href="registration.php" class="btn bt-sm">Register </a></span>
                    </div>
                </form>

            </div>
        </div>
        </div>
        <div class="col-sm-4"></div>

    </div>

</div>
</section>
<!-- Latest compiled and minified JavaScript -->

</body>



</html>