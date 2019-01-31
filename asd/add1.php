<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
include_once("config.php");

//Jika berasal dari tombol Submit yang ada di form Add
if(isset($_POST['Submit'])) {	
	//Variabel diisi dengan data yang telah diinput di masing-masing field
	$company_code = mysqli_real_escape_string($mysqli, $_POST['company_code']);
	$company_name = mysqli_real_escape_string($mysqli, $_POST['company_name']);
	$company_description = mysqli_real_escape_string($mysqli, $_POST['company_description']);
	$sector = mysqli_real_escape_string($mysqli, $_POST['sector']);
	$logo = $_FILES['logo']['name'];
	$tmp = $_FILES['logo']['tmp_name'];
	$path = "img/".$logo;
	$last_price = mysqli_real_escape_string($mysqli, $_POST['last_price']);
	$beta = mysqli_real_escape_string($mysqli, $_POST['beta']);
	$dollar = mysqli_real_escape_string($mysqli, $_POST['dollar']);
	$assets_1 = mysqli_real_escape_string($mysqli, $_POST['assets_1']);
	$assets_2 = mysqli_real_escape_string($mysqli, $_POST['assets_2']);
	$liabilities_1 = mysqli_real_escape_string($mysqli, $_POST['liabilities_1']);
	$liabilities_2 = mysqli_real_escape_string($mysqli, $_POST['liabilities_2']);
	$outstanding = mysqli_real_escape_string($mysqli, $_POST['outstanding']);
	$equity = mysqli_real_escape_string($mysqli, $_POST['equity']);
	$net_income = mysqli_real_escape_string($mysqli, $_POST['net_income']);
	$capital_expenditure = mysqli_real_escape_string($mysqli, $_POST['capital_expenditure']);
	$depreciation = mysqli_real_escape_string($mysqli, $_POST['depreciation']);
	$dividend = mysqli_real_escape_string($mysqli, $_POST['dividend']);
	$total_liabilities = mysqli_real_escape_string($mysqli, $_POST['total_liabilities']);
	$interest_expense = mysqli_real_escape_string($mysqli, $_POST['interest_expense']);
	$ebit = mysqli_real_escape_string($mysqli, $_POST['ebit']);
	$eps = mysqli_real_escape_string($mysqli, $_POST['eps']);
	$new_debt = mysqli_real_escape_string($mysqli, $_POST['new_debt']);
	$debt_repayment = mysqli_real_escape_string($mysqli, $_POST['debt_repayment']);
		
	//Jika terdapat field yang tidak diisi
	if(!isset($company_code) || !isset($company_name) || !isset($company_description) || !isset($sector) || !isset($logo) || !isset($last_price) || !isset($beta) || !isset($dollar) || !isset($assets_1) || !isset($assets_2) || !isset($liabilities_1) || !isset($liabilities_2) || !isset($outstanding) || !isset($equity) || !isset($net_income) || !isset($capital_expenditure) || !isset($depreciation) || !isset($dividend) || !isset($total_liabilities) || !isset($interest_expense) || !isset($ebit) || !isset($eps) || !isset($new_debt) || !isset($debt_repayment)) {
				
		//Penanganan error masing-masing field
		if(!isset($company_code)) {
			echo "<font color='red'>id_company field is empty.</font><br/>";
		}
		
		if(!isset($company_name)) {
			echo "<font color='red'>name_company field is empty.</font><br/>";
		}

		if(!isset($company_description)) {
			echo "<font color='red'>desc_company field is empty.</font><br/>";
		}

		if(!isset($sector)) {
			echo "<font color='red'>id_sector field is empty.</font><br/>";
		}

		if(!isset($logo)) {
			echo "<font color='red'>image field is empty.</font><br/>";
		}

		if(!isset($last_price)) {
			echo "<font color='red'>stock_price field is empty.</font><br/>";
		}

		if(!isset($beta)) {
			echo "<font color='red'>beta field is empty.</font><br/>";
		}

		if(!isset($dollar)) {
			echo "<font color='red'>using_dollar field is empty.</font><br/>";
		}

		if(!isset($assets_1)) {
			echo "<font color='red'>current_asset1 field is empty.</font><br/>";
		}

		if(!isset($assets_2)) {
			echo "<font color='red'>current_asset2 field is empty.</font><br/>";
		}

		if(!isset($liabilities_1)) {
			echo "<font color='red'>current_l1 field is empty.</font><br/>";
		}

		if(!isset($liabilities_2)) {
			echo "<font color='red'>current_l2 field is empty.</font><br/>";
		}

		if(!isset($outstanding)) {
			echo "<font color='red'>outstanding_share field is empty.</font><br/>";
		}

		if(!isset($equity)) {
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

		if(!isset($dividend)) {
			echo "<font color='red'>dividend_payment field is empty.</font><br/>";
		}

		if(!isset($total_liabilities)) {
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

		if(!isset($new_debt)) {
			echo "<font color='red'>new_debt_issued field is empty.</font><br/>";
		}

		if(!isset($debt_repayment)) {
			echo "<font color='red'>debt_repayment field is empty.</font><br/>";
		}
		
		//Tombol kembali jika terdapat field yang tidak diisi
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		//Jika semua field telah diisi
			
		//Kueri ke dalam database
		$a = "INSERT INTO company (id_company,name_company,desc_company,image,stock_price,beta,using_dollar,current_asset1,current_asset2,current_l1,current_l2,outstanding_share,total_equity,net_income,capital_expenditure,depreciation,dividend_payment,total_l12,interest_expense,ebit,eps,new_debt_issued,debt_repayment,id_sector) VALUES('$company_code','$company_name','$company_description','$logo','$last_price','$beta','$dollar','$assets_1','$assets_2','$liabilities_1','$liabilities_2','$outstanding','$equity','$net_income','$capital_expenditure','$depreciation','$dividend','$total_liabilities','$interest_expense','$ebit','$eps','$new_debt','$debt_repayment','$sector')";

		//Kueri ke dalam tabel companyprint untuk 'memesan tempat' sehingga nanti ketika terjadi perhitungan sudah ada datanya dan tidak terjadi error "No Record"
		$b = "INSERT INTO companyprint (id_company,name_company,desc_company,image,stock_price,beta,using_dollar,current_asset1,current_asset2,current_l1,current_l2,outstanding_share,total_equity,net_income,capital_expenditure,depreciation,dividend_payment,total_l12,interest_expense,ebit,eps,new_debt_issued,debt_repayment,id_sector,updated_using,updated_at) VALUES('$company_code','$company_name','$company_description','$logo','$last_price','$beta','$dollar','$assets_1','$assets_2','$liabilities_1','$liabilities_2','$outstanding','$equity','$net_income','$capital_expenditure','$depreciation','$dividend','$total_liabilities','$interest_expense','$ebit','$eps','$new_debt','$debt_repayment','$sector','','')";

		//HARUS MEMASUKKAN LOGO KETIKA ADD COMPANY, jika logo berhasil diupload
		if (move_uploaded_file($tmp, $path)) {
			$result = mysqli_query($mysqli, $a);
			$result = mysqli_query($mysqli, $b);
			//Jika kueri berhasil dieksekusi
			if($result){
				echo "<font color='green'>Data added successfully.";
				echo "<br/><a href='index.php'>Back to Home</a>";
			} else { //Jika gagal
				echo $a."<br>";
				printf("Errormessage: %s\n", $mysqli->error);
			}
		}
	}
}
?>
</body>
</html>