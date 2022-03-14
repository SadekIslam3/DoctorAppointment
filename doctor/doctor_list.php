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
                    <th>Username</th>
                    <th>Password</th>
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
                            $password = $row['password'];

                            ?>
                            <tr>
                                <td><?php echo  $doctor_id; ?>. </td>
                                <td><?php echo $doctor_name; ?></td>
                                <td><?php echo $depart_name; ?></td>
                                <td><?php echo $user_name; ?></td>
                                <td><?php echo $password; ?></td>

                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-update">Update Admin</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $$id; ?>" class="btn-delete">Delete Admin</a>
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