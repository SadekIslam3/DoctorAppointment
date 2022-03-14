<head>
    <?php include('../data_con/database.php'); ?>

    <link rel="stylesheet" href="../css-backend/style1.css">
</head>

<div class="container">
<?php 
                            if(isset($_SESSION['login'])){

                                echo $_SESSION['login'];
                                unset($_SESSION['login']);
                            }
                        ?>
	<div class="screen">
    
		<div class="screen__content">
			<form action=""  method="POST" class="login">
            <div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" name ="category_name" class="login__input" placeholder="Department Name">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" name ="user_name" class="login__input" placeholder="User name">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" name ="password" class="login__input" placeholder="Password">
				</div>
				<button type="submit" name ="submit" class="button login__submit" >
					<span class="button__text">Log In</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
            

			
		</div>
        <?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        $depart_name = $_POST['category_name'];
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        //$username = mysqli_real_escape_string($conn, $_POST['username']);
        
        //$raw_password = ($_POST['password']);
        //$password = mysqli_real_escape_string($conn, $raw_password);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM doctorpanel WHERE depart_name='$depart_name' AND user_name='$user_name' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($con, $sql);

        //4. Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User Available and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user_name'] = $user_name; //TO check whether the user is logged in or not and logout will unset it

            //Redirect to HOme Page/Dashboard
            echo "<script> window.open('index.php','_self')</script>";
        }
        else
        {
            //User not Available and Login FAil
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //Redirect to HOme Page/Dashboard
            echo "<script> window.open('login.php','_self')</script>";
        }


    }

?>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>