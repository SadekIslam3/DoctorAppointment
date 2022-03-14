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
        <a href="add_doctor.php" class="btn-add">Add Doctor</a>
        <br>
        <br>
        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Doctor Name</th>
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
                                <td><?php echo  $doctor_id; ?>. </td>
                                <td><?php echo $doctor_name; ?></td>
                                <td><?php echo $catagory_id; ?></td>
                                <td><?php echo $degree; ?></td>
                                <td><?php echo $chamder_name; ?></td>
                                <td><?php echo $designation; ?></td>
                                <td><?php echo $day; ?></td>
                                <td><?php echo $time_schedule; ?></td>
                                <td><?php echo $floor_no; ?></td>
                                <td><?php echo $room_no; ?></td>

                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-doctor.php?id=<?php echo $doctor_id; ?>" class="btn-update">Update Doctor</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-doctor.php?id=<?php echo $$doctor_id; ?>" class="btn-delete">Delete Doctor</a>
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