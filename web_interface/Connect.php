<?php

$con = mysqli_connect("", "", "", "") or die("No Connection :(");

if (isset($_POST["LogInStud"])) {
    header("Location: index.html");
}

if (isset($_POST["LogInAdmin"])) {
    header("Location: index (Admin).html");
}

?>