<?php include('includes/header.php'); ?>
<div class="manage">
        <div class = "wrapper">
            <h1>Admin Control</h1>
            <br>
            <br>
            <!-- Button to Add Admin -->
            <a href="add_admin.php" class="btn-add">Add Admin</a>
            <br>
            <br>
            <br>

            <table class="tbl-full ">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contuct Number</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>update/delete</th>
                </tr>
                
                <?php 

                    //Query to Get all doctors from Database
                    $sql = "SELECT * FROM admin";

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
                            $id = $row['id'];
                            $name = $row['name'];
                            $number = $row['number'];
                            $email = $row['email'];
                            $user_name = $row['user_name'];
                            $password = $row['password'];

                            ?>
                            <tr>
                                <td style="width: 20px;text-align: center;"><?php echo  $id; ?>. </td>
                                <td style="width: 80px; text-align: center;"><?php echo $name; ?></td>
                                <td style="width: 130px; text-align: center;"><?php echo $number; ?></td>
                                <td style="width: 130px; text-align: center;"><?php echo $email; ?></td>
                                <td style="width: 130px; text-align: center;"><?php echo $user_name; ?></td>
                                <td style="width: 150px; text-align: center;"><?php echo $password; ?></td>

                                <td style="width: 300px; padding-left: 80px; padding-top: 10px;">
                                    <a href="<?php echo SITEURL; ?>admin/admin_update.php?id=<?php echo $id; ?>" class="btn-update">Update Admin</a>
                                    <a style="margin-left: 20px;" href="<?php echo SITEURL; ?>admin/admin_delete.php?id=<?php echo $id; ?>" class="btn-delete">Delete Admin</a>
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
                            <td colspan="6"><div class="error">No  Admin.</div></td>
                        </tr>

                        <?php
                    }
                    
                ?>
            </table>

    </div>
</div>


<?php include('includes/footer.php'); ?>