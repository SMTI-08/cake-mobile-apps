<?php
include_once("config.php");
$kueri = mysqli_query($mysqli, "SELECT * FROM kurs WHERE id_kurs=1");
while($r = mysqli_fetch_assoc($kueri)) {
     $kurs = $r['value'];
}

$sektor = $_GET["sektor"];
if ($sektor != "") {
	$sth = mysqli_query($mysqli, "SELECT * FROM companyprint WHERE id_sector=$sektor");
	$rows = array();
	while($r = mysqli_fetch_assoc($sth)) {
    	$rows[] = $r;
	}
} else {
	$sth = mysqli_query($mysqli, "SELECT * FROM companyprint");
	$rows = array();
	while($r = mysqli_fetch_assoc($sth)) {
    	$rows[] = $r;
	}
}

$isi = array('kurs' => rupiah($kurs),'content' => $rows);
$hasilOutput = json_encode($isi);

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo $hasilOutput;

function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}
?>