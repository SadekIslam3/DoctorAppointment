<?php include('includes/header.php'); ?>
<div class="manage">
    <div class="wrapper">
        <h1>Doctor Information</h1>
        <br><br>
        <?php 
        
        if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
    
        ?>
        <br>
        <br>
        <form action="" method="POST" enctype="multipart/form-data">
        
            <table class="tbl-30">

                <tr>
                    <td>Doctor Name: </td>
                    <td>
                        <input type="text" name="doctor_name" placeholder="">
                    </td>
                </tr>
                <tr>
                
                <tr>
                    <td>Department Name: </td>
                    <td>
                        <select name="category">
                            <?php 
                                //Create PHP Code to display categories from Database
                                //1. CReate SQL to get all active categories from database
                                $sql = "SELECT * FROM category";
                                
                                //Executing qUery
                                $res = mysqli_query($con, $sql);

                                //Count Rows to check whether we have categories or not
                                $count = mysqli_num_rows($res);

                                //IF count is greater than zero, we have categories else we donot have categories
                                if($count>0)
                                {
                                    //WE have categories
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        //get the details of categories
                                        $category_id = $row['category_id'];
                                        $category_name = $row['category_name'];

                                        ?>

                                        <option value="<?php echo $category_id; ?>"><?php echo $category_name; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    //WE do not have category
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }                       
                                //2. Display on Drpopdown
                            ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Degree: </td>
                    <td>
                        <input type="text" name="degree" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>Chamber: </td>
                    <td>
                        <input type="text" name="chamber_name" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>Designation: </td>
                    <td>
                        <input type="text" name="designation" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>Day: </td>
                    <td>
                        <input type="text" name="day" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>Time Schedule: </td>
                    <td>
                        <input type="text" name="time_schedule" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>Floor No: </td>
                    <td>
                        <input type="text" name="floor_no" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>Room No: </td>
                    <td>
                        <input type="text" name="room_no" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Doctor" class="btn-update">
                    </td>
                </tr>
            </table>
        </form>

        <?php 

            //CHeck whether the button is clicked or not
            if(isset($_POST['submit']))
            {
                //Add the Food in Database
                //echo "Clicked";
                
                //1. Get the DAta from Form
                $doctor_name = $_POST['doctor_name'];
                $category = $_POST['category'];
                $degree = $_POST['degree'];
                $chamber_name = $_POST['chamber_name'];
                $designation = $_POST['designation'];
                $day = $_POST['day'];
                $time_schedule = $_POST['time_schedule'];
                $floor_no = $_POST['floor_no'];
                $room_no = $_POST['room_no'];

                //3. Insert Into Database

                //Create a SQL Query to Save or Add food
                // For Numerical we do not need to pass value inside quotes '' But for string value it is compulsory to add quotes ''
                $sql2 = "INSERT INTO doctors SET 
                    doctor_name = '$doctor_name',
                    catagory_id = '$category',
                    degree = '$degree',
                    chamber_name = '$chamber_name',
                    designation = '$designation',
                    day = '$day',
                    time_schedule = '$time_schedule',
                    floor_no = '$floor_no',
                    room_no = '$room_no'
                ";

                //Execute the Query
                $res2 = mysqli_query($con, $sql2);

                //CHeck whether data inserted or not
                //4. Redirect with MEssage to Manage Food page
                if($res2==true)
                {
                    //Data inserted Successfullly
                    $_SESSION['add'] = "<div class='success'> Added Successfully.</div>";
    ?>
                    <!--header('location:'.SITEURL.'admin/doctor.php');-->
                    <script>window.location.href='http://localhost/Doctor-appointment/admin/doctor.php';</script>
                    <?php
                }
                else
                {
                    //FAiled to Insert Data
                    $_SESSION['add'] = "<div class='error'>Failed to Add Doctor.</div>";
                    header('location:'.SITEURL.'admin/add_doctor.php');
                }
                
            }

                      ?>
        
    </div>
</div>
<?php include('includes/footer.php'); ?>