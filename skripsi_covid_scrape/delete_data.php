<?php
include 'koneksi.php';
$tanggal = $_POST['tanggal'];

$sql_delete = "delete from data_cov where tanggal='$tanggal'";
$query = mysqli_query($koneksi,"select * from data_cov where tanggal='$tanggal'");
if(mysqli_num_rows($query) < 1){
    echo "Data sudah tidak ada";

}else{
    mysqli_query($koneksi,$sql_delete);
    echo $koneksi->error;
    echo "Data berhasil di hapus";
}

?>