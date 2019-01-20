<?php
	include_once("config.php");
	require "Company.php";
	date_default_timezone_set("Asia/Bangkok");

	//$id = $_GET['id'];
	$result = mysqli_query($mysqli, "SELECT * FROM kurs WHERE id_kurs=1");
	while($res = mysqli_fetch_array($result)){
		$kurs = $res['value'];
	}

	$result = mysqli_query($mysqli, "SELECT * FROM company");
	while($res = mysqli_fetch_array($result)){
		$harga_saham = $res['stock_price'];
		$beta = $res['beta'];
		$outstanding_share = $res['outstanding_share'];
		if ($res['using_dollar'] == 1) {
			$current_asset1 = $kurs * $res['current_asset1'];
			$current_asset2 = $kurs * $res['current_asset2'];
			$current_l1 = $kurs * $res['current_l1'];
			$current_l2 = $kurs * $res['current_l2'];
			$total_equity = $kurs * $res['total_equity'];
			$net_income = $kurs * $res['net_income'];
			$capital_expenditure = $kurs * $res['capital_expenditure'];
			$depreciation = $kurs * $res['depreciation'];
			$dividend_payment = $kurs * $res['dividend_payment'];
			$total_l12 = $kurs * $res['total_l12'];
			$interest_expense = $kurs * $res['interest_expense'];
			$ebit = $kurs * $res['ebit'];
			$eps = $kurs * $res['eps'];
			$new_debt_issued = $kurs * $res['new_debt_issued'];
			$debt_repayment = $kurs * $res['debt_repayment'];
		} else {
			$current_asset1 = $res['current_asset1'];
			$current_asset2 = $res['current_asset2'];
			$current_l1 = $res['current_l1'];
			$current_l2 = $res['current_l2'];
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

		$companyBase = new Company($current_asset1, $current_asset2, $current_l1, $current_l2, $outstanding_share, $total_equity, $net_income, $capital_expenditure, $depreciation, $dividend_payment, $beta);
		$companyFCFF = new FCFF($companyBase, $total_l12, $interest_expense, $ebit);
		$companyFCFE = new FCFE($companyBase, $eps, $new_debt_issued, $debt_repayment);

		if (abs($harga_saham - $companyFCFF->intrinsicValue) < abs($harga_saham - $companyFCFE->intrinsicValue)) {
			
			$kueri = "UPDATE companyprint SET name_company='".$res['name_company']."',
				desc_company='".$res['desc_company']."',
				image='".$res['image']."',
				id_sector=".$res['id_sector'].",
				stock_price='".rupiah($harga_saham)."', 
				beta=$beta,
				current_asset1='".rupiah($current_asset1)."', 
				current_asset2='".rupiah($current_asset2)."', 
				current_l1='".rupiah($current_l1)."', 
				current_l2='".rupiah($current_l2)."', 
				outstanding_share='".formatter($outstanding_share)."', 
				total_equity='".rupiah($total_equity)."', 
				net_income='".rupiah($net_income)."', 
				capital_expenditure='".rupiah($capital_expenditure)."',
				depreciation='".rupiah($depreciation)."', 
				cwc='".rupiah($companyFCFF->parentObject->changesInWorkingCapital)."', 
				dividend_payment='".rupiah($dividend_payment)."', 
				capm='".percentator($companyFCFF->parentObject->costOfEquity)."%"."', 
				dividend_payout='".percentator($companyFCFF->parentObject->dividendPayoutRatio)."%"."', 
				retention_ratio='".percentator($companyFCFF->parentObject->retentionRatio)."%"."', 
				total_asset='".rupiah($companyFCFF->totalAssets)."', 
				total_l12='".rupiah($total_l12)."', 
				interest_expense='".rupiah($interest_expense)."', 
				ebit='".rupiah($ebit)."', 
				fcff='".rupiah($companyFCFF->fcff)."', 
				cost_debt='".percentator($companyFCFF->costOfDebt)."%"."', 
				wacc='".percentator($companyFCFF->weightedAverageCostOfCapital)."%"."', 
				return_capital='".percentator($companyFCFF->returnOnCapital)."%"."', 
				expected_growth_fcff='".percentator($companyFCFF->expectedGrowthRate)."%"."', 
				intrinsik_fcff='".rupiah($companyFCFF->intrinsicValue)."',
				updated_using='FCFF',
				updated_at='".date('d-m-Y H:i:s')."',
				fcfe='',
				return_equity='',
				expected_growth_fcfe='',
				intrinsik_fcfe=''
				WHERE id_company='".$res['id_company']."';";

			$updateCompany = mysqli_query($mysqli, $kueri);
			if(!$updateCompany){
				printf("Errormessage: %s\n", $mysqli->error);
			}
		} else { 

			$kueri = "UPDATE companyprint SET name_company='".$res['name_company']."',
				desc_company='".$res['desc_company']."',
				image='".$res['image']."',
				id_sector=".$res['id_sector'].",
				stock_price='".rupiah($harga_saham)."', 
				beta=$beta,
				current_asset1='".rupiah($current_asset1)."', 
				current_asset2='".rupiah($current_asset2)."', 
				current_l1='".rupiah($current_l1)."', 
				current_l2='".rupiah($current_l2)."', 
				outstanding_share='".formatter($outstanding_share)."', 
				total_equity='".rupiah($total_equity)."', 
				net_income='".rupiah($net_income)."', 
				capital_expenditure='".rupiah($capital_expenditure)."',
				depreciation='".rupiah($depreciation)."', 
				cwc='".rupiah($companyFCFF->parentObject->changesInWorkingCapital)."', 
				dividend_payment='".rupiah($dividend_payment)."', 
				capm='".percentator($companyFCFF->parentObject->costOfEquity)."%"."', 
				dividend_payout='".percentator($companyFCFF->parentObject->dividendPayoutRatio)."%"."', 
				retention_ratio='".percentator($companyFCFF->parentObject->retentionRatio)."%"."', 
				eps='".rupiah($companyFCFE->eps)."', 
				new_debt_issued='".rupiah($new_debt_issued)."', 
				debt_repayment='".rupiah($debt_repayment)."', 
				fcfe='".rupiah($companyFCFE->fcfe)."', 
				return_equity='".percentator($companyFCFE->returnOnEquity)."%"."', 
				expected_growth_fcfe='".percentator($companyFCFE->expectedGrowthRate)."%"."', 
				intrinsik_fcfe='".rupiah($companyFCFE->intrinsicValue)."',
				updated_using='FCFE',
				updated_at='".date('d-m-Y H:i:s')."',
				total_asset='',
				fcff='',
				cost_debt='',
				wacc='',
				return_capital='',
				expected_growth_fcff='',
				intrinsik_fcff=''
				WHERE id_company='".$res['id_company']."';";

			$updateCompany = mysqli_query($mysqli, $kueri);
			if(!$updateCompany){
				printf("Errormessage: %s\n", $mysqli->error);
			}
		}
	}
	function percentator($num){
		return $num * 100;
	}
	function rupiah($angka){
		$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
		return $hasil_rupiah;
	}
	function formatter($angka){
		$hasil = number_format($angka,0,',','.');
		return $hasil;
	}
?>