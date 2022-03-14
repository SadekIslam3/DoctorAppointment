<?php include('includes/header.php'); ?>

<div class="manage">
    <div class = "wrapper">
        <h1>Category View</h1>
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

            <!-- Button to Add category -->
            <a href="<?php echo SITEURL;?>admin/add_catagory.php" class="btn-add">Add Catregory</a>
            <br>
            <br>
            <br>
        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Image</th>
                <th>Update/delete</th>
            </tr>
            <?php 

                    //Query to Get all Categories from Database
                    $sql = "SELECT * FROM category";

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
                            $category_id = $row['category_id'];
                            $category_name = $row['category_name'];
                            $image_name = $row['image_name'];

                            ?>
                            <tr>
                                <td><?php echo $category_id; ?>. </td>
                                <td><?php echo $category_name; ?></td>

                                <td>

                                    <?php  
                                        //Chcek whether image name is available or not
                                        if($image_name!="")
                                        {
                                            //Display the Image
                                            ?>
                                                    
                                            <img src="<?php echo SITEURL; ?>images/catagory/<?php echo $image_name; ?>" width="100px" >
                                                    
                                            <?php
                                        }
                                        else
                                        {
                                            //DIsplay the MEssage
                                            echo "<div class='error'>Image not Added.</div>";
                                        }
                                        ?>

                                </td>

                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-catagory.php?id=<?php echo $catagory_id; ?>" class="btn-update">Update Category</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-catagory.php?id=<?php echo $catagory_id; ?>&image_name=<?php echo $image_name; ?>" class="btn-delete">Delete Category</a>
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
                            <td colspan="6"><div class="error">No Category Added.</div></td>
                        </tr>

                        <?php
                    }
                    
                ?>

        </table>
    </div>
</div>

<?php include('includes/footer.php'); ?>