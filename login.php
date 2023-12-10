<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$studentNumber = $_POST['studentNumber'];
		$password = $_POST['password'];

		if(!empty($studentNumber) && !empty($password) && !is_numeric($studentNumber))
		{

			//read from database
			$query = "select * from users where studentNumber = '$studentNumber' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
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
 <div class="container">	
		<form class="form" method="post">
			<h1 class="form__title">Login</h1>
            <div class="form__message form__message--error"></div>

        <div class="form__input-group">
            <input class="form__input" id="text" type="text"name="studentNumber" autofocus placeholder="Student Number" >
            <div class="form__input-error-message"></div>
        </div>
        <div class="form__input-group">
                <input type="password" class="form__input" name="password" autofocus placeholder="Password">
                <div class="form__input-error-message"></div>
        </div> 

			<input class="form__button" id="button" type="submit" value="Login"><br>

			<a class="form__link" href="signup.php" id="linkCreateAccount">Don't have an account? Create account</a>
		</form>
	</div>
</div>	
</body>
</html>