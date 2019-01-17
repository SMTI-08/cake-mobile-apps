<?php
	/**
	 * 
	 */
	class FCFF
	{
		public $currentAssets1YearAgo, $currentAssets2YearAgo, $currentLiabilities1YearAgo, $currentLiabilities2YearAgo, $totalLiabilities, $outstandingShare, $totalEquity, $interestExpense, $ebit, $netIncome, $capitalExpenditure, $depreciation, $dividendPayment, $taxRate, $riskFreeRate, $expectedMarketReturn, $beta, $totalAssets, $changesInWorkingCapital, $fcff, $costOfEquity, $costOfDebt, $weightedAverageCostOfCapital, $returnOnCapital, $dividendPayoutRatio, $retentionRatio, $expectedGrowthRate, $stableGrowth, $intrinsicValue;

		function __construct($currAsset1YrAgo, $currAsset2YrAgo, $currLiab1YrAgo, $currLiab2YrAgo, $totLiab, $outstdShare, $totEqty, $intrstExpns, $earngsBIT, $netIncm, $cptlExpndtr, $deprc, $dvdPymnt, $txRte, $rskFreeRte, $expctMarketRtn, $bt, $stblGrwth)
		{
			$this->currentAssets1YearAgo = $currAsset1YrAgo;
			$this->currentAssets2YearAgo = $currAsset2YrAgo;
			$this->currentLiabilities1YearAgo = $currLiab1YrAgo;
			$this->currentLiabilities2YearAgo = $currLiab2YrAgo;
			$this->totalLiabilities = $totLiab;
			$this->outstandingShare = $outstdShare;
			$this->totalEquity = $totEqty;
			$this->interestExpense = $intrstExpns;
			$this->ebit = $earngsBIT;
			$this->netIncome = $netIncm;
			$this->capitalExpenditure = $cptlExpndtr;
			$this->depreciation = $deprc;
			$this->dividendPayment = $dvdPymnt;
			$this->taxRate = $txRte;
			$this->riskFreeRate = $rskFreeRte;
			$this->expectedMarketReturn = $expctMarketRtn;
			$this->beta = $bt;
			$this->stableGrowth = $stblGrwth;
			$this->totalAssets = $this->getTotalAssets();
			$this->changesInWorkingCapital = $this->getChangesInWorkingCapital();
			$this->fcff = $this->getFCFF();
			$this->costOfEquity = $this->getCostOfEquity();
			$this->costOfDebt = $this->getCostOfDebt();
			$this->weightedAverageCostOfCapital = $this->getWeightedAverageCostOfCapital();
			$this->returnOnCapital = $this->getReturnOnCapital();
			$this->dividendPayoutRatio = $this->getDividendPayoutRatio();
			$this->retentionRatio = $this->getRetentionRatio();
			$this->expectedGrowthRate = $this->getExpectedGrowthRate();
			$this->intrinsicValue = $this->getIntrinsicValue();
		}
		function getTotalAssets(){
			return $this->totalLiabilities + $this->totalEquity;
		}
		function getChangesInWorkingCapital(){
			return ($this->currentAssets1YearAgo-$this->currentLiabilities1YearAgo)-($this->currentAssets2YearAgo-$this->currentLiabilities2YearAgo);
		}
		function getFCFF(){
			return ($this->ebit*(1-$this->taxRate))+$this->depreciation-$this->capitalExpenditure-$this->changesInWorkingCapital;
		}
		function getCostOfEquity(){
			return $this->riskFreeRate+($this->beta*($this->expectedMarketReturn-$this->riskFreeRate));
		}
		function getCostOfDebt(){
			return ($this->interestExpense/$this->totalLiabilities)*(1-$this->taxRate);
		}
		function getWeightedAverageCostOfCapital(){
			return ($this->costOfEquity*($this->totalEquity/$this->totalAssets))+($this->costOfDebt*($this->totalLiabilities/$this->totalAssets));
		}
		function getReturnOnCapital(){
			return ($this->ebit*(1-$this->taxRate))/$this->totalAssets;
		}
		function getDividendPayoutRatio(){
			return $this->dividendPayment/$this->netIncome;
		}
		function getRetentionRatio(){
			return 1-$this->dividendPayoutRatio;
		}
		function getExpectedGrowthRate(){
			return $this->returnOnCapital * $this->retentionRatio;
		}
		function getIntrinsicValue(){
			return (($this->fcff*(1+$this->stableGrowth))/($this->weightedAverageCostOfCapital-$this->stableGrowth))/$this->outstandingShare;
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
		function set_totalLiabilities($newTotLiab){
			$this->totalLiabilities = $newTotLiab;
		}
		function get_totalLiabilities(){
			return $this->totalLiabilities;
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
		function set_taxRate($newTxRte){
			$this->taxRate = $newTxRte;
		}
		function get_taxRate(){
			return $this->taxRate;
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
	}
?>