<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT company.id, company.kode_bursa, company.nama_perusahaan, sektor.nama_sektor, company.link_reuters, company.foto FROM company INNER JOIN sektor ON company.sektor = sektor.id ORDER BY kode_bursa"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.php">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Kode Bursa</td>
		<td>Nama Perusahaan</td>
		<td>Sektor Usaha</td>
		<td>Link Reuters</td>
		<td>Ikon Perusahaan</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['kode_bursa']."</td>";
		echo "<td>".$res['nama_perusahaan']."</td>";
		echo "<td>".$res['nama_sektor']."</td>";
		echo "<td>".$res['link_reuters']."</td>";
		echo "<td><img src=\"img/".$res['foto']."\"/></td>";
		echo "<td><a href=\"edit.php?id=$res[kode_bursa]\">Edit</a> | <a href=\"delete.php?id=$res[kode_bursa]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>