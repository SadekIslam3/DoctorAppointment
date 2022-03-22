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
.btn-box {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
}
</style>

<div class="manage">
    <div class = "wrapper">
        <h1>Patient List</h1>
        <br>
        <br> 
        <table class="tbl-full">
                <tr>
                    <th style="text-align: center;">ID No</th>
                    <th style="text-align: center;">Patient Name</th>
                    <th style="text-align: center;">Patient Address</th>
                    <th style="text-align: center;">Phone No</th>
                    <th style="text-align: center;">Email Name</th>
                    <th style="text-align: center;">Password</th>
                    <th style="text-align: center;">Age</th>
                    <th style="text-align: center;">Gender</th>
                    <!--<th style="text-align: center;">Update</th>-->
            
                </tr>
        <?php
            $search = $_POST['search'];
            $sql="SELECT * FROM user WHERE email_name LIKE '%$search%'";
            $res = mysqli_query($con,$sql);
            $count= mysqli_num_rows($res);
            if($count>0){
                while($row=mysqli_fetch_assoc($res)){
                    $user_id=$row['user_id'];
                    $full_name=$row['full_name'];
                    $address=$row['address'];
                    $phone_no=$row['phone_no'];
                    $email_name=$row['email_name'];
                    $password=$row['password'];
                    $age=$row['age'];
                    $gender=$row['gender'];
                    ?>

                            <tr>
                                <td style="width: 80px;text-align: center;"><?php echo  $user_id; ?>. </td>
                                <td style="width: 120px;text-align: center;"><?php echo $full_name; ?></td>
                                <td style="width: 130px;text-align: center;"><?php echo $address; ?></td>
                                <td style="width: 90px;text-align: center;"><?php echo $phone_no; ?></td>
                                <td style="width: 110px;text-align: center;"><?php echo $email_name; ?></td>
                                <td style="width: 90px;text-align: center;"><?php echo $password; ?></td>
                                <td style="width: 60px;text-align: center;"><?php echo $age; ?></td>
                                <td style="width: 70px;text-align: center;"><?php echo $gender; ?></td>

                                <td style="width: 40px; padding-left: 80px; padding-top: 40px;">
                                    <a href="<?php echo SITEURL; ?>patient_update.php?user_id=<?php echo $user_id; ?>" class="btn-update">Update</a>
                                <br>
                                <br>
                                <br>
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