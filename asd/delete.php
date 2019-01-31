<?php
include("config.php");

//Mendapatkan id data yang akan dihapus dari halaman index.php
$id = $_GET['id'];

//Eksekusi penghapusan data dari kedua tabel, baik company maupun companyprint
$result = mysqli_query($mysqli, "DELETE FROM company WHERE id_company='$id'");
$result = mysqli_query($mysqli, "DELETE FROM companyprint WHERE id_company='$id'");

//Redirect ke index.php setelah penghapusan berhasil
header("Location:index.php");
?>

