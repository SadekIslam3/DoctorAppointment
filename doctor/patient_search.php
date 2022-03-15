<?php include('includes/header.php'); ?>
<div class="manage">
    <div class = "wrapper">
        <h1>Doctor Dashboard</h1>
        <br>
        
        <br> 
        <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Patient Name</th>
                    <th>Patient Address</th>
                    <th>Phone No</th>
                    <th>Gender</th>
                    <th>Symptom</th>
                    <th>Date</th>
                    <th>Update/delete</th>
            
                </tr>
        <?php
            $search = $_POST['search'];
            $sql="SELECT * FROM patient_appointment WHERE doctor_name LIKE '%$search%'";
            $res = mysqli_query($con,$sql);
            $count= mysqli_num_rows($res);
            if($count>0){
                while($row=mysqli_fetch_assoc($res)){
                    $appointment_id=$row['appointment_id'];
                    $patient_name=$row['patient_name'];
                    $patient_address=$row['patient_address'];
                    $phone_no=$row['phone_no'];
                    $gender=$row['gender'];
                    $symptom=$row['symptom'];
                    $date=$row['date'];
                    ?>

                            <tr>
                                <td style="width: 80px;text-align: center;"><?php echo  $appointment_id; ?>. </td>
                                <td style="width: 200px;text-align: center;"><?php echo $patient_name; ?></td>
                                <td style="width: 220px;text-align: center;"><?php echo $patient_address; ?></td>
                                <td style="width: 240px;text-align: center;"><?php echo $phone_no; ?></td>
                                <td style="width: 120px;text-align: center;"><?php echo $gender; ?></td>
                                <td style="width: 140px;text-align: center;"><?php echo $symptom; ?></td>
                                <td style="width: 260px;text-align: center;"><?php echo $date; ?></td>

                                <td style="width: 280px; padding-left: 40px; padding-top: 10px;">
                                    <a href="<?php echo SITEURL; ?>admin/update-doctor.php?id=<?php echo $doctor_id; ?>" class="btn-update">Update Doctor</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-doctor.php?id=<?php echo $$doctor_id; ?>" class="btn-delete">Delete Doctor</a>
                                </td>
                            </tr>

                    <?php
                }
            }
            else{
                echo "No patient";
            }
        ?>
        
        
            
            
                

            </table>

       
    </div>
</div>
<?php include('includes/footer.php'); ?>