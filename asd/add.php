<?php
include_once("config.php");
?>
<html>
<head>
	<title>Add Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<form action="add1.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Kode Bursa</td>
				<td><input type="text" name="nama_perusahaan"></td>
			</tr>
			<tr> 
				<td>Nama Perusahaan</td>
				<td><input type="text" name="kode_bursa"></td>
			</tr>
			<tr> 
				<td>Sektor Perusahaan</td>
				<td><select name="sektor">
					<?php
						$sql = mysqli_query($mysqli, "SELECT * FROM sektor");
						while ($row = $sql->fetch_assoc()) {
							echo "<option value=\"".$row['id']."\">".$row['nama_sektor']."</option>";
						}
					?>
				</select></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>

