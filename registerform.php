<?php include('data_con/database.php'); ?>
<?php
    if(isset($_POST['submit'])){
        //data from form
        $full_name = $_POST['full_name'];
        $address = $_POST['address'];
        $phone_no = $_POST['phone_no'];
        $email_name = $_POST['email_name'];
        $password = $_POST['password'];
        $age = $_POST['age'];
		    $gender = $_POST['gender'];

        

        $errors = array();

        $e = "SELECT email FROM user WHERE email_name = '$email_name' ";
        $ee = mysqli_query($con, $e);
        

        if(empty($email_name)){
            $errors['e']= "email required";
        }else if(mysqli_num_rows($ee)>0){
            $errors['e']= "email exits";
        }
        if(empty($password)){
            $errors['p']= "password required";
        }
		if(isset($_POST['gender']))
        {
            $gender = $_POST['gender'];
        }
        else if(isset($_POST['gender']))
        {
            $gender = $_POST['female'];
        }
		else 
		{
			$gender = "other";
		}

        //sql quary
        if(count($errors)==0){
          

            $sql = "INSERT INTO user (`full_name`, `address`, `phone_no`, `email_name`, `password`, `age`,`gender`) 
            VALUES ('$full_name','$address','$phone_no','$email_name','$password','$age','$gender')";
            

            $res = mysqli_query($con, $sql);

            //Check whether data is inserted or not
            if($res==TRUE){
                    //Data Inserted
                    //echo "Data Inserted";
                    //Create a Session Variable to Display Message
                    $_SESSION['add'] = "<div class='success'>User Added Successfully.</div>";
                    //Redirect Page to Manage Admin
                    header("location:".SITEURL.'login.php');
            }
            else
            {
                //FAiled to Insert DAta
                //echo "Faile to Insert Data";
                //Create a Session Variable to Display Message
                $_SESSION['add'] = "<div class='error'>Failed to Add .</div>";
                //Redirect Page to Add Admin
                header("location:".SITEURL.'registerform.php');
            }
        }
    }

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
              <li class="nav-item ">
                <a class="nav-link" href="index.php">Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="catagories.php"> Catagories </a>
              </li>
			        <li class="nav-item">
                <a class="nav-link" href="#"> Search </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="appointment.php"> Register </a>
              </li>
            </ul>
            
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

   <!-- registreation section -->

  <section class="book_section layout_padding">
  <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Registeration Section
        </h2>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <form action="" method ="POST" >
            <h4>
              <span class="design_dot"></span>
              Registeration Form
            </h4>
            <div class="form-row ">
			        <div class="form-group col-lg-4">
                <label for="inpuName">Full Name</label>
                <input type="text" class="form-control" name="full_name" placeholder="" required>
              </div>
            <div class="form-group col-lg-4">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" name="address" placeholder="" required>
            </div>
			      <div class="form-group col-lg-4">
                <label for="inputPhoneNo">Phone no </label>
                <input type="text" class="form-control" name="phone_no" placeholder="" required>
            </div>
			  </div>
			  <div class="form-row ">
				  <div class="form-group col-lg-4">
					<label for="inputEmail">Email</label>
					<input type="text" class="form-control" name="email_name" placeholder="">
				  </div>
				  <div class="form-group col-lg-4">
					<label for="inputPassword">Password</label>
					<input type="text" class="form-control" name="password" placeholder="">
				  </div>
				  <div class="form-group col-lg-4">
					<label for="inputAge">Your age</label>
					<input type="text" class="form-control" name="age" placeholder="" required>
				  </div>
			  </div>
			<div class="form-row ">
              <p class="gender" style="font-size: 16px; font-weight: 800;">Gender : </p>
		    <div class="radio_button">
                <input type="radio" placeholder="Address" name="gender" value="male">Male
                <input type="radio" placeholder="Address" name="gender" value="female">Female
                <input type="radio" placeholder="Address" name="gender" value="other">Other
	        </div>
        </div>
            <div class="input-group">
				      <button type = "submit" name="submit" class="btn">Register</button>
			      </div>
      </form>
        </div>
      </div>
    </div>
  </section>

  <!-- end registreation section -->

  <!-- info section -->
  <section class="info_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_menu">
            <h5>
              QUICK LINKS
            </h5>
            <ul class="navbar-nav  ">
              <li class="nav-item ">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="catagories.php"> Catagories </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="doctorinfo.php"> Doctor </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_course">
            <h5>
              Doctor Appointment System
            </h5>
            <p>
              There are many variations of passages of Lorem Ipsum available,
              but the majority have suffered alteration in some form, by
              injected humou
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- end info section -->

  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
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