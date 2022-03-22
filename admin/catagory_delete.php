<?php include('../data_con/database.php');
        //echo "Delete Page";
            //Check whether the id and image_name value is set or not
            if(isset($_GET['category_id']) AND isset($_GET['image_name']))
            {
                //Get the Value and Delete
                //echo "Get Value and Delete";
                $category_id = $_GET['category_id'];
                $image_name = $_GET['image_name'];

                //Remove the physical image file is available
                if($image_name != "")
                {
                    //Image is Available. So remove it
                    $path = "../images/catagory/".$image_name;
                    //REmove the Image
                    $remove = unlink($path);

                    //IF failed to remove image then add an error message and stop the process
                    if($remove==false)
                    {
                        //Set the SEssion Message
                        $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image.</div>";
                        //REdirect to Manage Category page
                        header('location:'.SITEURL.'admin/catagory.php');
                        //Stop the Process
                        die();
                    }
                }

                //Delete Data from Database
                //SQL Query to Delete Data from Database
                $sql = "DELETE FROM category WHERE category_id=$category_id";

                //Execute the Query
                $res = mysqli_query($con, $sql);

                //Check whether the data is delete from database or not
                if($res==true)
                {
                    //SEt Success MEssage and REdirect
                    $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
                    //Redirect to Manage Category
                    header('location:'.SITEURL.'admin/catagory.php');
                }
                else
                {
                    //SEt Fail MEssage and Redirecs
                    $_SESSION['delete'] = "<div class='error'>Failed to Delete Category.</div>";
                    //Redirect to Manage Category
                    header('location:'.SITEURL.'admin/catagory.php');
                }

        

            }
            else
            {
                //redirect to Manage Category Page
                header('location:'.SITEURL.'admin/catagory.php');
            }
?>