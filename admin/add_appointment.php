<?php include('includes/header.php'); ?>
<div class="manage">
    <div class="wrapper">
        <h1>Appointment Information</h1>
        <br><br>
        <br>
        <br>
        <form action="" method="POST" enctype="multipart/form-data">
        
            <table class="tbl-30">

                <tr>
                    <td>Patient Name: </td>
                    <td>
                        <input type="text" name="patient_name" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>Patient Address: </td>
                    <td>
                        <input type="text" name="patient_address" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>Phone No: </td>
                    <td>
                        <input type="text" name="phone_no" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>Symptoms: </td>
                    <td>
                        <input type="text" name="symptoms" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>Doctor Name: </td>
                    <td>
                        <input type="text" name="doctor_name" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>Department Name: </td>
                    <td>
                        <input type="text" name="department_name" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>Choose Date: </td>
                    <td>
                        <input type="text" name="choose_date" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Appointment" class="btn-update">
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
                $catagory_name = $_POST['depart_name'];
                $degree = $_POST['degree'];
                $chamber_name = $_POST['chamber_name'];
                $phone_no = $_POST['phone_no'];
                $time_schedule = $_POST['time_schedule'];

                //3. Insert Into Database

                //Create a SQL Query to Save or Add food
                // For Numerical we do not need to pass value inside quotes '' But for string value it is compulsory to add quotes ''
                $sql2 = "INSERT INTO doctor SET 
                    doctor_name = '$doctor_name',
                    depart_name = '$catagory_name',
                    degree = $degree,
                    chamber_name = '$chamber_name',
                    phone_no = $phone_no,
                    time_schedule = '$time_schedule'
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
                    <!--header('location:'.SITEURL.'admin/control-food.php');-->
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