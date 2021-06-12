
<?php
include 'koneksi.php';
date_default_timezone_set('Asia/Jakarta');
$waktu_scrap = "19:39";
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
echo count($data);
//echo strval(date("Y-m-d"));
echo date("H:i:s");
//echo "<pre>".print_r($data, true)."</pre>";
?>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
<table>
<th>
    Kota
</th>
<th>
    total Kasus
</th>
<th>
created_at
</th>
<th>
upadated_at
</th>
<th>
Suspect
</th>
<th>
Meninggal
</th>
<th>
conf selesai
</th>
<th>
Tanggal
</th>
<?php
$kasus_jatim = 0;
$meninggal_jatim = 0;
$update_data;
$i = 0;
foreach($data as $d){
//belum selesai teruskan dengan melihat video https://www.youtube.com/watch?v=TvAxI5aDtYY
//hasil url nya : https://covid19dev.jatimprov.go.id/xweb/drax/data
$kasus_jatim = $kasus_jatim + intval($d->confirm);
$meninggal_jatim = $meninggal_jatim + intval($d->covidmeninggal_rtpcr);
$update_data = strval($d->updated_at);

$kota = strval($d->kabko);
$kasus = strval($d->confirm);
$meninggal = strval($d->covidmeninggal_rtpcr);
$confirm_selesai = strval($d->confirm_selesai);
$tanggal = strval($d->tanggal);
  /*if(strval($d->tanggal) == strval(date("Y-m-d") && $waktu_scrap == strval(date("H:1")))){
       
        mysqli_query($koneksi,"INSERT INTO data_cov (kota,kasus,tanggal,meninggal,confirm_selesai) VALUES ('$kota','$kasus','$tanggal','$meninggal','$confirm_selesai')");
        echo $koneksi->error;
    }*/
?>
<tr>
<?php if(strval($d->tanggal) == strval(date("Y-m-d"))){ 
    $i++;
?>
<td style="color: red">
<?php echo strval($d->kabko);
?>
</td>
<?php } else {?>
<td>
<?php echo strval($d->kabko);
?>
</td>
<?php }?>

<td>
<?php echo strval($d->confirm);
?>
</td>
<td>
<?php echo strval($d->created_at);
?>
</td>
<td>
<?php echo strval($d->updated_at);
?>
</td>
<td>
<?php echo strval($d->suspect);
?>
</td>
<td>
<?php
echo strval($d->covidmeninggal_rtpcr);
?>
</td>
<td>
<?php
echo strval($d->confirm_selesai);
?>
</td>
<td>
<?php
echo strval($d->tanggal);
?>
</td>
</tr>
<?php }
?>
</table>
<p><?php //echo strval($i);?></p>
