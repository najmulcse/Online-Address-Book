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
        if( !isset($_SESSION['username'])){
           
            header("Location: index.php");
               }

        include "include/dbconnection.php" ;
        include "include/navigationbar.php" ;

?>

<div class="container">
    <div class="row">

        
        <div class="col-sm-12">
            <h1>Home page</h1>
            <?php
            echo $username;
            ?>
        </div>
        

    </div>

</div>
<!-- Latest compiled and minified JavaScript -->

</body>


</html>