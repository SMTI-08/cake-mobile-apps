<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	$id_company = mysqli_real_escape_string($mysqli, $_POST['company_code']);
	$name_company = mysqli_real_escape_string($mysqli, $_POST['company_name']);
	$desc_company = mysqli_real_escape_string($mysqli, $_POST['company_description']);
	$id_sector = mysqli_real_escape_string($mysqli, $_POST['sector']);
	$image = $_FILES['logo']['name'];
	$tmp = $_FILES['logo']['tmp_name'];
	$path = "img/".$image;
	$stock_price = mysqli_real_escape_string($mysqli, $_POST['last_price']);
	$beta = mysqli_real_escape_string($mysqli, $_POST['beta']);
	$using_dollar = mysqli_real_escape_string($mysqli, $_POST['dollar']);
	$current_asset1 = mysqli_real_escape_string($mysqli, $_POST['assets_1']);
	$current_asset2 = mysqli_real_escape_string($mysqli, $_POST['assets_2']);
	$current_l1 = mysqli_real_escape_string($mysqli, $_POST['liabilities_1']);
	$current_l2 = mysqli_real_escape_string($mysqli, $_POST['liabilities_2']);
	$outstanding_share = mysqli_real_escape_string($mysqli, $_POST['outstanding']);
	$total_equity = mysqli_real_escape_string($mysqli, $_POST['equity']);
	$net_income = mysqli_real_escape_string($mysqli, $_POST['net_income']);
	$capital_expenditure = mysqli_real_escape_string($mysqli, $_POST['capital_expenditure']);
	$depreciation = mysqli_real_escape_string($mysqli, $_POST['depreciation']);
	$dividend_payment = mysqli_real_escape_string($mysqli, $_POST['dividend']);
	$total_l12 = mysqli_real_escape_string($mysqli, $_POST['total_liabilities']);
	$interest_expense = mysqli_real_escape_string($mysqli, $_POST['interest_expense']);
	$ebit = mysqli_real_escape_string($mysqli, $_POST['ebit']);
	$eps = mysqli_real_escape_string($mysqli, $_POST['eps']);
	$new_debt_issued = mysqli_real_escape_string($mysqli, $_POST['new_debt']);
	$debt_repayment = mysqli_real_escape_string($mysqli, $_POST['debt_repayment']);
	
	// checking empty fields
	if(!isset($id_company) || !isset($name_company) || !isset($desc_company) || !isset($id_sector) || !isset($image) || !isset($stock_price) || !isset($beta) || !isset($using_dollar) || !isset($current_asset1) || !isset($current_asset2) || !isset($current_l1) || !isset($current_l2) || !isset($outstanding_share) || !isset($total_equity) || !isset($net_income) || !isset($capital_expenditure) || !isset($depreciation) || !isset($dividend_payment) || !isset($total_l12) || !isset($interest_expense) || !isset($ebit) || !isset($eps) || !isset($new_debt_issued) || !isset($debt_repayment)) {
		
		if(!isset($id_company)) {
			echo "<font color='red'>id_company field is empty.</font><br/>";
		}
		
		if(!isset($name_company)) {
			echo "<font color='red'>name_company field is empty.</font><br/>";
		}

		if(!isset($desc_company)) {
			echo "<font color='red'>desc_company field is empty.</font><br/>";
		}

		if(!isset($id_sector)) {
			echo "<font color='red'>id_sector field is empty.</font><br/>";
		}

		if(!isset($image)) {
			echo "<font color='red'>image field is empty.</font><br/>";
		}

		if(!isset($stock_price)) {
			echo "<font color='red'>stock_price field is empty.</font><br/>";
		}

		if(!isset($beta)) {
			echo "<font color='red'>beta field is empty.</font><br/>";
		}

		if(!isset($using_dollar)) {
			echo "<font color='red'>using_dollar field is empty.</font><br/>";
		}

		if(!isset($current_asset1)) {
			echo "<font color='red'>current_asset1 field is empty.</font><br/>";
		}

		if(!isset($current_asset2)) {
			echo "<font color='red'>current_asset2 field is empty.</font><br/>";
		}

		if(!isset($current_l1)) {
			echo "<font color='red'>current_l1 field is empty.</font><br/>";
		}

		if(!isset($current_l2)) {
			echo "<font color='red'>current_l2 field is empty.</font><br/>";
		}

		if(!isset($outstanding_share)) {
			echo "<font color='red'>outstanding_share field is empty.</font><br/>";
		}

		if(!isset($total_equity)) {
			echo "<font color='red'>total_equity field is empty.</font><br/>";
		}

		if(!isset($net_income)) {
			echo "<font color='red'>net_income field is empty.</font><br/>";
		}

		if(!isset($capital_expenditure)) {
			echo "<font color='red'>capital_expenditure field is empty.</font><br/>";
		}

		if(!isset($depreciation)) {
			echo "<font color='red'>depreciation field is empty.</font><br/>";
		}

		if(!isset($dividend_payment)) {
			echo "<font color='red'>dividend_payment field is empty.</font><br/>";
		}

		if(!isset($total_l12)) {
			echo "<font color='red'>total_l12 field is empty.</font><br/>";
		}

		if(!isset($interest_expense)) {
			echo "<font color='red'>interest_expense field is empty.</font><br/>";
		}

		if(!isset($ebit)) {
			echo "<font color='red'>ebit field is empty.</font><br/>";
		}

		if(!isset($eps)) {
			echo "<font color='red'>eps field is empty.</font><br/>";
		}

		if(!isset($new_debt_issued)) {
			echo "<font color='red'>new_debt_issued field is empty.</font><br/>";
		}

		if(!isset($debt_repayment)) {
			echo "<font color='red'>debt_repayment field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {	
		//updating the table
		$a = "UPDATE company SET id_company='$id_company',name_company='$name_company',desc_company='$desc_company',image='$image',stock_price='$stock_price',beta='$beta',using_dollar='$using_dollar',current_asset1='$current_asset1',current_asset2='$current_asset2',current_l1='$current_l1',current_l2='$current_l2',outstanding_share='$outstanding_share',total_equity='$total_equity',net_income='$net_income',capital_expenditure='$capital_expenditure',depreciation='$depreciation',dividend_payment='$dividend_payment',total_l12='$total_l12',interest_expense='$interest_expense',ebit='$ebit',eps='$eps',new_debt_issued='$new_debt_issued',debt_repayment='$debt_repayment',id_sector='$id_sector' WHERE id_company='$id'";

		if (move_uploaded_file($tmp, $path)) {
			$result = mysqli_query($mysqli, $a);
			if($result){
				//display success message
				echo "<font color='green'>Data edited successfully.";
				echo "<br/><a href='index.php'>Back to Home</a>";
			} else {
				echo $a."<br>";
				printf("Errormessage: %s\n", $mysqli->error);
			}
		}
	}
}
?>