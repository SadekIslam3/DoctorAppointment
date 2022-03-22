<?php include('includes/header.php');
        if(isset($_SESSION['role']) && $_SESSION['role']!='1'){
            header("location:".SITEURL.'doctor/index.php');
            die();
        }
?>
 <div class="manage">
        <div class = "wrapper">
            <h1>Update Appointment</h1>
            <br>
            <br>

            <?php 
                //Get ID of Admin
                $appointment_id=$_GET['appointment_id'];

                //SQL Query to Get data
                $sql="SELECT * FROM patient_appointment WHERE appointment_id=$appointment_id";

                $res=mysqli_query($con, $sql);

                if($res==TRUE){

                    // Check whether the data is available or not
                    $count = mysqli_num_rows($res);
                    //Check whether we have admin data or not
                    if($count==1){

                        // Get the Details
                        //echo "Admin Available";
                        $row=mysqli_fetch_assoc($res);

                        $date = $row['date'];
                    }
                    else{
                        //Redirect to Manage Admin PAge
                        header('location:'.SITEURL.'doctor/patient_search.php');
                    }
                }
            
            ?>

            <form action="" method="POST">

                <table class="table-30">
                    <tr>
                        <td>Date Update: </td>
                        <td>
                            <input type="text" name="date" value="<?php echo $date; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="appointment_id" value="<?php echo $appointment_id; ?>">
                            <br>
                            <br>
                            <input type="submit" name="submit" value="Update Admin" class="btn-update">
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
        $appointment_id = $_POST['appointment_id'];
        $date = $_POST['date'];

        //SQL Query to Update Admin
                
        $sql = "UPDATE patient_appointment SET `date`='$date' WHERE appointment_id='$appointment_id' ";

        //Execute the Query
        $res = mysqli_query($con, $sql);

        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed and Admin Updated
            $_SESSION['update'] = "<div class='success'>Updated Successfully.</div>";
            //Redirect to Admin
            header('location:'.SITEURL.'doctor/patient_search.php');
        }
        else
        {
            //Failed to Update
            $_SESSION['update'] = "<div class='error'>Failed to Update.</div>";
            //Redirect to Admin
            header('location:'.SITEURL.'doctor/patient_appointment_update.php');
        }
    }

?>