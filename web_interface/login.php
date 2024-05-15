<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student ID scanner</title>
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;400;800&display=swap" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
	<div class="container main">
		<div class="row">
			<div class="col-md-6 side-image">
				<img src="img/EARIST Logo.png" alt="">
				<div class="text">
					<p>Student Attendance System <i>-SAS</i></p>
				</div>
			</div>
			<div class="col-md-6 right">
				<div class="input-box">
					<header>Log in</header>
					<div class="input-field">
						<input type="text" class="input" id="username" name="username" required>
						<label for="username">Username</label>
					</div>
					<div class="input-field">
						<input type="password" class="input" id="password" name="password" required>
						<label for="password">Password</label>
					</div>
					<div class="input-field">
						<input type="submit" class="submit" name="SubmitSignIn" value="Log in">
					</div>
					<div class="signin">
						<span>Don't have an account? <a href="index.php">Signup here</a></span>
					</div>
				</div>
			</div>
		</div>
	</div> 
</div>

</body>
</html>     

<?php

if (isset($_POST["SubmitSignIn"])) {
    $a = $_POST['username'];
    $b = $_POST['password'];

    include("Connect.php");

    $verify = "SELECT username FROM Manginsay WHERE username = '$a'";
    $result = mysqli_query($con, $verify);
    $count = mysqli_num_rows($result);

    if ($count == 0)
        echo "<h1>$a doesn't exist!</h1>";

    header("Location: dashboard.php");
}

?>