<?php include('includes/header.php');
        if(isset($_SESSION['role']) && $_SESSION['role']!='1'){
            header("location:".SITEURL.'doctor/index.php');
            die();
        }
?>
 <div class="manage">
        <div class = "wrapper">
            <h1>Update Appointment Store</h1>
            <br>
            <br>

            <?php 
                //Get ID of Admin
                $store_id=$_GET['store_id'];

                //SQL Query to Get data
                $sql="SELECT * FROM appointment_store WHERE store_id=$store_id";

                $res=mysqli_query($con, $sql);

                if($res==TRUE){

                    // Check whether the data is available or not
                    $count = mysqli_num_rows($res);
                    //Check whether we have admin data or not
                    if($count==1){

                        // Get the Details
                        //echo "Admin Available";
                        $row=mysqli_fetch_assoc($res);

                        $medicine_name = $row['medicine_name'];
                    }
                    else{
                        //Redirect to Manage Admin PAge
                        header('location:'.SITEURL.'doctor/appointment_search.php');
                    }
                }
            
            ?>

            <form action="" method="POST">

                <table class="table-30">
                    <tr>
                        <td>Medicine Name: </td>
                        <td>
                            <input type="text" name="medicine_name" value="<?php echo $medicine_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="store_id" value="<?php echo $store_id; ?>">
                            <br>
                            <br>
                            <input type="submit" name="submit" value="Update StoreAppointment" class="btn-update">
                        </td>
                    </tr>
                </table>
                
            </form>

        </div>
    </div>
    <?php include('includes/footer.php'); ?>

    <?php 

    //Check whether the Submit Button is Clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button CLicked";
        //Get all the values from form to update
        $store_id = $_POST['store_id'];
        $medicine_name = $_POST['medicine_name'];

        //SQL Query to Update Admin
                
        $sql = "UPDATE appointment_store SET `medicine_name`='$medicine_name' WHERE store_id='$store_id'";

        //Execute the Query
        $res = mysqli_query($con, $sql);

        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed and Admin Updated
            $_SESSION['update'] = "<div class='success'>Updated Successfully.</div>";
            //Redirect to Admin
            header('location:'.SITEURL.'doctor/appointment_search.php');
        }
        else
        {
            //Failed to Update
            $_SESSION['update'] = "<div class='error'>Failed to Update.</div>";
            //Redirect to Admin
            header('location:'.SITEURL.'doctor/appointment_store_update.php');
        }
    }

?>