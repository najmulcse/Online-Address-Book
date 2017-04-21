                       

           <?php   
                 
                     

               
                     function export_Me(){
                        include "include/dbconnection.php";    
                        
                        $fp = fopen('contact.txt', 'w');
                        $user_id=$_SESSION['user_id'];
                        $query="SELECT * from addresses where user_id='$user_id'";
                        $result=mysqli_query($connection,$query);
                        while ($row = $result->fetch_assoc()) {

                            fprintf($fp, "%s\n", $row['full_name']);
                            fprintf($fp, "%s\n", $row['nick_name']);
                            fprintf($fp, "%s\n", $row['email']);
                            fprintf($fp, "%s\n", $row['phone']);
                            fprintf($fp, "====\n");
                        }

                        fclose($fp);

                        header('Content-disposition: attachment; filename=contact.txt');
                        header('Content-type: text/plain');
                        readfile('contact.txt');
                        unlink('contact.txt');
                      
                        } 
                         ?>