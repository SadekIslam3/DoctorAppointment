<?php include('includes/header.php'); ?>
<div class="manage">
    <div class = "wrapper">
        <h1>Doctor Dashboard</h1>
        <br>
        <br> 
        
        <form action="" method="POST">
            <table class="table-30">

                <tr>
                    <td>Doctor Name</td>
                    <td>
                        <input type="text" name="doctor_name" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>Patient Name</td>
                    <td>
                        <input type="text" name="patient_name" placeholder="">
                    </td>
                </tr>

                <tr>
                    <td>Symptom</td>
                    <td>
                        <input type="text" name="symptom" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>Madicine Name</td>
                    <td>
                        <input type="text" name="madicine_name" placeholder="">
                    </td>
                </tr>
                

                <tr>
                    <td colspan="2">
                        <br>
                        <input type="submit" name="submit" value="Appointment Store" class="btn-update">
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
                    $patient_name = $_POST['patient_name'];
                    $symptom = $_POST['symptom'];
                    $madicine_name = $_POST['madicine_name'];
                    

                    //3. Insert Into Database

                    //Create a SQL Query to Save or Add food
                    // For Numerical we do not need to pass value inside quotes '' But for string value it is compulsory to add quotes ''
                    $sql2 = "INSERT INTO appointment_store SET 
                        doctor_name = '$doctor_name',
                        patient_name = '$patient_name',
                        symptom = '$symptom',
                        medicine_name = '$madicine_name'
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
                        <script>window.location.href='http://localhost/Doctor-appointment/doctor/appointment.php';</script>
                        <?php
                    }
                    else
                    {
                        //FAiled to Insert Data
                        $_SESSION['add'] = "<div class='error'>Failed to Add Doctor.</div>";
                        header('location:'.SITEURL.'doctor/appointment_set.php');
                    }
                    
                }

            ?>
    </div>
</div>
<?php include('includes/footer.php'); ?>