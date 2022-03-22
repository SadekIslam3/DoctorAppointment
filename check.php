<?php include('includes/header.php'); ?>

<?php
    if(!isset($_SESSION['email_name']))
    {
        echo"<script> window.open('index.php','_self')</script>";
    }
    else
    {
        include('appointment.php');

    }
?>
