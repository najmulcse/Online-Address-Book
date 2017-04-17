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

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <?php
            $username="";
            if( isset($_SESSION['username']) ){
                       
           // header("Location: home.php");

            ?>
            <a class="navbar-brand" href="home.php">
                Online Address Book
            </a>
            <?php } else { ?>
            <a class="navbar-brand" href="index.php">
                Online Address Book
            </a>
            <?php } ?>


        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->



            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->


            <?php
            $username="";
            if( isset($_SESSION['username'])!="" ){
                $username=$_SESSION['username'];
            ?>
             
            <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <?php echo $username ;?><span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li> <a href="#"> <i class="fa  fa-btn fa-user-circle"> </i> Profile</a> </li>
                        <li><a href="logout.php"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
             <?php  } else { 
?>



                <li><a href="login.php">Login</a></li>
                <li><a href="registration.php">Register</a></li>
<?php } ?>

                


            </ul>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="add_contact_button">
                        <a class=" btn btn-success " href="addNewContacts.php"><i class="fa fa-fw fa-dashboard"></i> Add new contact</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-bar-chart-o"></i> Import</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-bar-chart-o"></i> Export</a>
                    </li>
                   
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Contacts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">List 1</a>
                            </li>
                            <li>
                                <a href="#">List 2</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-8"></div>
                            <div class="col-sm-4">
                            <form action="" method="">
                               <div class="input-group col-md-12">
                                <input type="text" class="  search-query form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                            </form>
                            </div>
                        </div>
                        <section>
                    <div class="row">
                    <div style="height: 600px;">
                        <h3 class="page-header"> <ol class="breadcrumb">   Updated the contacts  </ol>  </h3>
                       
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

                    
                    <dir class="col-sm-2"></dir>
                    <div class="col-sm-6">
                      <div style="300px; overflow: auto;">
                       <div class="panel">
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
                                              <option value="125" >Afghanistan</option>
                                              <option value="126" >Albania</option>
                                              <option value="2" >Algeria</option>
                                              <option value="128" >Andorra</option>
                                              <option value="3" >Angola</option>
                                              <option value="4" >Anguilla</option>
                                              <option value="5" >Antigua & Barbuda</option>
                                              <option value="6" >Argentina</option>
                                              <option value="7" >Armenia</option>
                                              <option value="225" >Aruba</option>
                                              <option value="8" >Australia</option>
                                              <option value="9" >Austria</option>
                                              <option value="10" >Azerbaijan</option>
                                              <option value="11" >Bahamas</option>
                                              <option value="12" >Bahrain</option>
                                              <option value="127" >Bangladesh</option>
                                              <option value="13" >Barbados</option>
                                              <option value="14" >Belarus</option>
                                              <option value="15" >Belgium</option>
                                              <option value="16" >Belize</option>
                                              <option value="17" >Bermuda</option>
                                              <option value="208" >Bhutan</option>
                                              <option value="18" >Bolivia</option>
                                              <option value="229" >Bonaire</option>
                                              <option value="129" >Bosnia & Herzegovina</option>
                                              <option value="19" >Botswana</option>
                                              <option value="20" >Brazil</option>
                                              <option value="21" >Brunei Darussalam</option>
                                              <option value="22" >Bulgaria</option>
                                              <option value="130" >Burkina Faso</option>
                                              <option value="131" >Burundi</option>
                                              <option value="132" >Cambodia</option>
                                              <option value="133" >Cameroon</option>
                                              <option value="23" >Canada</option>
                                              <option value="134" >Cape Verde</option>
                                              <option value="24" >Cayman Islands</option>
                                              <option value="135" >Central African Republic</option>
                                              <option value="136" >Chad</option>
                                              <option value="25" >Chile</option>
                                              <option value="26" >China</option>
                                              <option value="27" >Colombia</option>
                                              <option value="137" >Comoros</option>
                                              <option value="138" >Congo</option>
                                              <option value="28" >Costa Rica</option>
                                              <option value="139" >Côte d'Ivoire</option>
                                              <option value="29" >Croatia</option>
                                              <option value="140" >Cuba</option>
                                              <option value="221" >Curaçao</option>
                                              <option value="30" >Cyprus</option>
                                              <option value="31" >Czech Republic</option>
                                              <option value="32" >Denmark</option>
                                              <option value="141" >Djibouti</option>
                                              <option value="33" >Dominica</option>
                                              <option value="34" >Dominican Republic</option>
                                              <option value="142" >East Timor</option>
                                              <option value="35" >Ecuador</option>
                                              <option value="36" >Egypt</option>
                                              <option value="37" >El Salvador</option>
                                              <option value="143" >England</option>
                                              <option value="144" >Equatorial Guinea</option>
                                              <option value="145" >Eritrea</option>
                                              <option value="38" >Estonia</option>
                                              <option value="146" >Ethiopia</option>
                                              <option value="147" >Fiji</option>
                                              <option value="39" >Finland</option>
                                              <option value="40" >France</option>
                                              <option value="213" >French Polynesia</option>
                                              <option value="148" >Gabon</option>
                                              <option value="149" >Gambia</option>
                                              <option value="150" >Georgia</option>
                                              <option value="41" >Germany</option>
                                              <option value="42" >Ghana</option>
                                              <option value="151" >Great Britain</option>
                                              <option value="43" >Greece</option>
                                              <option value="44" >Grenada</option>
                                              <option value="232" >Guam</option>
                                              <option value="45" >Guatemala</option>
                                              <option value="152" >Guinea</option>
                                              <option value="153" >Guinea-Bissau</option>
                                              <option value="46" >Guyana</option>
                                              <option value="154" >Haiti</option>
                                              <option value="47" >Honduras</option>
                                              <option value="48" >Hong Kong</option>
                                              <option value="49" >Hungary</option>
                                              <option value="50" >Iceland</option>
                                              <option value="51" >India</option>
                                              <option value="52" >Indonesia</option>
                                              <option value="155" >Iran</option>
                                              <option value="156" >Iraq</option>
                                              <option value="53" >Ireland</option>
                                              <option value="54" >Israel</option>
                                              <option value="55" >Italy</option>
                                              <option value="56" >Jamaica</option>
                                              <option value="57" >Japan</option>
                                              <option value="58" >Jordan</option>
                                              <option value="59" >Kazakstan</option>
                                              <option value="60" >Kenya</option>
                                              <option value="157" >Kiribati</option>
                                              <option value="61" >Korea</option>
                                              <option value="62" >Kuwait</option>
                                              <option value="160" >Kyrgyzstan</option>
                                              <option value="161" >Laos</option>
                                              <option value="63" >Latvia</option>
                                              <option value="64" >Lebanon</option>
                                              <option value="162" >Lesotho</option>
                                              <option value="163" >Liberia</option>
                                              <option value="164" >Libya</option>
                                              <option value="165" >Liechtenstein</option>
                                              <option value="65" >Lithuania</option>
                                              <option value="66" >Luxembourg</option>
                                              <option value="67" >Macau</option>
                                              <option value="68" >Macedonia</option>
                                              <option value="69" >Madagascar</option>
                                              <option value="166" >Malawi</option>
                                              <option value="70" >Malaysia</option>
                                              <option value="167" >Maldives</option>
                                              <option value="71" >Mali</option>
                                              <option value="72" >Malta</option>
                                              <option value="168" >Marshall Islands</option>
                                              <option value="169" >Mauritania</option>
                                              <option value="73" >Mauritius</option>
                                              <option value="74" >Mexico</option>
                                              <option value="170" >Micronesia</option>
                                              <option value="75" >Moldova</option>
                                              <option value="171" >Monaco</option>
                                              <option value="172" >Mongolia</option>
                                              <option value="173" >Montenegro</option>
                                              <option value="76" >Montserrat</option>
                                              <option value="174" >Morocco</option>
                                              <option value="175" >Mozambique</option>
                                              <option value="176" >Myanmar</option>
                                              <option value="177" >Namibia</option>
                                              <option value="178" >Nauru</option>
                                              <option value="179" >Nepal</option>
                                              <option value="77" >Netherlands</option>
                                              <option value="78" >New Zealand</option>
                                              <option value="79" >Nicaragua</option>
                                              <option value="80" >Niger</option>
                                              <option value="81" >Nigeria</option>
                                              <option value="158" >North Korea</option>
                                              <option value="82" >Norway</option>
                                              <option value="83" >Oman</option>
                                              <option value="84" >Pakistan</option>
                                              <option value="181" >Palau</option>
                                              <option value="85" >Panama</option>
                                              <option value="182" >Papua New Guinea</option>
                                              <option value="86" >Paraguay</option>
                                              <option value="87" >Peru</option>
                                              <option value="88" >Philippines</option>
                                              <option value="89" >Poland</option>
                                              <option value="90" >Portugal</option>
                                              <option value="209" >Puerto Rico</option>
                                              <option value="91" >Qatar</option>
                                              <option value="92" >Romania</option>
                                              <option value="93" >Russia</option>
                                              <option value="183" >Rwanda</option>
                                              <option value="210" >Saint John, U.S. Virgin Islands </option>
                                              <option value="94" >Saint Kitts & Nevis</option>
                                              <option value="95" >Saint Lucia</option>
                                              <option value="230" >Saint Martin</option>
                                              <option value="96" >Saint Vincent and The Grenadines</option>
                                              <option value="184" >Samoa</option>
                                              <option value="185" >San Marino</option>
                                              <option value="186" >São Tomé & Príncipe</option>
                                              <option value="97" >Saudi Arabia</option>
                                              <option value="98" >Senegal</option>
                                              <option value="188" >Serbia</option>
                                              <option value="189" >Seychelles</option>
                                              <option value="190" >Sierra Leone</option>
                                              <option value="99" >Singapore</option>
                                              <option value="231" >Sint Maarten</option>
                                              <option value="100" >Slovakia</option>
                                              <option value="101" >Slovenia</option>
                                              <option value="191" >Solomon Islands</option>
                                              <option value="192" >Somalia</option>
                                              <option value="102" >South Africa</option>
                                              <option value="159" >South Kosovo</option>
                                              <option value="194" >South Sudan</option>
                                              <option value="103" >Spain</option>
                                              <option value="104" >Sri Lanka</option>
                                              <option value="193" >Sudan</option>
                                              <option value="105" >Suriname</option>
                                              <option value="106" >Sweden</option>
                                              <option value="107" >Switzerland</option>
                                              <option value="195" >Syria</option>
                                              <option value="108" >Taiwan</option>
                                              <option value="196" >Tajikistan</option>
                                              <option value="109" >Tanzania</option>
                                              <option value="110" >Thailand</option>
                                              <option value="197" >Togo</option>
                                              <option value="198" >Tonga</option>
                                              <option value="111" >Trinidad & Tobago</option>
                                              <option value="112" >Tunisia</option>
                                              <option value="113" >Turkey</option>
                                              <option value="199" >Turkmenistan</option>
                                              <option value="114" >Turks & Caicos Islands</option>
                                              <option value="200" >Tuvalu</option>
                                              <option value="115" >Uganda</option>
                                              <option value="201" >Ukraine</option>
                                              <option value="116" >United Arab Emirates</option>
                                              <option value="117" >United Kingdom</option>
                                              <option value="1" >United States</option>
                                              <option value="119" >Uruguay</option>
                                              <option value="120" >Uzbekistan</option>
                                              <option value="202" >Vanuatu</option>
                                              <option value="203" >Vatican City</option>
                                              <option value="121" >Venezuela</option>
                                              <option value="122" >Vietnam</option>
                                              <option value="123" >Virgin Islands, British</option>
                                              <option value="124" >Yemen</option>
                                              <option value="205" >Zaire</option>
                                              <option value="206" >Zambia</option>
                                              <option value="207" >Zimbabwe</option>
                                          </select>

                              </div>
                             
                             <div class="form-group">
                                    <label for="birthday">Date of birth</label>
                               
                                      <div class="input-group input-append date" id="dateRangePicker">
                                            <input type="text" class="form-control" name="birthday"  value=<?php echo $birthday;?> />
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                      </div
                                </div>
                              <div class="form-group">
                                <label for="website">website</label>
                                <input type="text" class="form-control" name="website" value=<?php echo $website;?>>
                              </div>
                              <div class="form-group">
                              <button type="submit" name="update_contact" class="btn btn-lg btn-success pull-right">Edit contact</button>

                              </div>
                        </form>
                       </div>
                       </div>
                      </div>
                      </div>
                      <div class="col-sm-4"></div>
                      </div>
                 </section>



                       <!-- end of the contacts body-->

                    </div>
                </div>
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
