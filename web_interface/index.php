<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student ID Scanner</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;400;800&display=swap" rel="stylesheet" />
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
                    <header>Create account</header>
                    <div class="input-field">
                        <input type="text" class="input" id="username" name="username" required>
                        <label for="username">Student Number</label>
                    </div>
                    <div class="input-field">
                        <input type="password" class="input" id="password" name="password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field">
                        <select class="input" id="role-select" name="Role">
                            <option value="user">Student</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <input type="submit" class="submit" name="SubmitSignUp" value="Sign up">
                    </div>
                    <div class="signin">
                        <span>Already have an account? <a href="login.php">Login here</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div> 
  </div>
 
  <script src="script.js"></script>
</body>
</html>

<?php 

// Once Sign Up Btn is Pressed
if (isset($_POST["LogInAdmin"])) {
    $a = $_POST['username'];
    $b = $_POST['password'];
    $c = $_POST['role'];

    include("Connect.php");

    $verify = "SELECT username FROM Manginsay WHERE username = '$a";
    $result = mysqli_query($con, $verify);
    $count = mysqli_num_rows($res);

    if ($count == 0) {
        $insert = "INSERT INTO Manginsay (username, password, role) VALUES ('$a', '$b', '$c')";
        mysqli_query($con, $insert);
        echo "Registered Successfully! Please log in now.";
    } else
        echo "<h1>$a already exists! Try another one...</h1>";

}

?>