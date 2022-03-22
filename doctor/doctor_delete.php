<?php include('../data_con/database.php'); 
    //get doctor id
    $doctor_id = $_GET['doctor_id'];
    //delete data from table
    $sql = "DELETE FROM doctorpanel WHERE doctor_id=$doctor_id";

    $res = mysqli_query($con, $sql);

    if($res==TRUE){
        //echo "Admin deleted";
        $_SESSION['delete'] = "<div class='success'>Deleted successfully.</div>";
        //reirect control page
        //header("location:".SITEURL.'admin/admin-control.php');
        header("location:".SITEURL.'doctor/doctor_list.php');
    }
    else{
        //echo "Failed to delete admin";
        $_SESSION['delete'] = "<div class='error'>Failed to delete.</div>";
        //reirect control page
        //header("location:".SITEURL.'admin/admin-control.php');
        header("location:".SITEURL.'doctor/doctor_list.php');
    }
?>