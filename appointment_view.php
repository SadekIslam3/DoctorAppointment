<?php include('includes/header.php'); ?>
<style>

.wrapper{
    padding: 1%;
    width: 80%;
    margin: 0 auto;
}

.tbl-full{
    width: 100%;
}

.manage{
    background-color: #f1f2f6;
    padding: 3% 0;
}
</style>




<div class="manage">
    <div class = "wrapper">
        <h1>View Appointment</h1>
        <br>
        <br>
        <table class="tbl-full">
            <tr>
                <th>ID No</th>
                <th>Patient Name</th>
                <th>Patient Address</th>
                <th>Phone No</th>
                <th>Gender</th>
                <th>Symptom</th>
                <th>Doctor Name</th>
                <th>Department Name</th>
                <th>Date</th>
        
            </tr>
            <?php 

                    //Query to Get all patient_appointment from Database
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
                                <td><?php echo  $appointment_id; ?>. </td>
                                <td><?php echo $patient_name; ?></td>
                                <td><?php echo $patient_address; ?></td>
                                <td><?php echo $phone_no; ?></td>
                                <td><?php echo $gender; ?></td>
                                <td><?php echo $symptom; ?></td>
                                <td><?php echo $doctor_name; ?></td>
                                <td><?php echo $depart_name; ?></td>
                                <td><?php echo $date; ?></td>

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
                            <td colspan="6"><div class="error">No Appointment Added.</div></td>
                        </tr>

                        <?php
                    }
                    
                ?>
        </table>
    </div>
</div>
<?php include('includes/footer.php'); ?>
