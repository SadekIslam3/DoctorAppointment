<?php include('includes/header.php');
        if(isset($_SESSION['role']) && $_SESSION['role']!='1'){
            header("location:".SITEURL.'doctor/index.php');
            die();
        }
?>
 <div class="manage">
        <div class = "wrapper">
            <h1>Update Doctor</h1>
            <br>
            <br>

            <?php 
                //Get ID of Admin
                $doctor_id=$_GET['doctor_id'];

                //SQL Query to Get data
                $sql="SELECT * FROM doctorpanel WHERE doctor_id=$doctor_id";

                $res=mysqli_query($con, $sql);

                if($res==TRUE){

                    // Check whether the data is available or not
                    $count = mysqli_num_rows($res);
                    //Check whether we have admin data or not
                    if($count==1){

                        // Get the Details
                        //echo "Admin Available";
                        $row=mysqli_fetch_assoc($res);

                        $doctor_name = $row['doctor_name'];
                        $depart_name = $row['depart_name'];
                        $user_name = $row['user_name'];
                    }
                    else{
                        //Redirect to Manage Admin PAge
                        header('location:'.SITEURL.'doctor/doctor_list.php');
                    }
                }
            
            ?>

            <form action="" method="POST">

                <table class="table-30">
                    <tr>
                        <td>Full Name: </td>
                        <td>
                            <input type="text" name="doctor_name" value="<?php echo $doctor_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Department Name: </td>
                        <td>
                            <input type="text" name="depart_name" value="<?php echo $depart_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" name="user_name" value="<?php echo $user_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $doctor_id; ?>">
                            <br>
                            <br>
                            <input type="submit" name="submit" value="Update Doctor" class="btn-update">
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
        $doctor_id = $_POST['doctor_id'];
        $doctor_name = $_POST['doctor_name'];
        $depart_name = $_POST['depart_name'];
        $user_name = $_POST['user_name'];

        //SQL Query to Update Admin
                
        $sql = "UPDATE doctorpanel SET `doctor_name`='$doctor_name',
        `depart_name`='$depart_name',`user_name`='$user_name' WHERE doctor_id='$doctor_id' ";

        //Execute the Query
        $res = mysqli_query($con, $sql);

        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed and Admin Updated
            $_SESSION['update'] = "<div class='success'>Doctor Updated Successfully.</div>";
            //Redirect to Admin
            header('location:'.SITEURL.'doctor/doctor_list.php');
        }
        else
        {
            //Failed to Update
            $_SESSION['update'] = "<div class='error'>Failed to Update Doctor.</div>";
            //Redirect to Admin
            header('location:'.SITEURL.'doctor/doctor_list_update.php');
        }
    }

?>