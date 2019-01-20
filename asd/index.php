<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT company.id_company, company.name_company, company.desc_company, sector.name_sector, company.image, company.stock_price, company.beta, company.using_dollar, company.current_asset1, company.current_asset2, company.current_l1, company.current_l2, company.outstanding_share, company.total_equity, company.net_income, company.capital_expenditure, company.depreciation, company.dividend_payment, company.total_l12, company.interest_expense, company.ebit, company.eps, company.new_debt_issued, company.debt_repayment FROM company INNER JOIN sector ON company.id_sector = sector.id_sector ORDER BY id_company"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.php">Add New Data</a><br/><br/>

	<table width='80%' border=1>

	<tr bgcolor='#CCCCCC'>
		<td>Company Code</td>
		<td>Company Name</td>
		<td>Company Description</td>
		<td>Company Sector</td>
		<td>Logo</td>
		<td>Last Stock Price</td>
		<td>Beta</td>
		<td>Using Dollar</td>
		<td>Last 1 Year Assets</td>
		<td>Last 2 Years Assets</td>
		<td>Last 1 Year Liabilities</td>
		<td>Last 2 Years Liabilities</td>
		<td>Outstanding Share</td>
		<td>Total Equity</td>
		<td>Net Income</td>
		<td>Capital Expenditure</td>
		<td>Depreciation</td>
		<td>Dividend Payment</td>
		<td>Total Liabilities</td>
		<td>Interest Expense</td>
		<td>EBIT</td>
		<td>EPS</td>
		<td>New Debt Issued</td>
		<td>Debt Repayment</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['id_company']."</td>";
		echo "<td>".$res['name_company']."</td>";
		echo "<td>".$res['desc_company']."</td>";
		echo "<td>".$res['name_sector']."</td>";
		echo "<td><img src=\"img/".$res['image']."\" width=\"100px\"/></td>";
		echo "<td>".$res['stock_price']."</td>";
		echo "<td>".$res['beta']."</td>";
		if ($res['using_dollar'] == 1) {
			echo "<td><strong>Yes</strong></td>";
		} else {
			echo "<td>No</td>";
		}
		echo "<td>".$res['current_asset1']."</td>";
		echo "<td>".$res['current_asset2']."</td>";
		echo "<td>".$res['current_l1']."</td>";
		echo "<td>".$res['current_l2']."</td>";
		echo "<td>".$res['outstanding_share']."</td>";
		echo "<td>".$res['total_equity']."</td>";
		echo "<td>".$res['net_income']."</td>";
		echo "<td>".$res['capital_expenditure']."</td>";
		echo "<td>".$res['depreciation']."</td>";
		echo "<td>".$res['dividend_payment']."</td>";
		echo "<td>".$res['total_l12']."</td>";
		echo "<td>".$res['interest_expense']."</td>";
		echo "<td>".$res['ebit']."</td>";
		echo "<td>".$res['eps']."</td>";
		echo "<td>".$res['new_debt_issued']."</td>";
		echo "<td>".$res['debt_repayment']."</td>";
		echo "<td><a href=\"edit.php?id=$res[id_company]\">Edit</a> | <a href=\"delete.php?id=$res[id_company]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>