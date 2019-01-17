<?php
// including the database connection file
include_once("config.php");

//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM company WHERE kode_bursa='$id'");

while($res = mysqli_fetch_array($result))
{
	$name = $res['nama_perusahaan'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nama Perusahaan</td>
				<td><input type="text" name="nama_perusahaan" value="<?php echo $name;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	$name = mysqli_real_escape_string($mysqli, $_POST['nama_perusahaan']);
	
	// checking empty fields
	if(empty($name)) {
		echo "<font color='red'>nama_perusahaan field is empty.</font><br/>";
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE company SET nama_perusahaan='$name' WHERE kode_bursa='$id'");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>