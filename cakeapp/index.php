<?php
	//require "FCFF.php"
	require "Company.php"
?>
<!DOCTYPE html>
<html>
<head>
	<title>FCFF & FCFE</title>
	<style>
		td{text-align: right;}
	</style>
</head>
<body>
	<?php
		$b = new Company(2449405299014, 2830227702473, 311709573423, 255113007336, 14550736000, 4030514864860, 708761732542, 421198798639, 113026440522, 494725024000, 0.07375, 0.2037, 1.78, 0.05092);
		$a = new FCFF($b, 681524616665, 13211605971, 759757945109, 0.25);
		$c = new Company(24817671201079, 16835408075068, 17633289239294, 13044369547114, 3560849376, 5869917425997, 517059848207, 166382523972, 118904438290, 494725024000, 0.07375, 0.2037, 1.93, 0.05092);
		$d = new FCFE($c, 144.75, 7719737459041, 3539218495563);
	?>
	<h1>FCFF</h1>
	<table border="1">
		<tr>
			<th></th>
			<th>2016</th>
			<th>2017</th>
		</tr>
		<tr>
			<th>Current Assets</th>
			<td><?php echo rupiah($a->parentObject->currentAssets2YearAgo); ?></td>
			<td><?php echo rupiah($a->parentObject->currentAssets1YearAgo); ?></td>
		</tr>
		<tr>
			<th>Total Assets</th>
			<td></td>
			<td><?php echo rupiah($a->totalAssets); ?></td>
		</tr>
		<tr>
			<th>Current Liabilities</th>
			<td><?php echo rupiah($a->parentObject->currentLiabilities2YearAgo); ?></td>
			<td><?php echo rupiah($a->parentObject->currentLiabilities1YearAgo); ?></td>
		</tr>
		<tr>
			<th>Total Liabilities</th>
			<td></td>
			<td><?php echo rupiah($a->totalLiabilities); ?></td>
		</tr>
		<tr>
			<th>Outstanding Share</th>
			<td></td>
			<td><?php echo rupiah($a->parentObject->outstandingShare); ?></td>
		</tr>
		<tr>
			<th>Total Equity</th>
			<td></td>
			<td><?php echo rupiah($a->parentObject->totalEquity); ?></td>
		</tr>
		<tr>
			<th>Interest Expense</th>
			<td></td>
			<td><?php echo rupiah($a->interestExpense); ?></td>
		</tr>
		<tr>
			<th>EBIT</th>
			<td></td>
			<td><?php echo rupiah($a->ebit); ?></td>
		</tr>
		<tr>
			<th>Net Income</th>
			<td></td>
			<td><?php echo rupiah($a->parentObject->netIncome); ?></td>
		</tr>
		<tr>
			<th>Capital Expenditure</th>
			<td></td>
			<td><?php echo rupiah($a->parentObject->capitalExpenditure); ?></td>
		</tr>
		<tr>
			<th>Depreciation</th>
			<td></td>
			<td><?php echo rupiah($a->parentObject->depreciation); ?></td>
		</tr>
		<tr>
			<th>Changes in Working Capital</th>
			<td></td>
			<td><?php echo rupiah($a->parentObject->changesInWorkingCapital); ?></td>
		</tr>
		<tr>
			<th>Dividend Payment</th>
			<td></td>
			<td><?php echo rupiah($a->parentObject->dividendPayment); ?></td>
		</tr>
		<tr>
			<th>FCFF</th>
			<td></td>
			<td><?php echo rupiah($a->fcff); ?></td>
		</tr>
	</table>
	<br>
	<table border="1">
		<tr>
			<th>Tax Rate</th>
			<td><?php echo percentator($a->taxRate)."%"; ?></td>
		</tr>
		<tr>
			<th>Risk Free Rate</th>
			<td><?php echo percentator($a->parentObject->riskFreeRate)."%"; ?></td>
		</tr>
		<tr>
			<th>Expected Market Return</th>
			<td><?php echo percentator($a->parentObject->expectedMarketReturn)."%"; ?></td>
		</tr>
		<tr>
			<th>Beta</th>
			<td><?php echo $a->parentObject->beta; ?></td>
		</tr>
		<tr>
			<th>Cost of Equity (CAPM)</th>
			<td><?php echo percentator($a->parentObject->costOfEquity)."%"; ?></td>
		</tr>
		<tr>
			<th>Cost of Debt (After Tax)</th>
			<td><?php echo percentator($a->costOfDebt)."%"; ?></td>
		</tr>
		<tr>
			<th>Weighted Average Cost of Capital</th>
			<td><?php echo percentator($a->weightedAverageCostOfCapital)."%"; ?></td>
		</tr>
	</table>
	<br>
	<table border="1">
		<tr>
			<th>Return on Capital</th>
			<td><?php echo percentator($a->returnOnCapital)."%"; ?></td>
		</tr>
		<tr>
			<th>Dividend Payout Ratio</th>
			<td><?php echo percentator($a->parentObject->dividendPayoutRatio)."%"; ?></td>
		</tr>
		<tr>
			<th>Retention Ratio</th>
			<td><?php echo percentator($a->parentObject->retentionRatio)."%"; ?></td>
		</tr>
		<tr>
			<th>Expected Growth Rate</th>
			<td><?php echo percentator($a->expectedGrowthRate)."%"; ?></td>
		</tr>
		<tr>
			<th>Stable Growth</th>
			<td><?php echo percentator($a->parentObject->stableGrowth)."%"; ?></td>
		</tr>
	</table>
	<br>
	<table border="1">
		<tr>
			<th>Intrinsic Value</th>
			<th><?php echo rupiah($a->intrinsicValue); ?></th>
		</tr>
	</table>
	<h1>FCFE</h1>
	<table border="1">
		<tr>
			<th></th>
			<th>2015</th>
			<th>2016</th>
		</tr>
		<tr>
			<th>Current Assets</th>
			<td><?php echo rupiah($d->parentObject->currentAssets2YearAgo); ?></td>
			<td><?php echo rupiah($d->parentObject->currentAssets1YearAgo); ?></td>
		</tr>
		<tr>
			<th>Current Liabilities</th>
			<td><?php echo rupiah($d->parentObject->currentLiabilities2YearAgo); ?></td>
			<td><?php echo rupiah($d->parentObject->currentLiabilities1YearAgo); ?></td>
		</tr>
		<tr>
			<th>Outstanding Share</th>
			<td></td>
			<td><?php echo rupiah($d->parentObject->outstandingShare); ?></td>
		</tr>
		<tr>
			<th>Total Equity</th>
			<td></td>
			<td><?php echo rupiah($d->parentObject->totalEquity); ?></td>
		</tr>
		<tr>
			<th>Net Income</th>
			<td></td>
			<td><?php echo rupiah($d->parentObject->netIncome); ?></td>
		</tr>
		<tr>
			<th>EPS</th>
			<td></td>
			<td><?php echo rupiah($d->eps); ?></td>
		</tr>
		<tr>
			<th>Capital Expenditure</th>
			<td></td>
			<td><?php echo rupiah($d->parentObject->capitalExpenditure); ?></td>
		</tr>
		<tr>
			<th>Depreciation</th>
			<td></td>
			<td><?php echo rupiah($d->parentObject->depreciation); ?></td>
		</tr>
		<tr>
			<th>Changes in Working Capital</th>
			<td></td>
			<td><?php echo rupiah($d->parentObject->changesInWorkingCapital); ?></td>
		</tr>
		<tr>
			<th>New Debt Issued</th>
			<td></td>
			<td><?php echo rupiah($d->newDebtIssued); ?></td>
		</tr>
		<tr>
			<th>Debt Repayment</th>
			<td></td>
			<td><?php echo rupiah($d->debtRepayment); ?></td>
		</tr>
		<tr>
			<th>Dividend Payment</th>
			<td></td>
			<td><?php echo rupiah($d->parentObject->dividendPayment); ?></td>
		</tr>
		<tr>
			<th>FCFE</th>
			<td></td>
			<td><?php echo rupiah($d->fcfe); ?></td>
		</tr>
	</table>
	<br>
	<table border="1">
		<tr>
			<th>Risk Free Rate</th>
			<td><?php echo percentator($d->parentObject->riskFreeRate)."%"; ?></td>
		</tr>
		<tr>
			<th>Expected Market Return</th>
			<td><?php echo percentator($d->parentObject->expectedMarketReturn)."%"; ?></td>
		</tr>
		<tr>
			<th>Beta</th>
			<td><?php echo $d->parentObject->beta; ?></td>
		</tr>
		<tr>
			<th>Cost of Equity (CAPM)</th>
			<td><?php echo percentator($d->parentObject->costOfEquity)."%"; ?></td>
		</tr>
	</table>
	<br>
	<table border="1">
		<tr>
			<th>Return on Equity</th>
			<td><?php echo percentator($d->returnOnEquity)."%"; ?></td>
		</tr>
		<tr>
			<th>Dividend Payout Ratio</th>
			<td><?php echo percentator($d->parentObject->dividendPayoutRatio)."%"; ?></td>
		</tr>
		<tr>
			<th>Retention Ratio</th>
			<td><?php echo percentator($d->parentObject->retentionRatio)."%"; ?></td>
		</tr>
		<tr>
			<th>Expected Growth Rate</th>
			<td><?php echo percentator($d->expectedGrowthRate)."%"; ?></td>
		</tr>
		<tr>
			<th>Stable Growth</th>
			<td><?php echo percentator($d->parentObject->stableGrowth)."%"; ?></td>
		</tr>
	</table>
	<br>
	<table border="1">
		<tr>
			<th>Intrinsic Value</th>
			<th><?php echo rupiah($d->intrinsicValue); ?></th>
		</tr>
	</table>
	<?php
		function percentator($num){
			return $num * 100;
		}
		function rupiah($angka){
			$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
			return $hasil_rupiah;
		}
	?>
</body>
</html>