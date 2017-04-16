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
        include "include/navigationbar.php" ;
        include_once 'include/dbconnection.php';
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
                $hashFormat = "$2y$10$";
                $salt = "iusesomecrazystrings22";
                $hashF_and_salt = $hashFormat . $salt;
                $password = crypt($password, $hashF_and_salt);
                $query = "SELECT username,password from users where username='$username'";
                $query_username_result = mysqli_query($connection,$query);
                $row=mysqli_fetch_array($query_username_result);
                $count_user =mysqli_num_rows($query_username_result);
                   if($count_user ==1 && $row['password']==$password){
                       $_SESSION['username']=$row['username'];
                       header("Location: home.php");
                      }
                   else
                       {
                       $errMSG = "Wrong username or password, Try again...";
                       }
            }
        }

?>

<div class="container">
    <div class="row">

        <div class="col-sm-4">

        </div>
        <div class="col-sm-4 signupbackground">
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
                        <input class="form-control"required type="text" name="username" placeholder="Username">
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
        <div class="col-sm-4"></div>

    </div>

</div>
<!-- Latest compiled and minified JavaScript -->

</body>



</html>