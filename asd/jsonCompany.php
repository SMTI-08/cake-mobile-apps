<?php
//File untuk mencetak REST API berformat JSON
include_once("config.php");
//Mendapatkan nilai 1 Dollar AS
$kueri = mysqli_query($mysqli, "SELECT * FROM kurs WHERE id_kurs=1");
while($r = mysqli_fetch_assoc($kueri)) {
     $kurs = $r['value'];
}

//Kueri data inti dari tabel companyprint
$sth = mysqli_query($mysqli, "SELECT * FROM companyprint");
//Menyiapkan array penampung $rows[] dan menempatkannya ke dalam $rows
$rows = array();
while($r = mysqli_fetch_assoc($sth)) {
	$rows[] = $r;
}

//Membentuk array baru berisi kurs dan data hasil kueri supaya bentuk JSONnya lebih rapi
$isi = array('kurs' => rupiah($kurs),'content' => $rows);
//Membentuk JSON
$hasilOutput = json_encode($isi);

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
//Header JSON supaya dimengerti Browser ketika testing API
header('Content-type: application/json');

//Mencetak JSON
echo $hasilOutput;

//Function untuk memformat angka menjadi bentuk rupiah
function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}
?>