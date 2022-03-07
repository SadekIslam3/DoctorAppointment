<?php include('includes/header.php'); ?>
<div class="manage">
    <div class = "wrapper">
        <h1>Admin Detail</h1>
        <br>
        <br>

        
        <form action="" method="POST">
            <table class="table-30">
                <tr>
                    <td>Full name</td>
                    <td>
                        <input type="text" name="name" placeholder="Enter Your Full Name">
                    </td>
                </tr>

                <tr>
                    <td>Phone Number</td>
                    <td>
                        <input type="text" name="number" placeholder="Enter Your Phone No">
                    </td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" placeholder="Enter Your Email">
                        
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
                $name = $_POST['name'];
                $number = $_POST['number'];
                $email = $_POST['email'];
                $user_name = $_POST['user_name'];
                $password = $_POST['password'];
                

                //3. Insert Into Database

                //Create a SQL Query to Save or Add food
                // For Numerical we do not need to pass value inside quotes '' But for string value it is compulsory to add quotes ''
                $sql2 = "INSERT INTO admin SET 
                    name = '$name',
                    number = '$number',
                    email = '$email',
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
                    <script>window.location.href='http://localhost/Doctor-appointment/admin/admin.php';</script>
                    <?php
                }
                else
                {
                    //FAiled to Insert Data
                    $_SESSION['add'] = "<div class='error'>Failed to Add Doctor.</div>";
                    header('location:'.SITEURL.'admin/add_admin.php');
                }
                
            }

                      ?>
    </div>
</div>
<?php include('includes/footer.php'); ?>