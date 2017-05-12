                       

           <?php   
            // ob_start();
           // session_start();
              include "include/dbconnection.php";  

               if(isset($_POST["export_contact"])) {
                                             
                        global $connection;
                        header('Content-disposition: attachment; filename=contact.csv');
                        header('Content-type: text/plain');
                        $output = fopen("php://output", "w");;
                        $user_id=$_POST['id'];
                    
                        $query="SELECT * from addresses where user_id='$user_id'";
                        $result=mysqli_query($connection,$query);
            
                         while($row = mysqli_fetch_assoc($result))  
                          {  
                             //  fputcsv($output, array($row['full_name'],$row['nick_name'],$row['email'],$row['street_address'],$row['city'],$row['country'],$row['phone1'],$row['phone2'],$row['birthday'],$row['website'])); 
                              fputcsv($output, $row);
                            
                              
                          }  

                        fclose($output);
                        exit(0);
                       
                            }
                   
                         ?>