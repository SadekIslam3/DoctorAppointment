<?php include('includes/header.php');
        if(isset($_SESSION['role']) && $_SESSION['role']!='1'){
            header("location:".SITEURL.'admin/index.php');
            die();
        }
?>
<div class="manage">
   <div class="wrapper">
     <h1>Update Category</h1>
     <br>
    <?php 
    
        //Check whether the id is set or not
        if(isset($_GET['category_id']))
        {
            //Get the ID and all other details
            //echo "Getting the Data";
            $category_id = $_GET['category_id'];
            //Create SQL Query to get all other details
            $sql = "SELECT * FROM category WHERE category_id=$category_id";

            //Execute the Query
            $res = mysqli_query($con, $sql);

            //Count the Rows to check whether the id is valid or not
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                //Get all the data
                $row = mysqli_fetch_assoc($res);
                $category_name = $row['category_name'];
                $current_image = $row['image_name'];
            }
            else
            {
                //redirect to manage category with session message
                $_SESSION['no-category-found'] = "<div class='error'>Category not Found.</div>";
                header('location:'.SITEURL.'admin/catagory.php');
            }

        }
        else
        {
            //redirect to Manage CAtegory
            header('location:'.SITEURL.'admin/catagory.php');
        }
    
    ?>

    <form action="" method="POST" enctype="multipart/form-data">

        <table class="table-30">
            <tr>
                <td>Category Name: </td>
                <td>
                    <input type="text" name="category_name" value="<?php echo $category_name; ?>">
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
                            <img src="<?php echo SITEURL; ?>images/catagory/<?php echo $current_image; ?>" width="150px">
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
                <td>
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
                    <br>
                    <br>
                    <input type="submit" name="submit" value="Update Category" class="btn-update">
                </td>
            </tr>

        </table>

    </form>

    <?php 
    
        if(isset($_POST['submit']))
        {
            //echo "Clicked";
            //1. Get all the values from our form
            $category_id = $_POST['category_id'];
            $category_name = $_POST['category_name'];
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
                    $image_name = "Catagory_".rand(000, 999).'.'.$ext; // e.g. Category_834.jpg
                    

                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../images/catagory/".$image_name;

                    //Finally Upload the Image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //Check whether the image is uploaded or not
                    //And if the image is not uploaded then we will stop the process and redirect with error message
                    if($upload==false)
                    {
                        //SEt message
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                        //Redirect to Add Category Page
                        header('location:'.SITEURL.'admin/catagory.php');
                        //STop the Process
                        die();
                    }

                    //B. Remove the Current Image if available
                    if($current_image!="")
                    {
                        $remove_path = "../images/catagory/".$current_image;

                        $remove = unlink($remove_path);

                        //CHeck whether the image is removed or not
                        //If failed to remove then display message and stop the processs
                        if($remove==false)
                        {
                            //Failed to remove image
                            $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current Image.</div>";
                            header('location:'.SITEURL.'admin/catagory.php');
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

            //3. Update the Database
            $sql2 = "UPDATE category SET 
                category_name = '$category_name',
                image_name = '$image_name' 
                WHERE category_id=$category_id
            ";

            //Execute the Query
            $res2 = mysqli_query($con, $sql2);

            //4. REdirect to Manage Category with MEssage
            //CHeck whether executed or not
            if($res2==true)
            {
                //Category Updated
                $_SESSION['update'] = "<div class='success'>Category Updated Successfully.</div>";
                header('location:'.SITEURL.'admin/catagory.php');
            }
            else
            {
                //failed to update category
                $_SESSION['update'] = "<div class='error'>Failed to Update Category.</div>";
                header('location:'.SITEURL.'admin/catagory_update.php');
            }

        }
    
    ?>

</div>
</div>
<?php include('includes/footer.php'); ?>