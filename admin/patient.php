<?php include('includes/header.php'); ?>

<div class="manage">
    <div class = "wrapper">
        <h1>Patient Info</h1>
        <br>
        <br>
        <!--<a href="add_patient.php" class="btn-add">Add Patient</a>-->
        <br>
        <br>
        <br>
        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Patient Address</th>
                <th>Phone No</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Delate</th>
               
            </tr>

            <?php 

                    //Query to Get all user from Database
                    $sql = "SELECT * FROM user";

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
                            $user_id = $row['user_id'];
                            $full_name = $row['full_name'];
                            $address = $row['address'];
                            $phone_no = $row['phone_no'];
                            $age = $row['age'];
                            $gender = $row['gender'];

                            ?>
                            <tr>
                                <td style="width: 80px;text-align: center;"><?php echo $user_id; ?>. </td>
                                <td style="width: 140px;text-align: center;"><?php echo $full_name; ?></td>
                                <td style="width: 160px;text-align: center;"><?php echo $address; ?></td>
                                <td style="width: 140px;text-align: center;"><?php echo $phone_no; ?></td>
                                <td style="width: 140px;text-align: center;"><?php echo $age; ?></td>
                                <td style="width: 140px;text-align: center;"><?php echo $gender; ?></td>

                                <td style="width: 300px; padding-left: 140px; padding-top: 10px;">
                                    <!--<a href="<?php echo SITEURL; ?>admin/patient_update.php?user_id=<?php echo $user_id; ?>" class="btn-update">Update Patient</a>-->
                                    <a style="margin-left: 20px;" href="<?php echo SITEURL; ?>admin/patient_delete.php?user_id=<?php echo $user_id; ?>" class="btn-delete">Delete Patient</a>
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
                            <td colspan="6"><div class="error">No User Added.</div></td>
                        </tr>

                        <?php
                    }
                    
                ?>
        </table>
    </div>
</div>

<?php include('includes/footer.php'); ?>