<?php include('includes/header.php');
        if(isset($_SESSION['role']) && $_SESSION['role']!='1'){
            header("location:".SITEURL.'admin/index.php');
            die();
        }
?>
<div class="manage">
   <div class="wrapper">
     <h1>Update Doctor</h1>
     <br>
    <?php 
    
        //Check whether the id is set or not
        if(isset($_GET['doctor_id']))
        {
            //Get the ID and all other details
            //echo "Getting the Data";
            $doctor_id = $_GET['doctor_id'];
            //Create SQL Query to get all other details
            $sql = "SELECT * FROM doctors WHERE doctor_id=$doctor_id";

            //Execute the Query
            $res = mysqli_query($con, $sql);

            //Count the Rows to check whether the id is valid or not
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                //Get all the data
                $row = mysqli_fetch_assoc($res);
                $doctor_name = $row['doctor_name'];
                $current_image = $row['image_name'];
                $degree = $row['degree'];
                $chamber_name = $row['chamber_name'];
                $designation = $row['designation'];
                $day = $row['day'];
                $time_schedule = $row['time_schedule'];
                $floor_no = $row['floor_no'];
                $room_no = $row['room_no'];
            }
            else
            {
                //redirect to manage category with session message
                $_SESSION['no-category-found'] = "<div class='error'>Doctor not Found.</div>";
                header('location:'.SITEURL.'admin/doctor.php');
            }

        }
        else
        {
            //redirect to Manage CAtegory
            header('location:'.SITEURL.'admin/doctor.php');
        }
    
    ?>

    <form action="" method="POST" enctype="multipart/form-data">

        <table class="table-30">
            <tr>
                <td>Doctor Name: </td>
                <td>
                    <input type="text" name="doctor_name" value="<?php echo $doctor_name; ?>">
                </td>
            </tr>

            <tr>
                <td>Current Image: </td>
                <td>
                    <?php 
                        if($current_image != "")
                        {
                            //Display the Image
                            ?>
                            <img src="<?php echo SITEURL; ?>images/doctor/<?php echo $current_image; ?>" width="150px">
                            <?php
                        }
                        else
                        {
                            //Display Message
                            echo "<div class='error'>Image Not Added.</div>";
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>New Image: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>
            <tr>
                <td>Degree: </td>
                <td>
                    <input type="text" name="degree" value="<?php echo $degree; ?>">
                </td>
            </tr>
            <tr>
                <td>Chamber Name: </td>
                <td>
                    <input type="text" name="chamber_name" value="<?php echo $chamber_name; ?>">
                </td>
            </tr>
            <tr>
                <td>Designation: </td>
                <td>
                    <input type="text" name="designation" value="<?php echo $designation; ?>">
                </td>
            </tr>
            <tr>
                <td>Day: </td>
                <td>
                    <input type="text" name="day" value="<?php echo $day; ?>">
                </td>
            </tr>
            <tr>
                <td>Time Schedule: </td>
                <td>
                    <input type="text" name="time_schedule" value="<?php echo $time_schedule; ?>">
                </td>
            </tr>
            <tr>
                <td>Floor No: </td>
                <td>
                    <input type="text" name="floor_no" value="<?php echo $floor_no; ?>">
                </td>
            </tr>
            <tr>
                <td>Room No: </td>
                <td>
                    <input type="text" name="room_no" value="<?php echo $room_no; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>">
                    <br>
                    <br>
                    <input type="submit" name="submit" value="Update Doctor" class="btn-update">
                </td>
            </tr>

        </table>

    </form>

    <?php 
    
        if(isset($_POST['submit']))
        {
            //echo "Clicked";
            //1. Get all the values from our form
            $doctor_id = $_POST['doctor_id'];
            $doctor_name = $_POST['doctor_name'];
            $current_image = $_POST['current_image'];

            //2. Updating New Image if selected
            //Check whether the image is selected or not
            if(isset($_FILES['image']['name']))
            {
                //Get the Image Details
                $image_name = $_FILES['image']['name'];

                //Check whether the image is available or not
                if($image_name != "")
                {
                    //Image Available

                    //A. UPload the New Image

                    //Auto Rename our Image
                    //Get the Extension of our image (jpg, png, gif, etc) e.g. "specialfood1.jpg"
                    $ext = end(explode('.', $image_name));

                    //Rename the Image
                    $image_name = "Doctor_".rand(000, 999).'.'.$ext; // e.g. Category_834.jpg
                    

                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../images/doctor/".$image_name;

                    //Finally Upload the Image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //Check whether the image is uploaded or not
                    //And if the image is not uploaded then we will stop the process and redirect with error message
                    if($upload==false)
                    {
                        //SEt message
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                        //Redirect to Add Category Page
                        header('location:'.SITEURL.'admin/doctor.php');
                        //STop the Process
                        die();
                    }

                    //B. Remove the Current Image if available
                    if($current_image!="")
                    {
                        $remove_path = "../images/doctor/".$current_image;

                        $remove = unlink($remove_path);

                        //CHeck whether the image is removed or not
                        //If failed to remove then display message and stop the processs
                        if($remove==false)
                        {
                            //Failed to remove image
                            $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current Image.</div>";
                            header('location:'.SITEURL.'admin/doctor.php');
                            die();//Stop the Process
                        }
                    }
                    

                }
                else
                {
                    $image_name = $current_image;
                }
            }
            else
            {
                $image_name = $current_image;
            }
            $degree = $_POST['degree'];
            $chamber_name = $_POST['chamber_name'];
            $designation = $_POST['designation'];
            $day = $_POST['day'];
            $time_schedule = $_POST['time_schedule'];
            $floor_no = $_POST['floor_no'];
            $room_no = $_POST['room_no'];

            //3. Update the Database
            $sql2 = "UPDATE doctors SET 
                doctor_name = '$doctor_name',
                image_name = '$image_name',
                degree = '$degree',
                chamber_name = '$chamber_name',
                designation = '$designation',
                day = '$day',
                time_schedule = '$time_schedule',
                floor_no = '$floor_no',
                room_no = '$room_no'
                WHERE doctor_id=$doctor_id
            ";

            //Execute the Query
            $res2 = mysqli_query($con, $sql2);

            //4. REdirect to Manage Category with MEssage
            //CHeck whether executed or not
            if($res2==true)
            {
                //Category Updated
                $_SESSION['update'] = "<div class='success'>Doctor Updated Successfully.</div>";
                header('location:'.SITEURL.'admin/doctor.php');
            }
            else
            {
                //failed to update category
                $_SESSION['update'] = "<div class='error'>Failed to Update Doctor.</div>";
                header('location:'.SITEURL.'admin/doctor_update.php');
            }

        }
    
    ?>

</div>
</div>
<?php include('includes/footer.php'); ?>