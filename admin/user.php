<?php include('includes/header.php'); ?>

<div class="manage">
    <div class = "wrapper">
        <h1>Patient Info</h1>
        <br>
        <br>
        <a href="" class="btn-add">Update/Delete</a>
        <br>
        <br>
        <table class="tbl-full">
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>User Address</th>
                <th>Phone No</th>
                <th>Age</th>
                <th>Gender</th>
               
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
                                <td><?php echo $user_id; ?>. </td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $address; ?></td>
                                <td><?php echo $phone_no; ?></td>
                                <td><?php echo $age; ?></td>
                                <td><?php echo $gender; ?></td>

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