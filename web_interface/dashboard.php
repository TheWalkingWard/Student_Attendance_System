<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student ID Scanner</title>
<link rel="stylesheet" href="dashboard.css" />
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;400;800&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="container">
	<nav>
		<ul>
			<li><a href="#" class="logo">
				<img src="Img/EARIST Logo.png" alt="EARIST Logo">
				<span class="nav-iten">Admin</span>
			</a></li>
			<li><a href="#">
				<i class="fas fa-database"></i>
				<span class="nav-item">Report</span>
			</a></li>
			<li><a href="#">
				<i class="fas fa-menorah"></i>
				<span class="nav-item">Dashboard</span>
			</a></li>
			<li><a href="#">
				<i class="fas fa-cog"></i>
				<span class="nav-item">Settings</span>
			</a></li>
			<li><a href="login.php" class="logout">
				<i class="fas fa-sign-out-alt"></i>
				<span class="nav-item">Log out</span>
			</a></li>
		</ul>
	</nav>

<section class="main">
	<section class="attendance">
		<div class="attendance-list">
			<h1>Attendance List</h1>
			<table class="table">
				<thead>
					<tr>
                        <th>Student Number</th>
                        <th>Full Name</th>
                        <th>course</th>
						<th>Time In</th>
						<th>Time Out</th>
					</tr>
				</thead>
				<tbody>
                    <?php

                    include("Connect.php");

                    $sql = "SELECT * FROM student_info ORDER BY surname";
                    $result = mysqli_query($con, $sql) or die("error in query");
                    $bilang = mysqli_num_rows($result);

                    while ($rec = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $a = $rec['id_number']; // Student NUmber
                        $b = $rec['id_prefix']; // Full Name
                        $c = $rec['surname']; 
                        $d = $rec['firstname']; 
                        $e = $rec['middlename']; 
                        $f = $rec['course']; 
                        $g = $rec['year'];
                        $h = $rec['section'];
						//$i = $rec['timein'];
						//$j = $rec['timeout'];
						//$k = $rec['location'];

                        // Manginsay, nakalimutan ko kung ilang column 'yung gawa mo. If kulang, paki-dagdag 'to.
                        // Once this is done, isisingit 'to sa HTML part mismo.

                        echo "
                            <tr>
                                <td>$a$b</td>
                                <td>$c, $d $e</td>
                                <td>$f $g$h </td>
								<td></td>
								<td></td>
                            </tr>
                        "; 
                    }
                    
                    ?>
				</tbody>
				</table>
		</div>
	</section>
</section>

</div>

<form action="process_form.php" method="post">
	<h2>Create Table</h2>
	<label for="table_name">Table Name:</label>
	<input type="text" id="table_name" name="table_name" required><br><br>

	<h2>Insert Student Info</h2>
	<label for="id_number">ID Number:</label>
	<input type="text" id="id_number" name="id_number" required><br><br>

	<label for="id_prefix">ID Prefix:</label>
	<input type="text" id="id_prefix" name="id_prefix" required><br><br>

	<label for="surname">Surname:</label>
	<input type="text" id="surname" name="surname" required><br><br>

	<label for="firstname">First Name:</label>
	<input type="text" id="firstname" name="firstname" required><br><br>

	<label for="middlename">Middle Name:</label>
	<input type="text" id="middlename" name="middlename" required><br><br>

	<label for="course">Course:</label>
	<input type="text" id="course" name="course" required><br><br>

	<label for="year">Year:</label>
	<input type="text" id="year" name="year" required><br><br>

	<label for="section">Section:</label>
	<input type="text" id="section" name="section" required><br><br>

	<input type="submit" value="Submit">
</form>

<script src="script.js"></script>
</body>
</html>

<?php 
include("Connect.php");


?>