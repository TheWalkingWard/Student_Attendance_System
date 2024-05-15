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
                        <input type="text" class="input" id="username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="input-field">
                        <input type="password" class="input" id="password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field">
                        <select class="input" id="role-select">
                            <option value="user">Student</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <input type="submit" class="submit" value="Sign up">
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
