<?php include('includes/header.php');
        if(isset($_SESSION['role']) && $_SESSION['role']!='1'){
            header("location:".SITEURL.'admin/index.php');
            die();
        }
?>
 <div class="manage">
        <div class = "wrapper">
            <h1>Update Admin</h1>
            <br>
            <br>

            <?php 
                //Get ID of Admin
                $id=$_GET['id'];

                //SQL Query to Get data
                $sql="SELECT * FROM admin WHERE id=$id";

                $res=mysqli_query($con, $sql);

                if($res==TRUE){

                    // Check whether the data is available or not
                    $count = mysqli_num_rows($res);
                    //Check whether we have admin data or not
                    if($count==1){

                        // Get the Details
                        //echo "Admin Available";
                        $row=mysqli_fetch_assoc($res);

                        $name = $row['name'];
                        $number = $row['number'];
                        $email = $row['email'];
                        $user_name = $row['user_name'];
                    }
                    else{
                        //Redirect to Manage Admin PAge
                        header('location:'.SITEURL.'admin/admin.php');
                    }
                }
            
            ?>

            <form action="" method="POST">

                <table class="table-30">
                    <tr>
                        <td>Full Name: </td>
                        <td>
                            <input type="text" name="full_name" value="<?php echo $name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Contact Number: </td>
                        <td>
                            <input type="text" name="contact_number" value="<?php echo $number; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td>
                            <input type="text" name="email" value="<?php echo $email; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" name="username" value="<?php echo $user_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
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
        $id = $_POST['id'];
        $name = $_POST['full_name'];
        $number = $_POST['contact_number'];
        $email = $_POST['email'];
        $user_name = $_POST['username'];

        //SQL Query to Update Admin
                
        $sql = "UPDATE admin SET `name`='$name',
        `number`='$number',`email`='$email',`user_name`='$user_name' WHERE id='$id' ";

        //Execute the Query
        $res = mysqli_query($con, $sql);

        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed and Admin Updated
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            //Redirect to Admin
            header('location:'.SITEURL.'admin/admin.php');
        }
        else
        {
            //Failed to Update
            $_SESSION['update'] = "<div class='error'>Failed to Update Admin.</div>";
            //Redirect to Admin
            header('location:'.SITEURL.'admin/admin_update.php');
        }
    }

?>