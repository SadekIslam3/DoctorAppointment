<?php include('data_con/database.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    
<link rel="stylesheet" type="text/css" href="css-backend/doctor.css" />
    <title>Doctor Appointment</title>
</head>

<body>
    <?php
        //check id pass or not
        if(isset($_GET['category_id'])){
        //id set and get
        $category_id = $_GET['category_id'];
        //get category title
        $sql = "SELECT category_name FROM category WHERE category_id=$category_id";

        $res = mysqli_query($con, $sql);

        $row = mysqli_fetch_assoc($res);

        $category_name = $row['category_name'];

        }
        else{
        //not passed
        //redirect to home
        header('location:'.SITEURL);
        }
    ?>
<div class="main">
            <?php
                $sql2 = " SELECT * FROM doctors WHERE catagory_id=$category_id ";

                $res2 = mysqli_query($con, $sql2);

                $count2 = mysqli_num_rows($res2);

                if($count2>0){
                  //food available
                  while($row2 = mysqli_fetch_assoc($res2)){
                    $doctor_id = $row2['doctor_id'];
                    $doctor_name = $row2['doctor_name'];
                    $degree = $row2['degree'];
                    $chamber_name = $row2['chamber_name'];
                    $designation = $row2['designation'];
                    $day = $row2['day'];
                    $time_schedule = $row2['time_schedule'];
                    $floor_no = $row2['floor_no'];
                    $room_no = $row2['room_no'];

                    ?>
    <div class= "container">
        <div style="width: 150px; margin-left: 400px;">
            <img width="100%;" src="images/abdulKalam.jpg" alt="">
        </div>
        <div class="inside">
            <a id="doctorTitle" class="doctorDb">Doctor name:</a>
            <span><a class="doctorDb"><?php echo $doctor_name ?></a></span>
        </div>
        <div class="inside">
            <a id="doctorTitle" class="doctorDb">Department:</a>
            <span><a class="doctorDb"><?php echo $category_name ?></a></span>
        </div>
        <div class="inside">
            <a id="doctorTitle" class="doctorDb">Degree:</a>
            <span><a class="doctorDb"><?php echo $degree ?></a></span>
        </div>
        <div class="inside">
            <a id="doctorTitle" class="doctorDb">Chamber:</a>
            <span><a class="doctorDb"><?php echo $chamber_name ?></a></span>
        </div>
        <div class="inside">
            <a id="doctorTitle" class="doctorDb">Designation:</a>
            <span><a class="doctorDb"><?php echo $designation ?></a></span>
        </div>
        <div class="inside">
            <a id="doctorTitle" class="doctorDb">Day:</a>
            <span><a class="doctorDb"><?php echo $day ?></a></span>
        </div>
        <div class="inside">
            <a id="doctorTitle" class="doctorDb">Time:</a>
            <span><a class="doctorDb"><?php echo $time_schedule ?></a></span>
        </div>
        <div class="inside">
            <a id="doctorTitle" class="doctorDb">Floor No:</a>
            <span><a class="doctorDb"><?php echo $floor_no ?></a></span>
        </div>
        <div class="inside">
            <a id="doctorTitle" class="doctorDb">Room No:</a>
            <span><a class="doctorDb"><?php echo $room_no ?></a></span>
        </div>
        <div class="btn-box" style="margin-left: 40px; margin-bottom: 10px; background-color: blue; width: 120px; height: 30px;">
				  
                  <a style="padding-left: 5px; padding-top: 3px; text-decoration: none; color: white;" href="check.php?doctor_id=<?php echo $doctor_id; ?>" name="submit">Set Appointment</a>
		</div>
    </div>
    <?php
                    
                  }
                }
                else{
                  echo "Not avilable";
                }
              ?>


</div>
</body>
</html>