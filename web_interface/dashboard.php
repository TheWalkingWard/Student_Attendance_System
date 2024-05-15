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
					<th>Student No.</th>
					<th>Name</th>
					<th>Section</th>
					<th>Time In</th>
					<th>Time Out</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					<td>-----</td>
					<td>-----</td>
					<td>-----</td>
					<td>-----</td>
					<td>-----</td>
					</tr>
					<tr>
					<td>-----</td>
					<td>-----</td>
					<td>-----</td>
					<td>-----</td>
					<td>-----</td>
					</tr>
					<tr>
					<td>-----</td>
					<td>-----</td>
					<td>-----</td>
					<td>-----</td>
					<td>-----</td>
					</tr>
					<tr>
					<td>-----</td>
					<td>-----</td>
					<td>-----</td>
					<td>-----</td>
					<td>-----</td>
					</tr>
					<tr>
					<td>-----</td>
					<td>-----</td>
					<td>-----</td>
					<td>-----</td>
					<td>-----</td>
					</tr>
					<tr>
					<td>-----</td>
					<td>-----</td>
					<td>-----</td>
					<td>-----</td>
					<td>-----</td>
					</tr>
				</tbody>
				</table>
		</div>
	</section>
</section>

</div>
<script src="script.js"></script>
</body>
</html>

<?php
// insert PHP Code here...
include("Connect.php");

$sql = "SELECT * FROM Manginsay ORDER BY SurnameHa";
$result = mysqli_query($con, $sql) or die("error in query");
$bilang = mysqli_num_rows($result);

while ($rec = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $a = $rec['']; // Student NUmber
    $b = $rec['']; // Full Name
    $c = $rec['']; // Section
    $d = $rec['']; // Time In
    $e = $rec['']; // Time Out

    // Manginsay, nakalimutan ko kung ilang column 'yung gawa mo. If kulang, paki-dagdag 'to.
    // Once this is done, isisingit 'to sa HTML part mismo.

    echo "
        <tr>
            <td>$a</td>
            <td>$b</td>
            <td>$c</td>
            <td>$d</td>
            <td>$e</td>
        </tr>
    "; 
}

?>