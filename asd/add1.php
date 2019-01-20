<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$kode_bursa = mysqli_real_escape_string($mysqli, $_POST['kode_bursa']);
	$nama_perusahaan = mysqli_real_escape_string($mysqli, $_POST['nama_perusahaan']);
	$sektor = mysqli_real_escape_string($mysqli, $_POST['sektor']);
	$link_reuters = "https://www.reuters.com/finance/stocks/overview/".$kode_bursa.".JK";
	$foto = $_FILES['Photo']['name'];
	$tmp = $_FILES['Photo']['tmp_name'];
	$path = "img/".$foto;
		
	// checking empty fields
	if(empty($kode_bursa) || empty($nama_perusahaan) || empty($sektor) || empty($foto)) {
				
		if(empty($kode_bursa)) {
			echo "<font color='red'>nama_perusahaan field is empty.</font><br/>";
		}
		
		if(empty($nama_perusahaan)) {
			echo "<font color='red'>kode_bursa field is empty.</font><br/>";
		}

		if(empty($sektor)) {
			echo "<font color='red'>kode_bursa field is empty.</font><br/>";
		}

		if(empty($foto)) {
			echo "<font color='red'>foto field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$a = "INSERT INTO company (kode_bursa,nama_perusahaan,sektor,link_reuters,foto) VALUES('$kode_bursa','$nama_perusahaan',$sektor,'$link_reuters','$foto')";

		if (move_uploaded_file($tmp, $path)) {
			$result = mysqli_query($mysqli, $a);
			if($result){
				//display success message
				echo "<font color='green'>Data added successfully.";
				echo "<br/><a href='index.php'>View Result</a>";
			} else {
				echo $a."<br>";
				printf("Errormessage: %s\n", $mysqli->error);
			}
		}
	}
}
?>
</body>
</html>
	