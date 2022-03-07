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
                <a class="nav-link" href="doctorinfo.php"> Doctor </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="appointment.php"> Appointment </a>
              </li>
			        <li class="nav-item">
                <a class="nav-link" href="appointment.php"> Search </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="appointment.php"> SingIn </a>
              </li>
            </ul>
            
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

   <!-- information section -->

  <section class="book_section layout_padding">
  <div class="container">
      <div class="heading_container heading_center">
        <h2>
          <span class="design_dot"></span>
          Doctor Section
        </h2>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <form>
            <h4>
              <span class="design_dot"></span>
              DOCTOR INFORMATION
            </h4>
            <div class="form-row ">
			  <div class="form-group col-lg-4">
                <label for="inputSlNo">SL NO </label>
                <input type="text" class="form-control" id="inputid" placeholder="">
              </div>
			  <div class="form-group col-lg-4">
                <label for="inputDoctorName">Doctor's Name</label>
				<input type="text" class="form-control" id="inputname" placeholder="">
                
              </div>
              <div class="form-group col-lg-4">
                <label for="inputDegree">Degree </label>
                <input type="text" class="form-control" id="inputPatientName" placeholder="">
              </div>
              
              <div class="form-group col-lg-4">
                <label for="inputDepartmentName">Department's Name</label>
                <select name="" class="form-control wide" id="inputDepartmentName">
                  <option value="Normal distribution ">Cardiology </option>
				  <option value="Normal distribution ">Medecine </option>
                  <option value="Normal distribution ">Surgery </option>
                  <option value="Normal distribution ">First Aid </option>
                </select>
              </div>
			  <div class="form-group col-lg-4">
                <label for="inputDesignation">Designation</label>
                <input type="text" class="form-control" id="inputDesignation" placeholder="">
              </div>
			  <div class="form-group col-lg-4">
                <label for="inputChamberName">Chamber Name</label>
                <input type="text" class="form-control" id="inputChamberName" placeholder="">
              </div>
            </div>
            <div class="form-row ">
              <div class="form-group col-lg-4">
                <label for="inputDay">Day</label>
                <input type="text" class="form-control" id="inputDay" placeholder="">
              </div>
              <div class="form-group col-lg-4">
                <label for="inputTimeSchedule">Time Schedule</label>
                <input type="text" class="form-control" id="inputSymptoms" placeholder="">
              </div>
			  <div class="form-group col-lg-4">
                <label for="inputFloor">Floor No</label>
                <input type="text" class="form-control" id="inputFloor" placeholder="">
              </div>
            </div>
			<div class="form-row ">
				<div class="form-group col-lg-4">
					<label for="inputRoom">Room No</label>
					<input type="text" class="form-control" id="inputRoom" placeholder="">
				  </div>
			</div>
            <div class="btn-box">
              <button type="submit" class="btn ">Save Now</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- end information section -->

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
              <li class="nav-item">
                <a class="nav-link" href="appointment.php"> Appointment </a>
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