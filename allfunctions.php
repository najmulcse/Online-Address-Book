<?php
include "include/dbconnection.php";
		
		function find_contact()
		{
			    global $connection;
				$user_id=$_SESSION['user_id'];
                $query="SELECT * from addresses where user_id='$user_id'";
                $result=mysqli_query($connection,$query);
                $count=mysqli_num_rows($result);
                return $count;
		}

		function check_login($username,$password){
  			global $connection;
			    $hashFormat = "$2y$10$";
                $salt = "iusesomecrazystrings22";
                $hashF_and_salt = $hashFormat . $salt;
                $password = crypt($password, $hashF_and_salt);
                $query = "SELECT username,user_id,password from users where username='$username'";
                $query_username_result = mysqli_query($connection,$query);
                $row=mysqli_fetch_array($query_username_result);
                $count_user =mysqli_num_rows($query_username_result);
                   if($count_user ==1 && $row['password']==$password){
                       $_SESSION['username']=$row['username'];
                       $_SESSION['user_id']=$row['user_id'];
                       header("Location: home.php");
                      }
                   else
                       {
                       $msg = "Wrong username or password, Try again...";
                       }



                       return $msg;
		}

?>