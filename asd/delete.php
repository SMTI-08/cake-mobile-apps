<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM company WHERE id_company='$id'");
$result = mysqli_query($mysqli, "DELETE FROM companyprint WHERE id_company='$id'");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

