<?php include('data_con/database.php'); 
    if(isset($_SESSION['role']) && $_SESSION['role']!='1'){
        header("location:".SITEURL.'index.php');
        die();
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
                <a class="nav-link" href="appointment.php"> Register </a>
              </li>
              <li class="nav-item">
              <?php  
                              
                              if(isset($_SESSION['email_name']))
                              {
                                echo "<a class='nav-link scrollto' href='logout.php'>log Out</a>";
                              }
                              else
                              {
                                echo  "<a class='nav-link scrollto'  href='login.php'>log In</a>";
                              }
                            ?>
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
          Patient Update 
        </h2>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
        <?php 
    
    //Check whether the id is set or not
    if(isset($_GET['user_id']))
    {
        //Get the ID and all other details
        //echo "Getting the Data";
        $user_id = $_GET['user_id'];
        //Create SQL Query to get all other details
        $sql = "SELECT * FROM user WHERE user_id=$user_id";

        //Execute the Query
        $res = mysqli_query($con, $sql);

        //Count the Rows to check whether the id is valid or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //Get all the data
            $row = mysqli_fetch_assoc($res);
            $full_name = $row['full_name'];
            $address = $row['address'];
            $phone_no = $row['phone_no'];
            $email_name = $row['email_name'];
            $password = $row['password'];
            $age = $row['age'];
        }
        else
        {
            //redirect to manage category with session message
            $_SESSION['no-category-found'] = "<div class='error'>Doctor not Found.</div>";
            header('location:'.SITEURL.'patient_view.php');
        }

    }
    else
    {
        //redirect to Manage CAtegory
        header('location:'.SITEURL.'patient_view.php');
    }

?>
          <form action="" method="POST" enctype="multipart/form-data">

            <table class="table-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Address: </td>
                    <td>
                        <input type="text" name="address" value="<?php echo $address; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Phone No: </td>
                    <td>
                        <input type="text" name="phone_no" value="<?php echo $phone_no; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Email Name: </td>
                    <td>
                        <input type="text" name="email_name" value="<?php echo $email_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="text" name="password" value="<?php echo $password; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Your Age: </td>
                    <td>
                        <input type="text" name="age" value="<?php echo $age; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <input type="submit" name="submit" value="Update Patient" class="btn-update">
                    </td>
                </tr>

            </table>

</form>
      <?php 
    
        if(isset($_POST['submit']))
        {
            //echo "Clicked";
            //1. Get all the values from our form
            $user_id = $_POST['user_id'];
            $full_name = $_POST['full_name'];
            $address = $_POST['address'];
            $phone_no = $_POST['phone_no'];
            $email_name = $_POST['email_name'];
            $password = $_POST['password'];
            $age = $_POST['age'];

            //3. Update the Database
            $sql2 = "UPDATE user SET 
                full_name = '$full_name',
                address = '$address',
                phone_no = '$phone_no',
                email_name = '$email_name',
                password = '$password',
                age = '$age'
                WHERE user_id=$user_id
            ";

            //Execute the Query
            $res2 = mysqli_query($con, $sql2);

            //4. REdirect to Manage Category with MEssage
            //CHeck whether executed or not
            if($res2==true)
            {
                //Category Updated
                $_SESSION['update'] = "<div class='success'>Patient Updated Successfully.</div>";
                header('location:'.SITEURL.'patient_search.php');
            }
            else
            {
                //failed to update category
                $_SESSION['update'] = "<div class='error'>Failed to Update Doctor.</div>";
                header('location:'.SITEURL.'patient_update.php');
            }

        }
    
    ?>
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
                <a class="nav-link" href="doctorinfo.php"> Register </a>
              </li>
              <?php  
                              
                              if(isset($_SESSION['email_name']))
                              {
                                echo "<a class='nav-link scrollto' href='logout.php'>log Out</a>";
                              }
                              else
                              {
                                echo  "<a class='nav-link scrollto'  href='login.php'>log In</a>";
                              }
                            ?>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">

        </div>

      </div>
    </div>
  </section>

  <!-- end info section -->

  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <div class="container">
      <p>
        Doctor Appointment System(online Platform)
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