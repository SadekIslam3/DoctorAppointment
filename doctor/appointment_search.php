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
                    <th>Symptom</th>
                    <th>Medicine Name</th>
                    <th>Update/delete</th>
            
                </tr>

                <?php
                    $search = $_POST['search'];
                    $sql="SELECT * FROM appointment_store WHERE doctor_name LIKE '%$search%'";
                    $res = mysqli_query($con,$sql);
                    $count= mysqli_num_rows($res);
                    if($count>0){
                        while($row=mysqli_fetch_assoc($res)){
                            $store_id=$row['store_id'];
                            $patient_name=$row['patient_name'];
                            $symptom=$row['symptom'];
                            $medicine_name=$row['medicine_name'];
                            ?>

                                    <tr>
                                        <td style="width: 80px;text-align: center;"><?php echo  $store_id; ?>. </td>
                                        <td style="width: 200px;text-align: center;"><?php echo $patient_name; ?></td>
                                        <td style="width: 140px;text-align: center;"><?php echo $symptom; ?></td>
                                        <td style="width: 260px;text-align: center;"><?php echo $medicine_name; ?></td>

                                        <td style="width: 240px; padding-left: 170px; padding-top: 10px;">
                                            <a href="<?php echo SITEURL; ?>doctor/appointment_store_update.php?store_id=<?php echo $store_id; ?>" class="btn-update">Update</a>
                                            <a href="<?php echo SITEURL; ?>doctor/appointment_store_delete.php?store_id=<?php echo $store_id; ?>" class="btn-delete">Delete</a>
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