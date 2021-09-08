<?php

include "database_connection.php";

$kodePos = $_GET['kodePos'];
$kodePos = $_GET['kodePosTujuan'];

$cariKodePos = "SELECT * from ongkir";
$data = mysqli_query($koneksi, $cariKodePos);
while($d = mysqli_fetch_array($data)){
    if($d['kodePosAwal'] == $kodePos){
        if($d['kodePosTujuan'] == $kodePosTujuan){
            $ongkir = $d['ongkosKirim'];
        }
    }
}

?>