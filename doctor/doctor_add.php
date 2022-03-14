<?php include('includes/header.php'); ?>
<div class="manage">
    <div class = "wrapper">
        <h1>Doctor Detail</h1>
        <br>
        <br>

        
        <form action="" method="POST">
            <table class="table-30">
                <tr>
                    <td>Full name</td>
                    <td>
                        <input type="text" name="doctor_name" placeholder="Enter Your Full Name">
                    </td>
                </tr>

                <tr>
                    <td>Department Name</td>
                    <td>
                        <input type="text" name="depart_name" placeholder="Enter Your Department">
                    </td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="user_name" placeholder="Enter username">
                        
                    </td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" placeholder="Enter Password">
                        
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-update">
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
                $depart_name = $_POST['depart_name'];
                $user_name = $_POST['user_name'];
                $password = $_POST['password'];
                

                //3. Insert Into Database

                //Create a SQL Query to Save or Add food
                // For Numerical we do not need to pass value inside quotes '' But for string value it is compulsory to add quotes ''
                $sql2 = "INSERT INTO doctorpanel SET 
                    doctor_name = '$doctor_name',
                    depart_name = '$depart_name',
                    user_name = '$user_name',
                    password = '$password'
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
                    <script>window.location.href='http://localhost/Doctor-appointment/doctor/doctor_list.php';</script>
                    <?php
                }
                else
                {
                    //FAiled to Insert Data
                    $_SESSION['add'] = "<div class='error'>Failed to Add Doctor.</div>";
                    header('location:'.SITEURL.'doctor/doctor_add.php');
                }
                
            }

                      ?>
    </div>
</div>
<?php include('includes/footer.php'); ?>