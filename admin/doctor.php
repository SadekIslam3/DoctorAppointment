<?php include('includes/header.php'); ?>

<div class="manage">
    <div class = "wrapper">
        <h1>Doctor Info</h1>
        <br>
        <br>
        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        <br>
        <a href="add_doctor.php" class="btn-add">Add Doctor</a>
        <br>
        <br>
        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Doctor Name</th>
                <th>Image Name</th>
                <th>Category ID</th>
                <th>Degree</th>
                <th>Chamber</th>
                <th>Designation</th>
                <th>Day</th>
                <th>Time Schedule</th>
                <th>Floor No</th>
                <th>Room No</th>
                <th>Update/delete</th>
        
            </tr>
            <?php 

                    //Query to Get all doctors from Database
                    $sql = "SELECT * FROM doctors";

                    //Execute Query
                    $res = mysqli_query($con, $sql);

                    //Count Rows
                    $count = mysqli_num_rows($res);

                    //Check whether we have data in database or not
                    if($count>0)
                    {
                        //We have data in database
                        //get the data and display
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $doctor_id = $row['doctor_id'];
                            $doctor_name = $row['doctor_name'];
                            $image_name = $row['image_name'];
                            $catagory_id = $row['catagory_id'];
                            $degree = $row['degree'];
                            $chamder_name = $row['chamber_name'];
                            $designation = $row['designation'];
                            $day = $row['day'];
                            $time_schedule = $row['time_schedule'];
                            $floor_no = $row['floor_no'];
                            $room_no = $row['room_no'];

                            ?>
                            <tr>
                                <td style="width: 20px; text-align: center;"><?php echo  $doctor_id; ?>. </td>
                                <td style="width: 160px; text-align: center;"><?php echo $doctor_name; ?></td>
                                <td>

                                    <?php  
                                        //Chcek whether image name is available or not
                                        if($image_name!="")
                                        {
                                            //Display the Image
                                            ?>
                                                    
                                            <img src="<?php echo SITEURL; ?>images/doctor/<?php echo $image_name; ?>" width="100px" >
                                            <br>
                                            <br>
                                                    
                                            <?php
                                        }
                                        else
                                        {
                                            //DIsplay the MEssage
                                            echo "<div class='error'>Image not Added.</div>";
                                        }
                                        ?>

                                </td>
                                <td style="width: 120px; text-align: center;"><?php echo $catagory_id; ?></td>
                                <td style="width: 180px; text-align: center;"><?php echo $degree; ?></td>
                                <td style="width: 80px; text-align: center;"><?php echo $chamder_name; ?></td>
                                <td style="width: 120px; text-align: center;"><?php echo $designation; ?></td>
                                <td style="width: 120px; text-align: center;"><?php echo $day; ?></td>
                                <td style="width: 240px; text-align: center;"><?php echo $time_schedule; ?></td>
                                <td style="width: 120px; text-align: center;"><?php echo $floor_no; ?></td>
                                <td style="width: 120px; text-align: center;"><?php echo $room_no; ?></td>

                                <td style="width: 80px; padding-left: 40px;">
                                    <a href="<?php echo SITEURL; ?>admin/doctor_update.php?doctor_id=<?php echo $doctor_id; ?>" class="btn-update">Update</a>
                                    <a href="<?php echo SITEURL; ?>admin/doctor_delete.php?doctor_id=<?php echo $doctor_id; ?>&image_name=<?php echo $image_name; ?>" class="btn-delete">Delete</a>
                                </td>
                            </tr>

                            <?php

                        }
                    }
                    else
                    {
                        //WE do not have data
                        //We'll display the message inside table
                        ?>

                        <tr>
                            <td colspan="6"><div class="error">No Doctor Added.</div></td>
                        </tr>

                        <?php
                    }
                    
                ?>
        </table>
    </div>
</div>

<?php include('includes/footer.php'); ?>