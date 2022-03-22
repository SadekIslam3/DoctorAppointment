<?php include('../data_con/database.php'); 
    //get store id
    $store_id = $_GET['store_id'];
    //delete data from table
    $sql = "DELETE FROM appointment_store WHERE store_id=$store_id";

    $res = mysqli_query($con, $sql);

    if($res==TRUE){
        //echo "Admin deleted";
        $_SESSION['delete'] = "<div class='success'>Deleted successfully.</div>";
        //reirect control page
        //header("location:".SITEURL.'admin/admin-control.php');
        header("location:".SITEURL.'doctor/appointment_search.php');
    }
    else{
        //echo "Failed to delete admin";
        $_SESSION['delete'] = "<div class='error'>Failed to delete.</div>";
        //reirect control page
        //header("location:".SITEURL.'admin/admin-control.php');
        header("location:".SITEURL.'doctor/appointment_search.php');
    }
?>