<?php 
$koneksi  = mysqli_connect("localhost","root","","covid");
$kota      = mysqli_query($koneksi, "select * from select_input");
$array = array();
$i = 0;
while($d = mysqli_fetch_array($kota)){ 
$array[$i] = array();
$array[$i]['kota'] = $d['nama_kota'];
$i++;
}
$j = 0;
echo count($array);
while(count($array) >$j){
echo $array[$j]['kota']." ";
    echo $array[$j+1]['kota']." ";
    echo $array[$j+2]['kota'];


echo "---------------- <br>";

$j = $j+3;
}
?>