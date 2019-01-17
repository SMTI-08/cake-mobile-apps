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
	$link_reuters = "https://www.reuters.com/finance/stocks/overview/".$nama_perusahaan.".JK";
		
	// checking empty fields
	if(empty($kode_bursa) || empty($nama_perusahaan) || empty($sektor)) {
				
		if(empty($kode_bursa)) {
			echo "<font color='red'>nama_perusahaan field is empty.</font><br/>";
		}
		
		if(empty($nama_perusahaan)) {
			echo "<font color='red'>kode_bursa field is empty.</font><br/>";
		}

		if(empty($sektor)) {
			echo "<font color='red'>kode_bursa field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO company(kode_bursa,nama_perusahaan,link_reuters,sektor) VALUES('$nama_perusahaan','$kode_bursa','$link_reuters','$sektor')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
