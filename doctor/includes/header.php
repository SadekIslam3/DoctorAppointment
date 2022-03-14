<?php include('../data_con/database.php'); ?>
<?php 
    //AUthorization - Access COntrol
    //CHeck whether the user is logged in or not
    if(!isset($_SESSION['user_name'])) //IF user session is not set
    {
        //User is not logged in
        //Redirect to login page with message
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Doctor Panel.</div>";
        //Redirect to Login Page
        header('location:'.SITEURL.'doctor/login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors Appointment</title>
    <!--css link-->
    <link rel="stylesheet" href="../css-backend/style.css">
</head>
<body>
    <!-- Menu Starts -->
    <div class="menu text-center">
        <div class ="footer">
         <div class="wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="doctor_list.php">Doctor</a></li>
                <li><a href="#">Patient</a></li>
                <li><a href="#">Appointment</a></li>               
                <li><a href="logout.php">Log Out</a></li>
                    
            </ul>
         </div>
        </div>
    </div>
    <!-- Menu Ends -->
