<?php
//Konfigurasi koneksi database
include_once("config.php");
?>
<html>
<head>
	<title>Add Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<!--Membuat form Add yang dieksekusi menggunakan file add1.php dengan method POST. Enctype berguna untuk menangani upload file-->
	<form action="add1.php" method="post" name="form1" enctype="multipart/form-data">
		<table width="25%" border="0">
			<tr> 
				<td>Company Code</td>
				<td><input type="text" name="company_code"></td>
			</tr>
			<tr> 
				<td>Company Name</td>
				<td><input type="text" name="company_name"></td>
			</tr>
			<tr> 
				<td>Company Description</td>
				<td><textarea cols="50" rows="5" name="company_description"></textarea></td>
			</tr>
			<tr> 
				<td>Company Sector</td>
				<td><select name="sector">
				    <!--Memuat daftar sektor dari database-->
					<?php
						$sql = mysqli_query($mysqli, "SELECT * FROM sector");
						while ($row = $sql->fetch_assoc()) {
							echo "<option value=\"".$row['id_sector']."\">".$row['name_sector']."</option>";
						}
					?>
				</select></td>
			</tr>
			<tr>
				<td>Company Logo</td>
				<td><input type="file" name="logo"></td>
			</tr>
			<tr> 
				<td>Last Stock Price</td>
				<td><input type="text" name="last_price"></td>
			</tr>
			<tr> 
				<td>Beta</td>
				<td><input type="text" name="beta"></td>
			</tr>
			<tr> 
				<td>Using Dollar?</td>
				<td><select name="dollar">
					<option value="0">No</option>
					<option value="1">Yes</option>
				</select></td>
			</tr>
			<tr> 
				<td>Last 1 Year Assets</td>
				<td><input type="text" name="assets_1"></td>
			</tr>
			<tr> 
				<td>Last 2 Years Assets</td>
				<td><input type="text" name="assets_2"></td>
			</tr>
			<tr> 
				<td>Last 1 Year Liabilities</td>
				<td><input type="text" name="liabilities_1"></td>
			</tr>
			<tr> 
				<td>Last 2 Years Liabilities</td>
				<td><input type="text" name="liabilities_2"></td>
			</tr>
			<tr> 
				<td>Outstanding Share</td>
				<td><input type="text" name="outstanding"></td>
			</tr>
			<tr> 
				<td>Total Equity</td>
				<td><input type="text" name="equity"></td>
			</tr>
			<tr> 
				<td>Net Income</td>
				<td><input type="text" name="net_income"></td>
			</tr>
			<tr> 
				<td>Capital Expenditure</td>
				<td><input type="text" name="capital_expenditure"></td>
			</tr>
			<tr> 
				<td>Depreciation</td>
				<td><input type="text" name="depreciation"></td>
			</tr>
			<tr> 
				<td>Dividend Payment</td>
				<td><input type="text" name="dividend"></td>
			</tr>
			<tr> 
				<td>Total Liabilities</td>
				<td><input type="text" name="total_liabilities"></td>
			</tr>
			<tr> 
				<td>Interest Expense</td>
				<td><input type="text" name="interest_expense"></td>
			</tr>
			<tr> 
				<td>EBIT</td>
				<td><input type="text" name="ebit"></td>
			</tr>
			<tr> 
				<td>EPS</td>
				<td><input type="text" name="eps"></td>
			</tr>
			<tr> 
				<td>New Debt Issued</td>
				<td><input type="text" name="new_debt"></td>
			</tr>
			<tr> 
				<td>Debt Repayment</td>
				<td><input type="text" name="debt_repayment"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>