<?php
include 'koneksi.php'; 
$today = strval(date("Y-m-d"));
$yesterday = strval(date("Y-m-d",mktime(0, 0, 0, date("m"),date("d")-1,date("Y"))));

$query = mysqli_query($koneksi, "select * from data_cov where tanggal = '$today' ");

if(mysqli_num_rows($query) < 1){
    $query_loop =  mysqli_query($koneksi, "select * from data_cov where tanggal = '$yesterday' ");
    while($d = mysqli_fetch_array($query_loop)){
        $db_kota = $d['kota'];
        $kota = $_POST[str_replace(str_split(' .'),'',$db_kota)];
        $tanggal =  $_POST[str_replace(str_split(' .'),'',"tanggal".$db_kota)];
        $kasus = $_POST[str_replace(str_split(' .'),'',"kasus".$db_kota)];
        $meninggal = $_POST[str_replace(str_split(' .'),'',"meninggal".$db_kota)];
        $cs = $_POST[str_replace(str_split(' .'),'',"cs".$db_kota)];
        /*if($kasus == "" || $meninggal == "" || $cs == ""){
            header("Location:input_data.php");
        }*/
        mysqli_query($koneksi,"INSERT INTO data_cov (kota,kasus,tanggal,meninggal,confirm_selesai) VALUES ('$kota','$kasus','$tanggal','$meninggal','$cs')");
        echo $koneksi->error;
        //echo $db_kota." ".$db_kasus." ".$db_meninggal." ".$db_cs."\n";
    }
    echo "Data berhasil di inputkan :)";
}else{
    echo "Data Sudah di input Have a Nice Day :)";
}
