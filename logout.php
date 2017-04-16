<?php
session_start();



    unset($_SESSION['username']);
    session_unset();
    session_destroy();
    echo "logout";
    header("Location: index.php");
    exit;

?>