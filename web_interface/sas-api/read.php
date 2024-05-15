<?php

$dbc = mysqli_connect("localhost", "earist_sas", "earist_1945", "earist_student_data");
if(!$dbc) {
die("DATABASE CONNECTION FAILED:" .mysqli_error($dbc));
exit();
}
$db = "earist_student_data";
$dbs = mysqli_select_db($dbc, $db);
if(!$dbs) {
die("DATABASE SELECTION FAILED:" .mysqli_error($dbc));
exit();
}

$query = "SELECT * FROM `student_info`";
$res = mysqli_query($dbc,"SELECT * FROM `student_info`");
$row = mysqli_fetch_array($res);



if(mysqli_query($dbc, $query)){


} 
else{
echo "ERROR: Could not able to execute". $query." ". mysqli_error($dbc);
}
?>

<h2>Student Details</h2>

<table border="2">
  <tr>
    <td>id_number</td>
    <td>id_prefix</td>
    <td>surname</td>
    <td>firstname</td>
	<td>middlename</td>
	<td>course</td>
	<td>year</td>
	<td>section</td>
  </tr>

<?php

while($data = mysqli_fetch_array($res))
{
?>
  <tr>
    <td><?php echo $data['id_number']; ?></td>
    <td><?php echo $data['id_prefix']; ?></td>
    <td><?php echo $data['surname']; ?></td>
    <td><?php echo $data['firstname']; ?></td>
	<td><?php echo $data['middlename']; ?></td>
	<td><?php echo $data['course']; ?></td>
	<td><?php echo $data['year']; ?></td>
	<td><?php echo $data['section']; ?></td>
  </tr>	
<?php
}
?>
</table>



<php
mysqli_close($dbc);
?>