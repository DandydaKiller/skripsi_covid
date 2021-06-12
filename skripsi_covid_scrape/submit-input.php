<?php
include 'koneksi.php'; 
$today = strval(date("Y-m-d"));
$yesterday = strval(date("Y-m-d",mktime(0, 0, 0, date("m"),date("d")-1,date("Y"))));

$query = mysqli_query($koneksi, "select * from data_cov where tanggal = '$today' ");

if(mysqli_num_rows($query) < 1){
    $query_loop =  mysqli_query($koneksi, "select * from data_cov where tanggal = '$yesterday' ");
    while($d = mysqli_fetch_array($query_loop)){
        $db_kota = $d['kota'];
        $db_kasus = $d['kasus'];
        $db_meninggal = $d['meninggal'];
        $db_cs = $d['confirm_selesai'];
        mysqli_query($koneksi,"INSERT INTO data_cov (kota,kasus,tanggal,meninggal,confirm_selesai) VALUES ('$db_kota','$db_kasus','$today','$db_meninggal','$db_cs')");
        echo $koneksi->error;
        //echo $db_kota." ".$db_kasus." ".$db_meninggal." ".$db_cs."\n";
    }
}else{
    echo "Data Sudah di input Have a Nice Day :)";
}
