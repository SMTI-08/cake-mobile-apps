<?php
include_once("config.php");

//Mendapatkan id data yang akan diedit dari halaman index.php
$id = $_GET['id'];

//Mendapatkan data yang akan diedit dari database, dari tabel company karena tabel company adalah tabel untuk inisialisasi data, setelah dihitung baru dipindahkan ke tabel companyprint
$result = mysqli_query($mysqli, "SELECT * FROM company WHERE id_company='$id'");

//Selama hasil kueri data tersebut
while($res = mysqli_fetch_array($result))
{
	//Variabel diisi dengan data hasil kueri
	$id_company = $res['id_company'];
	$name_company = $res['name_company'];
	$desc_company = $res['desc_company'];
	$id_sector = $res['id_sector'];
	$image = $res['image'];
	$stock_price = $res['stock_price'];
	$beta = $res['beta'];
	$using_dollar = $res['using_dollar'];
	$current_asset1 = $res['current_asset1'];
	$current_asset2 = $res['current_asset2'];
	$current_l1 = $res['current_l1'];
	$current_l2 = $res['current_l2'];
	$outstanding_share = $res['outstanding_share'];
	$total_equity = $res['total_equity'];
	$net_income = $res['net_income'];
	$capital_expenditure = $res['capital_expenditure'];
	$depreciation = $res['depreciation'];
	$dividend_payment = $res['dividend_payment'];
	$total_l12 = $res['total_l12'];
	$interest_expense = $res['interest_expense'];
	$ebit = $res['ebit'];
	$eps = $res['eps'];
	$new_debt_issued = $res['new_debt_issued'];
	$debt_repayment = $res['debt_repayment'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit1.php" enctype="multipart/form-data">
		<table border="0">
			<tr> 
				<td>Company Code</td>
				<!--Mencetak hasil kueri ke dalam form-->
				<td><input type="text" name="company_code" value="<?php echo $id_company; ?>"></td>
			</tr>
			<tr> 
				<td>Company Name</td>
				<td><input type="text" name="company_name" value="<?php echo $name_company; ?>"></td>
			</tr>
			<tr> 
				<td>Company Description</td>
				<td><textarea cols="50" rows="5" name="company_description"><?php echo $desc_company; ?></textarea></td>
			</tr>
			<tr> 
				<td>Company Sector</td>
				<td><select name="sector">
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
				<td><input type="file" name="logo" value="<?php echo $image; ?>"></td>
			</tr>
			<tr> 
				<td>Last Stock Price</td>
				<td><input type="text" name="last_price" value="<?php echo $stock_price; ?>"></td>
			</tr>
			<tr> 
				<td>Beta</td>
				<td><input type="text" name="beta" value="<?php echo $beta; ?>"></td>
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
				<td><input type="text" name="assets_1" value="<?php echo $current_asset1; ?>"></td>
			</tr>
			<tr> 
				<td>Last 2 Years Assets</td>
				<td><input type="text" name="assets_2" value="<?php echo $current_asset2; ?>"></td>
			</tr>
			<tr> 
				<td>Last 1 Year Liabilities</td>
				<td><input type="text" name="liabilities_1" value="<?php echo $current_l1; ?>"></td>
			</tr>
			<tr> 
				<td>Last 2 Years Liabilities</td>
				<td><input type="text" name="liabilities_2" value="<?php echo $current_l2; ?>"></td>
			</tr>
			<tr> 
				<td>Outstanding Share</td>
				<td><input type="text" name="outstanding" value="<?php echo $outstanding_share; ?>"></td>
			</tr>
			<tr> 
				<td>Total Equity</td>
				<td><input type="text" name="equity" value="<?php echo $total_equity; ?>"></td>
			</tr>
			<tr> 
				<td>Net Income</td>
				<td><input type="text" name="net_income" value="<?php echo $net_income; ?>"></td>
			</tr>
			<tr> 
				<td>Capital Expenditure</td>
				<td><input type="text" name="capital_expenditure" value="<?php echo $capital_expenditure; ?>"></td>
			</tr>
			<tr> 
				<td>Depreciation</td>
				<td><input type="text" name="depreciation" value="<?php echo $depreciation; ?>"></td>
			</tr>
			<tr> 
				<td>Dividend Payment</td>
				<td><input type="text" name="dividend" value="<?php echo $dividend_payment; ?>"></td>
			</tr>
			<tr> 
				<td>Total Liabilities</td>
				<td><input type="text" name="total_liabilities" value="<?php echo $total_l12; ?>"></td>
			</tr>
			<tr> 
				<td>Interest Expense</td>
				<td><input type="text" name="interest_expense" value="<?php echo $interest_expense; ?>"></td>
			</tr>
			<tr> 
				<td>EBIT</td>
				<td><input type="text" name="ebit" value="<?php echo $ebit; ?>"></td>
			</tr>
			<tr> 
				<td>EPS</td>
				<td><input type="text" name="eps" value="<?php echo $eps; ?>"></td>
			</tr>
			<tr> 
				<td>New Debt Issued</td>
				<td><input type="text" name="new_debt" value="<?php echo $new_debt_issued; ?>"></td>
			</tr>
			<tr> 
				<td>Debt Repayment</td>
				<td><input type="text" name="debt_repayment" value="<?php echo $debt_repayment; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $id;?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>