<?php 
include 'koneksi.php';
$kota = $_POST['pilih'];
$kasus = $_POST['positif'];
$cs = $_POST['sembuh'];
$meninggal = $_POST['meninggal'];
$tanggal = $_POST['tanggal'];
$today = strval(date("Y-m-d"));


$query = mysqli_query($koneksi, "select * from data_cov where tanggal = '$today' and kota = '$kota'");

if(mysqli_num_rows($query) < 1){
        mysqli_query($koneksi,"INSERT INTO data_cov (kota,kasus,tanggal,meninggal,confirm_selesai) VALUES ('$kota','$kasus','$tanggal','$meninggal','$cs')");
        echo $koneksi->error;
        //echo $db_kota." ".$db_kasus." ".$db_meninggal." ".$db_cs."\n";
    echo "Data berhasil di inputkan :)";
}else{
    echo "Data Sudah di input Have a Nice Day :)";
}
