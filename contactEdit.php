<!DOCTYPE html>
<html lang="en">


<?php
        ob_start();
        session_start();
        if( !isset($_SESSION['username'])){
           
            header("Location: login.php");
               }else{
                $username=$_SESSION['username'];
               }

        include "include/dbconnection.php" ;
      

//Inserting the contacts 

         
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
    <link rel="stylesheet" type="text/css" href="css/formelements.css">
    <link href="css/bookadmin.css" rel="stylesheet">
    <link href="css/mystyle.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Include Bootstrap Datepicker -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
</head>

<style type="text/css">
/**
 * Override feedback icon position
 * See http://formvalidation.io/examples/adjusting-feedback-icon-position/
 */
#eventForm .form-control-feedback {
    top: 0;
    right: -15px;
}
</style>
<body>

    <div id="wrapper">
        <section>
        <!-- Navigation -->
        <?php  include "include/navbar.php";?>
        </section>
    
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-sm-1">
                      <a class="btn btn-primary" href="home.php">Back </a>
                    </div>
                    <div class="col-sm-11">
                         <?php include('search.php'); ?>
                       </div>
                    </div>
                    <div class="row">

                       
                       
        <?php
                $fullnameError="";
                $emailError="";
                $phone1Error="";

                $error=false;
                if(isset($_GET['edit_id']))
                {
                  $id=$_SESSION['edit_id']=$_GET['edit_id'];
                  $user_id=$_SESSION['user_id']=$_GET['user_id'];
                
                $query = "SELECT * from addresses where id='$id'";
                $query_contact_result = mysqli_query($connection,$query);
                while($row =mysqli_fetch_assoc($query_contact_result))
                {
                  $user_id=$row['user_id'];
                  $full_name= $row['full_name'];
                  $nick_name=$row['nick_name'];
                  $email=$row['email'];
                  $street_address=$row['street_address'];
                  $city=$row['city'];
                  $country=$row['country'];
                  $post_code=$row['post_code'];
                  $phone1=$row['phone1'];
                  $phone2=$row['phone2'];
                  $website=$row['website'];
                  $birthday=$row['birthday'];
                }
                 
            }

            
      
                   
                      //updated code
               
                $fullnameError="";
                $emailError="";
                $phone1Error="";

                $error=false;
             if(isset($_POST['update_contact'])){
                
                $full_name=$_POST['full_name'];
                $nick_name=$_POST['nick_name'];
                $email= $_POST['email'];
                $city=$_POST['city'];
                $street_address=$_POST['street_address'];
                $post_code=$_POST['post_code'];
                $country=$_POST['country'];
                $phone1= $_POST['phone1'];
                $phone2=$_POST['phone2'];
                $website=$_POST['website'];
                $birthday=$_POST['birthday'];
                $full_name = mysqli_real_escape_string($connection,$full_name);
                $nick_name = mysqli_real_escape_string($connection,$nick_name);
                $email = mysqli_real_escape_string($connection,$email);
                $city = mysqli_real_escape_string($connection,$city);
                $post_code = mysqli_real_escape_string($connection,$post_code);
                $country = mysqli_real_escape_string($connection,$country);
                $phone1 = mysqli_real_escape_string($connection,$phone1);
                $phone2 = mysqli_real_escape_string($connection,$phone2);
                $website = mysqli_real_escape_string($connection,$website);
                $street_address = mysqli_real_escape_string($connection,$street_address);
                $birthday=mysqli_real_escape_string($connection,$birthday);
                 
                $id=$_SESSION['edit_id'];
              
                        
                        $query="UPDATE addresses SET full_name='$full_name',nick_name='$nick_name',email='$email',
                        city='$city',street_address='$street_address',post_code='$post_code',country='$country',
                        phone1='$phone1',phone2='$phone2',website='$website',birthday='$birthday' where id='$id'";
                       
                        $query_insert_result = mysqli_query($connection,$query);
                        if($query_insert_result){

                          echo $success_msg="Contact updated successfully";
                           header("Location: home.php");
                        }
                      
                      else
                      {
                    echo   $error="Something wrong";
                     //  header("Location: home.php");
                      }
                



            
          }
                       ?>

                    
                    <div class="col-sm-2">
                       
                    </div>
                    <div class="col-sm-8">

                        <h3 class="page-header"> <ol class="breadcrumb">   Updated the contacts  </ol>  </h3>
                      
                      <div style="300px; overflow: auto;">
                       
                       <form action="contactEdit.php" method="POST">
                              <div class="form-group">
                                <label for="name">Full Name *</label>
                                <input type="text" class="form-control" name="full_name" value='<?php echo $full_name;?>'>
                              </div>
                              <div class="form-group">
                                <label for="nickname">Nick Name</label>
                                <input type="text" class="form-control" name="nick_name" value=<?php echo $nick_name;?> >
                              </div>
                               <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" name="email" value=<?php echo $email;?>>
                                 <span class="text-danger"><?php echo $emailError ?></span>
                              </div>
                              <div class="form-group">
                               <div class="form-group">
                                <label for="phone1">Phone Number *</label>
                                <input type="text" class="form-control" name="phone1" value=<?php echo $phone1;?>>
                                 <span class="text-danger"><?php echo $phone1Error ?></span>
                                <input type="text" class="form-control" name="phone2" value=<?php echo $phone2;?>>
                              </div>
                                <label for="street_address">Street address</label>
                                <textarea type="text" class="form-control" name="street_address" value=<?php echo $street_address;?> > </textarea>
                              </div>
                               <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" name="city" value=<?php echo $city;?>>
                              </div>
                              <div class="form-group">
                                <label for="postcode">Post Code</label>
                                <input type="text" class="form-control" name="post_code" value=<?php echo $post_code;?>>
                              </div>
                               <div class="form-group">
                                <label for="name">Country</label>
                                 <select id="to-country-id" name="country" class="country last lastrow form-control">
                                              <option value='<?php echo $country;?>'> <?php echo $country;?></option>
                                              <option value="United States" >United States</option>
                                              <option value="Canada" >Canada</option>
                                              <option value="">--</option>
                                              <option value="Afghanistan" >Afghanistan</option>
                                              <option value="Albania" >Albania</option>
                                              <option value="Algeria" >Algeria</option>
                                              <option value="Andorra" >Andorra</option>
                                              <option value="Angola" >Angola</option>
                                              <option value="Anguilla" >Anguilla</option>
                                              <option value="Antigua & Barbuda" >Antigua & Barbuda</option>
                                              <option value="Argentina" >Argentina</option>
                                              <option value="Armenia" >Armenia</option>
                                              <option value="Aruba" >Aruba</option>
                                              <option value="Australia" >Australia</option>
                                              <option value="Austria" >Austria</option>
                                              <option value="Azerbaijan" >Azerbaijan</option>
                                              <option value="Bahamas" >Bahamas</option>
                                              <option value="Bahrain" >Bahrain</option>
                                              <option value="Bangladesh" >Bangladesh</option>
                                              <option value="Barbados" >Barbados</option>
                                              <option value="Belarus" >Belarus</option>
                                              <option value="Belgium" >Belgium</option>
                                              <option value="Belize" >Belize</option>
                                              <option value="Bermuda" >Bermuda</option>
                                              <option value="Bhutan" >Bhutan</option>
                                              <option value="Bolivia" >Bolivia</option>
                                              <option value="Bonaire" >Bonaire</option>
                                              <option value="Bosnia & Herzegovina" >Bosnia & Herzegovina</option>
                                              <option value="Botswana" >Botswana</option>
                                              <option value="Brazil" >Brazil</option>
                                              <option value="Brunei Darussalam" >Brunei Darussalam</option>
                                              <option value="Bulgaria" >Bulgaria</option>
                                              <option value="Burkina Faso" >Burkina Faso</option>
                                              <option value="Burundi" >Burundi</option>
                                              <option value="Cambodia" >Cambodia</option>
                                              <option value="Cameroon" >Cameroon</option>
                                              <option value="Canada" >Canada</option>
                                              <option value="Cape Verde" >Cape Verde</option>
                                              <option value="Cayman Islands" >Cayman Islands</option>
                                              <option value="Central African Republic" >Central African Republic</option>
                                              <option value="Chad" >Chad</option>
                                              <option value="Chile" >Chile</option>
                                              <option value="China" >China</option>
                                              <option value="Colombia" >Colombia</option>
                                              <option value="Comoros" >Comoros</option>
                                              <option value="Congo" >Congo</option>
                                              <option value="Costa Rica" >Costa Rica</option>
                                              <option value="Côte d'Ivoire" >Côte d'Ivoire</option>
                                              <option value="Croatia" >Croatia</option>
                                              <option value="Cuba" >Cuba</option>
                                              <option value="Curaçao" >Curaçao</option>
                                              <option value="Cyprus" >Cyprus</option>
                                              <option value="Czech Republic" >Czech Republic</option>
                                              <option value="Denmark" >Denmark</option>
                                              <option value="Djibouti" >Djibouti</option>
                                              <option value="Dominica" >Dominica</option>
                                              <option value="Dominican Republic" >Dominican Republic</option>
                                              <option value="East Timor" >East Timor</option>
                                              <option value="Ecuador" >Ecuador</option>
                                              <option value="Egypt" >Egypt</option>
                                              <option value="El Salvado" >El Salvador</option>
                                              <option value="England" >England</option>
                                              <option value="Equatorial Guinea" >Equatorial Guinea</option>
                                              <option value="Eritrea" >Eritrea</option>
                                              <option value="Estonia" >Estonia</option>
                                              <option value="Ethiopia" >Ethiopia</option>
                                              <option value="Fiji" >Fiji</option>
                                              <option value="Finland" >Finland</option>
                                              <option value="France" >France</option>
                                              <option value="French Polynesia" >French Polynesia</option>
                                              <option value="Gabon" >Gabon</option>
                                              <option value="Gambia" >Gambia</option>
                                              <option value="Georgia" >Georgia</option>
                                              <option value="Germany" >Germany</option>
                                              <option value="Ghana" >Ghana</option>
                                              <option value="Great Britain" >Great Britain</option>
                                              <option value="Greece" >Greece</option>
                                              <option value="Grenada" >Grenada</option>
                                              <option value="Guam" >Guam</option>
                                              <option value="Guatemala" >Guatemala</option>
                                              <option value="Guinea" >Guinea</option>
                                              <option value="Guinea-Bissau" >Guinea-Bissau</option>
                                              <option value="Guyana" >Guyana</option>
                                              <option value="Haiti" >Haiti</option>
                                              <option value="Honduras" >Honduras</option>
                                              <option value="Hong Kong" >Hong Kong</option>
                                              <option value="Hungary" >Hungary</option>
                                              <option value="Iceland" >Iceland</option>
                                              <option value="India" >India</option>
                                              <option value="Indonesia" >Indonesia</option>
                                              <option value="Iran" >Iran</option>
                                              <option value="Iraq" >Iraq</option>
                                              <option value="Ireland" >Ireland</option>
                                              <option value="Israel" >Israel</option>
                                              <option value="Italy" >Italy</option>
                                              <option value="Jamaica" >Jamaica</option>
                                              <option value="Japan" >Japan</option>
                                              <option value="Jordan" >Jordan</option>
                                              <option value="Kazakstan" >Kazakstan</option>
                                              <option value="Kenya" >Kenya</option>
                                              <option value="Kiribati" >Kiribati</option>
                                              <option value="Korea" >Korea</option>
                                              <option value="Kuwait" >Kuwait</option>
                                              <option value="Kyrgyzstan" >Kyrgyzstan</option>
                                              <option value="Laos" >Laos</option>
                                              <option value="Latvia" >Latvia</option>
                                              <option value="Lebanon" >Lebanon</option>
                                              <option value="Lesotho" >Lesotho</option>
                                              <option value="Liberia" >Liberia</option>
                                              <option value="Libya" >Libya</option>
                                              <option value="Liechtenstein" >Liechtenstein</option>
                                              <option value="Lithuania" >Lithuania</option>
                                              <option value="Luxembourg" >Luxembourg</option>
                                              <option value="Macau" >Macau</option>
                                              <option value="Macedonia" >Macedonia</option>
                                              <option value="Madagascar" >Madagascar</option>
                                              <option value="Malawi" >Malawi</option>
                                              <option value="Malaysia" >Malaysia</option>
                                              <option value="Maldives" >Maldives</option>
                                              <option value="Mali" >Mali</option>
                                              <option value="Malta" >Malta</option>
                                              <option value="Marshall Islands" >Marshall Islands</option>
                                              <option value="Mexico" >Mexico</option>
                                              
                                              <option value="Nepal" >Nepal</option>
                                              <option value="Netherlands" >Netherlands</option>
                                              <option value="New Zealand" >New Zealand</option>
                                            
                                              <option value="Pakistan" >Pakistan</option>
                                              <option value="181" >Palau</option>
                                              <option value="85" >Panama</option>
                                              <option value="182" >Papua New Guinea</option>
                                              <option value="86" >Paraguay</option>
                                              <option value="87" >Peru</option>
                                              <option value="Philippines" >Philippines</option>
                                              
                                              <option value="Qatar" >Qatar</option>
                                              <option value="Singapore" >Singapore</option>
                                              
                                              <option value="United Arab Emirates" >United Arab Emirates</option>
                                              <option value="United Kingdom" >United Kingdom</option>
                                              <option value="United States" >United States</option>                                            
                                             <option value="Zimbabwe" >Zimbabwe</option>
                                          </select>

                              </div>
                             
                             <div class="form-group">
                                    <label for="birthday">Date of birth</label>
                               
                                      <div class="input-group input-append date" id="dateRangePicker">
                                            <input type="date" class="form-control" name="birthday"  value=<?php echo $birthday;?> />
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                      </div
                                </div>
                              <div class="form-group">
                                <label for="website">website</label>
                                <input type="text" class="form-control" name="website" value=<?php echo $website;?>>
                              </div>
                              <div class="form-group">
                              <button type="submit" name="update_contact" class="btn btn-lg btn-success pull-right">Update contact</button>

                              </div>
                        </form>
                       </div>
                       
                    
                      
                      <div class="col-sm-2"></div>
                     
                 



                       <!-- end of the contacts body-->

                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>




    <!-- /#wrapper -->
<script>
$(document).ready(function() {
    $('#dateRangePicker')
        .datepicker({
            format: 'mm/dd/yyyy',
            startDate: '01/01/2010',
            endDate: '12/30/2020'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#dateRangeForm').formValidation('revalidateField', 'date');
        });

    $('#dateRangeForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    },
                    date: {
                        format: 'MM/DD/YYYY',
                        min: '01/01/2010',
                        max: '12/30/2020',
                        message: 'The date is not a valid'
                    }
                }
            }
        }
    });
});
</script>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

    
</html>
