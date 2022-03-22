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
                <th style="padding-bottom: 15px;">Image</th>
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
                                <td style="width: 40px; text-align: center;"><?php echo $category_id; ?>. </td>
                                <td style="width: 120px; text-align: center;"><?php echo $category_name; ?></td>

                                <td style="width: 130px; padding-left: 240px;">

                                    <?php  
                                        //Chcek whether image name is available or not
                                        if($image_name!="")
                                        {
                                            //Display the Image
                                            ?>
                                                    
                                            <img src="<?php echo SITEURL; ?>images/catagory/<?php echo $image_name; ?>" width="100px" >
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

                                <td style="width: 160px; padding-left: 60px;">
                                    <a href="<?php echo SITEURL; ?>admin/catagory_update.php?category_id=<?php echo $category_id; ?>" class="btn-update">Update Category</a>
                                    <a href="<?php echo SITEURL; ?>admin/catagory_delete.php?category_id=<?php echo $category_id; ?>&image_name=<?php echo $image_name; ?>" class="btn-delete">Delete Category</a>
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