<?php include('includes/header.php'); ?>

<?php
    if(!isset($_SESSION['email_name']))
    {
        include('login.php');
    }
    else
    {
        include('appointment.php');

    }
?>
<?php include('includes/footer.php'); ?>