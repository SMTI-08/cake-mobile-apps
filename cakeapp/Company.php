<?php
	/**
	 * 
	 */
	class Company
	{
		public $currentAssets1YearAgo, $currentAssets2YearAgo, $currentLiabilities1YearAgo, $currentLiabilities2YearAgo, $outstandingShare, $totalEquity, $netIncome, $capitalExpenditure, $depreciation, $dividendPayment, $riskFreeRate, $expectedMarketReturn, $beta, $changesInWorkingCapital, $costOfEquity, $dividendPayoutRatio, $retentionRatio, $stableGrowth;

		function __construct($currAsset1YrAgo, $currAsset2YrAgo, $currLiab1YrAgo, $currLiab2YrAgo, $outstdShare, $totEqty, $netIncm, $cptlExpndtr, $deprc, $dvdPymnt, $rskFreeRte, $expctMarketRtn, $bt, $stblGrwth)
		{
			$this->currentAssets1YearAgo = $currAsset1YrAgo;
			$this->currentAssets2YearAgo = $currAsset2YrAgo;
			$this->currentLiabilities1YearAgo = $currLiab1YrAgo;
			$this->currentLiabilities2YearAgo = $currLiab2YrAgo;
			$this->outstandingShare = $outstdShare;
			$this->totalEquity = $totEqty;
			$this->netIncome = $netIncm;
			$this->capitalExpenditure = $cptlExpndtr;
			$this->depreciation = $deprc;
			$this->dividendPayment = $dvdPymnt;
			$this->riskFreeRate = $rskFreeRte;
			$this->expectedMarketReturn = $expctMarketRtn;
			$this->beta = $bt;
			$this->stableGrowth = $stblGrwth;
			$this->changesInWorkingCapital = $this->getChangesInWorkingCapital();
			$this->costOfEquity = $this->getCostOfEquity();
			$this->dividendPayoutRatio = $this->getDividendPayoutRatio();
			$this->retentionRatio = $this->getRetentionRatio();
		}
		function set_currentAssets1YearAgo($newCurrAsset1YrAgo){
			$this->currentAssets1YearAgo = $newCurrAsset1YrAgo;
		}
		function get_currentAssets1YearAgo(){
			return $this->currentAssets1YearAgo;
		}
		function set_currentAssets2YearAgo($newCurrAsset2YrAgo){
			$this->currentAssets2YearAgo = $newCurrAsset2YrAgo;
		}
		function get_currentAssets2YearAgo(){
			return $this->currentAssets2YearAgo;
		}
		function set_currentLiabilities1YearAgo($newCurrLiab1YrAgo){
			$this->currentLiabilities1YearAgo = $newCurrLiab1YrAgo;
		}
		function get_currentLiabilities1YearAgo(){
			return $this->currentLiabilities1YearAgo;
		}
		function set_currentLiabilities2YearAgo($newCurrLiab2YrAgo){
			$this->currentLiabilities2YearAgo = $newCurrLiab2YrAgo;
		}
		function get_currentLiabilities2YearAgo(){
			return $this->currentLiabilities2YearAgo;
		}
		function set_outstandingShare($newOutstdShare){
			$this->outstandingShare = $newOutstdShare;
		}
		function get_outstandingShare(){
			return $this->outstandingShare;
		}
		function set_totalEquity($newTotEqty){
			$this->totalEquity = $newTotEqty;
		}
		function get_totalEquity(){
			return $this->totalEquity;
		}
		function set_netIncome($newNetIncm){
			$this->netIncome = $newNetIncm;
		}
		function get_netIncome(){
			return $this->netIncome;
		}
		function set_capitalExpenditure($newCptlExpndtr){
			$this->capitalExpenditure = $newCptlExpndtr;
		}
		function get_capitalExpenditure(){
			return $this->capitalExpenditure;
		}
		function set_depreciation($newDeprc){
			$this->depreciation = $newDeprc;
		}
		function get_depreciation(){
			return $this->depreciation;
		}
		function set_dividendPayment($newDvdPymnt){
			$this->dividendPayment = $newDvdPymnt;
		}
		function get_dividendPayment(){
			return $this->dividendPayment;
		}
		function set_riskFreeRate($newRskFreeRte){
			$this->riskFreeRate = $newRskFreeRte;
		}
		function get_riskFreeRate(){
			return $this->riskFreeRate;
		}
		function set_expectedMarketReturn($newExpctMarketRtn){
			$this->expectedMarketReturn = $newExpctMarketRtn;
		}
		function get_expectedMarketReturn(){
			return $this->expectedMarketReturn;
		}
		function set_beta($newBt){
			$this->beta = $newBt;
		}
		function get_beta(){
			return $this->beta;
		}
		function getChangesInWorkingCapital(){
			return ($this->currentAssets1YearAgo-$this->currentLiabilities1YearAgo)-($this->currentAssets2YearAgo-$this->currentLiabilities2YearAgo);
		}
		function getCostOfEquity(){
			return $this->riskFreeRate+($this->beta*($this->expectedMarketReturn-$this->riskFreeRate));
		}
		function getDividendPayoutRatio(){
			return $this->dividendPayment/$this->netIncome;
		}
		function getRetentionRatio(){
			return 1-$this->dividendPayoutRatio;
		}
	}

	class FCFE extends Company{
		public $parentObject, $eps, $newDebtIssued, $debtRepayment, $fcfe, $returnOnEquity, $expectedGrowthRate, $intrinsicValue;

		function __construct($parentObject, $earngsPerShare, $nwDbtIssued, $dbtRepayment){
			$this->parentObject = $parentObject;
			$this->eps = $earngsPerShare;
			$this->newDebtIssued = $nwDbtIssued;
			$this->debtRepayment = $dbtRepayment;
			$this->fcfe = $this->getFCFE();
			$this->returnOnEquity = $this->getReturnOnEquity();
			$this->expectedGrowthRate = $this->getExpectedGrowthRate();
			$this->intrinsicValue = $this->getIntrinsicValue();
		}
		function set_eps($earngsPerShare){
			$this->eps = $earngsPerShare;
		}
		function eps(){
			return $this->eps;
		}
		function set_newDebtIssued($nwDbtIssued){
			$this->newDebtIssued = $nwDbtIssued;
		}
		function get_newDebtIssued(){
			return $this->newDebtIssued;
		}
		function set_debtRepayment($dbtRepayment){
			$this->debtRepayment = $dbtRepayment;
		}
		function get_debtRepayment(){
			return $this->debtRepayment;
		}
		function getFCFE(){
			return $this->parentObject->netIncome-($this->parentObject->capitalExpenditure-$this->parentObject->depreciation)-$this->parentObject->changesInWorkingCapital+($this->newDebtIssued-$this->debtRepayment);
		}
		function getReturnOnEquity(){
			return $this->parentObject->netIncome/$this->parentObject->totalEquity;
		}
		function getExpectedGrowthRate(){
			return $this->parentObject->retentionRatio*$this->returnOnEquity;
		}
		function getIntrinsicValue(){
			return (($this->fcfe*(1+$this->parentObject->stableGrowth))/($this->parentObject->costOfEquity-$this->parentObject->stableGrowth))/$this->parentObject->outstandingShare;
		}
	}

	class FCFF extends Company{
		public $parentObject, $totalLiabilities, $interestExpense, $ebit, $taxRate, $totalAssets, $fcff, $costOfDebt, $weightedAverageCostOfCapital, $returnOnCapital, $expectedGrowthRate, $intrinsicValue;

		function __construct($parentObject, $totLiab, $intrstExpns, $earngsBIT, $txRte){
			$this->parentObject = $parentObject;
			$this->totalLiabilities = $totLiab;
			$this->interestExpense = $intrstExpns;
			$this->ebit = $earngsBIT;
			$this->taxRate = $txRte;
			$this->totalAssets = $this->getTotalAssets();
			$this->fcff = $this->getFCFF();
			$this->costOfDebt = $this->getCostOfDebt();
			$this->weightedAverageCostOfCapital = $this->getWeightedAverageCostOfCapital();
			$this->returnOnCapital = $this->getReturnOnCapital();
			$this->expectedGrowthRate = $this->getExpectedGrowthRate();
			$this->intrinsicValue = $this->getIntrinsicValue();
		}
		function set_totalLiabilities($newTotLiab){
			$this->totalLiabilities = $newTotLiab;
		}
		function get_totalLiabilities(){
			return $this->totalLiabilities;
		}
		function set_interestExpense($newIntrstExpns){
			$this->interestExpense = $newIntrstExpns;
		}
		function get_interestExpense(){
			return $this->interestExpense;
		}
		function set_ebit($newEarngsBIT){
			$this->ebit = $newEarngsBIT;
		}
		function get_ebit(){
			return $this->ebit;
		}
		function set_taxRate($newTxRte){
			$this->taxRate = $newTxRte;
		}
		function get_taxRate(){
			return $this->taxRate;
		}
		function getTotalAssets(){
			return $this->totalLiabilities + $this->parentObject->totalEquity;
		}
		function getFCFF(){
			return ($this->ebit*(1-$this->taxRate))+$this->parentObject->depreciation-$this->parentObject->capitalExpenditure-$this->parentObject->changesInWorkingCapital;
		}
		function getCostOfDebt(){
			return ($this->interestExpense/$this->totalLiabilities)*(1-$this->taxRate);
		}
		function getWeightedAverageCostOfCapital(){
			return ($this->parentObject->costOfEquity*($this->parentObject->totalEquity/$this->totalAssets))+($this->costOfDebt*($this->totalLiabilities/$this->totalAssets));
		}
		function getReturnOnCapital(){
			return ($this->ebit*(1-$this->taxRate))/$this->totalAssets;
		}
		function getExpectedGrowthRate(){
			return $this->returnOnCapital * $this->parentObject->retentionRatio;
		}
		function getIntrinsicValue(){
			return (($this->fcff*(1+$this->parentObject->stableGrowth))/($this->weightedAverageCostOfCapital-$this->parentObject->stableGrowth))/$this->parentObject->outstandingShare;
		}
	}
?>