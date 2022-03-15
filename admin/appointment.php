<?php include('includes/header.php'); ?>

<div class="manage">
    <div class = "wrapper">
        <h1>View Appointment</h1>
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
        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Patient Address</th>
                <th>Phone No</th>
                <th>Gender</th>
                <th>Symptoms</th>
                <th>Doctor Name</th>
                <th>Department Name</th>
                <th>Choose Date</th
               
            </tr>
            <?php 

                    //Query to Get all doctors from Database
                    $sql = "SELECT * FROM patient_appointment";

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
                            $appointment_id = $row['appointment_id'];
                            $patient_name = $row['patient_name'];
                            $patient_address = $row['patient_address'];
                            $phone_no = $row['phone_no'];
                            $gender = $row['gender'];
                            $symptom = $row['symptom'];
                            $doctor_name = $row['doctor_name'];
                            $depart_name = $row['depart_name'];
                            $date = $row['date'];

                            ?>
                            <tr>
                                <td style="width: 80px;text-align: center;"><?php echo  $appointment_id; ?>. </td>
                                <td style="width: 200px;text-align: center;"><?php echo $patient_name; ?></td>
                                <td style="width: 260px;text-align: center;"><?php echo $patient_address; ?></td>
                                <td style="width: 240px;text-align: center;"><?php echo $phone_no; ?></td>
                                <td style="width: 120px;text-align: center;"><?php echo $gender; ?></td>
                                <td style="width: 140px;text-align: center;"><?php echo $symptom; ?></td>
                                <td style="width: 260px;text-align: center;"><?php echo $doctor_name; ?></td>
                                <td style="width: 260px;text-align: center;"><?php echo $depart_name; ?></td>
                                <td style="width: 220px;text-align: center;"><?php echo $date; ?></td>

                                <td style="width: 280px; padding-left: 40px; padding-top: 10px;">
                                    <a href="<?php echo SITEURL; ?>admin/update-doctor.php?id=<?php echo $appointment_id; ?>" class="btn-update">Update Appointment</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-doctor.php?id=<?php echo $$appointment_id; ?>" class="btn-delete">Delete Appointment</a>
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
                            <td colspan="6"><div class="error">No Doctor Added.</div></td>
                        </tr>

                        <?php
                    }
                    
                ?>
        </table>
    </div>
</div>

<?php include('includes/footer.php'); ?>