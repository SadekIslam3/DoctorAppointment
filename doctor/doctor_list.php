<?php include('includes/header.php'); ?>
<div class="manage">
        <div class = "wrapper">
            <h1>Doctor Control</h1>
            <br>
            <br>
            <!-- Button to Add Admin -->
            <a href="doctor_add.php" class="btn-add">Add Doctor</a>
            <br>
            <br>
            <br>

            <table class="tbl-full">
                <tr>
                    <th>Doctor ID</th>
                    <th>Doctor Name</th>
                    <th>Department Name</th>
                    <th>User Name</th>
                    <th>update/delete</th>
                </tr>
                
                <?php 

                    //Query to Get all doctors from Database
                    $sql = "SELECT * FROM doctorpanel";

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
                            $depart_name = $row['depart_name'];
                            $user_name = $row['user_name'];

                            ?>
                            <tr>
                                <td style="width: 80px;text-align: center;"><?php echo  $doctor_id; ?>. </td>
                                <td style="width: 140px;text-align: center;"><?php echo $doctor_name; ?></td>
                                <td style="width: 160px;text-align: center;"><?php echo $depart_name; ?></td>
                                <td style="width: 160px;text-align: center;"><?php echo $user_name; ?></td>

                                <td style="width: 300px; padding-left: 240px; padding-top: 10px;">
                                    <a href="<?php echo SITEURL; ?>doctor/doctor_list_update.php?doctor_id=<?php echo $doctor_id; ?>" class="btn-update">Update</a>
                                    <a href="<?php echo SITEURL; ?>doctor/doctor_delete.php?doctor_id=<?php echo $doctor_id; ?>" class="btn-delete">Delete</a>
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
                            <td colspan="6"><div class="error">No  Doctor.</div></td>
                        </tr>

                        <?php
                    }
                    
                ?>
            </table>

    </div>
</div>


<?php include('includes/footer.php'); ?>