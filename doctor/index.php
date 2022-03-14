<?php include('includes/header.php'); ?>

    <div class="manage">
        <div class = "wrapper">
            <h1>Doctor Dashboard</h1>
            <br>
            <br>
            <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>


                <div class="colo-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql = "SELECT * FROM category";
                        //Execute Query
                        $res = mysqli_query($con, $sql);
                        //Count Rows
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Categories
                </div>

                <div class="colo-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql2 = "SELECT * FROM doctors";
                        //Execute Query
                        $res2 = mysqli_query($con, $sql2);
                        //Count Rows
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Doctors 
                </div>

                <div class="colo-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql3 = "SELECT * FROM user";
                        //Execute Query
                        $res3 = mysqli_query($con, $sql3);
                        //Count Rows
                        $count3 = mysqli_num_rows($res3);
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                    Patients 
                </div>

                <div class="clearfix"></div>

                
        </div>
    </div>


<?php include('includes/footer.php'); ?>