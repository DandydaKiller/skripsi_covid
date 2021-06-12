<?php
include 'scrap_no_table.php';
$kasus =  " Jatim Conf. Cs.:".$kasus_jatim." Dth:".$meninggal_jatim;
$data = date("Y-m-d")." ".date("H:i");


$send = array("waktu" => $data ,"berita"=>"Belum Ada","kasus"=> $kasus,"update_data" => $update_data );
echo json_encode($send);