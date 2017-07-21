<?php

include("include/connection.php");


	if(isset($_POST['sign_up']))
	{
		$name=mysqli_real_escape_string($con,$_POST['username']);
		$pass=mysqli_real_escape_string($con,$_POST['password']);
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$country=mysqli_real_escape_string($con,$_POST['country']);
		$gender=mysqli_real_escape_string($con,$_POST['gender']);
		$b_day=mysqli_real_escape_string($con,$_POST['birthday']);
		//$date=date("d-m-y");
		$status="unverified";
		$post="no";

		$get_email = "select * from users where user_email='$email'";
		$run_email = mysqli_query($con,$get_email);
		$check = mysqli_num_rows($run_email);

		if($check == 1)
		{
			echo "<script>alert('this email already exists')</script>";
			exit();
		}

		if(strlen($pass)<8)
		{
			echo "<script>alert('password is too short must have 8 charcters')</script>";
		}

		else
		{
			$insert = "insert into users (user_name,user_pass,user_email,user_country,user_b_day,user_image,register_date,last_login,status,posts) values ('$name','$pass','$email','$country','$b_day','default.jpg',NOW(),NOW(),'$status','$post')";

			$run_insert = mysqli_query($con,$insert);

			if($run_insert)
			{

				$_SESSION['user_email']=$email;	 	
				echo "<script>alert('registration successful')</script>";
				echo "<script>window.open('home.php','_self')</script>";
			}
		}
	}


?>