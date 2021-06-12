
<?php
include 'koneksi.php';
date_default_timezone_set('Asia/Jakarta');
$waktu_scrap = "23:50:01";

function http_request($url){
    $data = curl_init();
   // curl_setopt($data, CURLOPT_SSL_VERIFYPEER, false);
   curl_setopt($data, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($data, CURLOPT_URL, $url);
    $hasil = curl_exec($data);
    //echo $hasil;
    curl_close($data);
    return $hasil;
}
$json_dari_webnya = http_request('https://covid19dev.jatimprov.go.id/xweb/drax/data');
$data = json_decode($json_dari_webnya);
//echo count($data);
//echo strval(date("Y-m-d"));
$jam = date("H:i");
//echo "<pre>".print_r($data, true)."</pre>";
?>
<?php
$kasus_jatim = 0;
$meninggal_jatim = 0;
$update_data = "want update yet" ;
$i = 0;
foreach($data as $d){
//belum selesai teruskan dengan melihat video https://www.youtube.com/watch?v=TvAxI5aDtYY
//hasil url nya : https://covid19dev.jatimprov.go.id/xweb/drax/data
$kasus_jatim = $kasus_jatim + intval($d->confirm);
$meninggal_jatim = $meninggal_jatim + intval($d->covidmeninggal_rtpcr);

$kota = strval($d->kabko);
$kasus = strval($d->confirm);
$meninggal = strval($d->covidmeninggal_rtpcr);
$confirm_selesai = strval($d->confirm_selesai);
$tanggal = strval($d->tanggal);
    if(strval($d->tanggal) == strval(date("Y-m-d"))){
        $update_data = strval($d->created_at);
    }else{
        $update_data = " last update was yesterday " ;
    }
  if(strval($d->tanggal) == strval(date("Y-m-d")) && $waktu_scrap == strval(date("H:i:s"))){
    /*echo $waktu_scrap;
    echo strval(date("H:1"));
    echo "tanggal Scrap ".strval($d->tanggal)." ";
    echo "tanggal server ".strval(date("Y-m-d"))." ";    */   

        mysqli_query($koneksi,"INSERT INTO data_cov (kota,kasus,tanggal,meninggal,confirm_selesai) VALUES ('$kota','$kasus','$tanggal','$meninggal','$confirm_selesai')");
        echo $koneksi->error;
    }
}
?>

