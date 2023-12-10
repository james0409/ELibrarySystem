<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$Fullname = $_POST['Fullname'];
		$studentNumber = $_POST['studentNumber'];
		$Grade = $_POST['Grade'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$gender = $_POST['gender'];		
		$phone = $_POST['phone'];
		
		if(!empty($Fullname) && !empty($password) && !empty($gender) && !empty($email) && !empty($phone) && !empty($studentNumber) && !is_numeric($user_name))
		{
			$Select = "SELECT email FROM users WHERE email = ? LIMIT 1";

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,Fullname,studentNumber,Grade,password,gender,email,phone) values ('$user_id','$Fullname','$studentNumber','$Grade','$password','$gender','$email','$phone')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>ONLINE-LIBRARY</title>
    <link rel="shortcut icon" href="/assets/favicon.ico">
    <link rel="stylesheet" href="./src/main.css">
</head>
<style>
body {
    background-color: #90EE90;

}

</style>
<body>

<div class="container" id="box">

		<form class="form" method="post">
			<form class="form form--hidden" id="createAccount">
            <h1 class="form__title">Create Account</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
			    <input class="form__input" id="text" type="text" name="Fullname" autofocus placeholder="Fullname">
			    <div class="form__input-error-message"></div>
			<div class="form__input-group">
			    <input class="form__input" id="text" type="text" name="studentNumber" autofocus placeholder="Student Number">
			    <div class="form__input-error-message"></div>
			<div class="form__input-group">
			    <input class="form__input" id="text" type="text" name="Grade" autofocus placeholder="Grade&Section">
			    <div class="form__input-error-message"></div>
			<div class="form__input-group">
                <input  class="form__input" id="text" type="email"  name="email" autofocus placeholder="Email" input required>
                <div class="form__input-error-message"></div>
            </div>    
			<div class="form__input-group">
                <input  class="form__input" id="text" type="password" name="password" autofocus placeholder="Password">
                <div class="form__input-error-message"></div>
            </div>

           <div class="form__input-group">
               <input type="radio" name="gender" value="M" required>Male
               <input type="radio" name="gender" value="F" required>Female
                <div class="form__input-error-message"></div>
          </div>
        <div class="form__input-group">
           
             <input  class="form__input" id="number" type="phone"  name="phone" autofocus placeholder="Phone" input required>
                <div class="form__input-error-message"></div>
             </div> 
			<input class="form__button" id="button" type="submit" value="Signup"><br><br>

			 <a class="form__link" href="login.php" id="linkLogin">Already have an account? Sign in</a><br><br>
		</form>
	</div>
</body>
</html>