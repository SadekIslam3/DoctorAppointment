<?php 
$con = mysqli_connect('localhost', 'root', '') or die(mysqli_error()); 
//selecting database
$db_select = mysqli_select_db($con, 'doctor-appointment') or die(mysqli_error());

?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/s4.png" type="image/x-icon">

  <title>Doctor Appointment System</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
  <!-- nice select -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
  <!-- datepicker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
        
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
            <ul class="navbar-nav  ml-auto">
            </ul>
            
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

   <!-- book section -->
   


  <section class="book_section layout_padding">
  <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Appointment Section
        </h2>
      </div>
    </div>
    <?php 
    //CHeck whether id is set or not 
    if(isset($_GET['doctor_id']))
    {
        //Get all the details
        $id = $_GET['doctor_id'];

        //SQL Query to Get the Selected Food
        $sql2 = "SELECT * FROM doctors WHERE doctor_id=$id";
        //execute the Query
        $res2 = mysqli_query($con, $sql2);

        //Get the value based on query executed
        $row2 = mysqli_fetch_array($res2);

        //Get the Individual Values of Selected Food
        $doctor_name = $row2['doctor_name'];
        $catagory_id = $row2['catagory_id'];

        $sql3 = "SELECT * FROM category WHERE category_id=$catagory_id";
        $res3 = mysqli_query($con, $sql3);
        $row3 = mysqli_fetch_array($res3);
        $catagory_name = $row3['category_name'];

        $users=$_SESSION['email_name'];
        //echo $user;
        $sql9 = "SELECT * FROM user WHERE email_name='$users'";
        
        $res9 = mysqli_query($con, $sql9);
        
        $row9 = mysqli_fetch_array($res9);
        
        $user_id = $row9['user_id'];
        $full_name = $row9['full_name'];
        $address = $row9['address'];
        $phone_no = $row9['phone_no'];
        $gender = $row9['gender'];
        }
    else
    {
        //Redirect to Manage Food
        //header('location:'.SITEURL.'catagories.php');
    }
?>
    <div class="container">
      <div class="row">
        <div class="col">
          <form action = "" method="POST">
            <h4>
              <span class="design_dot"></span>
              APPOINTMENT SET
            </h4>
			  <div class="form-row ">
				  <div class="form-group col-lg-4">
					<label for="inputSymptoms">Symptoms</label>
					<input type="text" name="symptoms" class="form-control" id="inputSymptoms" placeholder="">
				  </div>
				  <div class="form-group col-lg-4">
					<label for="inputDoctorName">Doctor's Name</label>
					<p type="text" name="doctor_name" class="form-control" id="inputDoctorName" placeholder=""><?php echo $doctor_name ?></p>
				  </div>
			  </div>
			  <div class="form-row ">
				  <div class="form-group col-lg-4">
					<label for="inputDepartmentName">Department's Name</label><br>
          <p type="text" name = "catagory_name"class="form-control" id="inputDepartName" placeholder=""><?php echo $catagory_name ?></p>
					
				  </div>
				  <div class="form-group col-lg-4">
					<label for="inputDate">Choose Date </label>
					<div class="input-group date" id="inputDate" data-date-format="mm-dd-yyyy">
					  <input type="text" name="date" class="form-control" readonly>
					  <span class="input-group-addon date_icon">
						<i class="fa fa-calendar" aria-hidden="true"></i>
					  </span>
					</div>
				  </div>
          </div>
        <div class="form-row ">
				<div class="btn-box">
				  <button type="submit" name="submit" class="btn ">Submit Now</button>
				</div>
        <div class="btn-box" style="margin-left: 10px;">
				  <button type="submit" class="btn ">View Now</button>
				</div>
        </div>
        </form>
        <?php 

          //CHeck whether the button is clicked or not
          if(isset($_POST['submit']))
          {
              //Add the Food in Database
              //echo "Clicked";
              
              //1. Get the DAta from Form
              $symptoms = $_POST['symptoms'];
              $date = $_POST['date'];
              //$doctor_name=$_POST['doctor_name'];
              //$catagory_name=$_POST['catagory_name'];
              
              $sql6="INSERT INTO `patient_appointment`( `patient_name`, `patient_address`, `phone_no`, `gender`, `symptom`, `doctor_name`, `depart_name`, `date`)
               VALUES ('$full_name','$address','$phone_no','$gender','$symptoms','$doctor_name','$catagory_name','$date' )";

              $res6 = mysqli_query($con, $sql6);

                //CHeck whether data inserted or not
                //4. Redirect with MEssage to Manage Food page
                if($res6==true)
                {
                    //Data inserted Successfullly
                    $_SESSION['add'] = "<div class='success'>Added Successfully.</div>";
                    
                    echo"<script> window.open('index.php','_self')</script>";
                    
                }
                else
                {
                    //FAiled to Insert Data
                    $_SESSION['add'] = "<div class='error'>Failed to Add .</div>";
                    header('location:'.SITEURL.'index.php');
                }
                
            }

        ?>
        </div>
      </div>
    </div>
  </section>

  <!-- end book section -->

  <!-- info section -->
  <section class="info_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_menu">
            <ul class="navbar-nav  ">
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_course">
            
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- end info section -->

  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <div class="container">
    </div>
  </footer>
  <!-- footer section -->

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
  <!-- datepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->
</body>

</html>