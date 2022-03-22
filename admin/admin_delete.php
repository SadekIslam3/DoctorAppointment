<?php include('../data_con/database.php'); 
    //get admin id
    $id = $_GET['id'];
    //delete data from table
    $sql = "DELETE FROM admin WHERE id=$id";

    $res = mysqli_query($con, $sql);

    if($res==TRUE){
        //echo "Admin deleted";
        $_SESSION['delete'] = "<div class='success'>Deleted successfully.</div>";
        //reirect control page
        //header("location:".SITEURL.'admin/admin-control.php');
        header("location:".SITEURL.'admin/admin.php');
    }
    else{
        //echo "Failed to delete admin";
        $_SESSION['delete'] = "<div class='error'>Failed to delete.</div>";
        //reirect control page
        //header("location:".SITEURL.'admin/admin-control.php');
        header("location:".SITEURL.'admin/admin.php');
    }
?>