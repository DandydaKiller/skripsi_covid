<?php
$koneksi  = mysqli_connect("localhost","root","","covid");
$gsk      = mysqli_query($koneksi, "select * from data_cov where kota = 'KAB. GRESIK' order by tanggal asc");
$sda      = mysqli_query($koneksi, "select * from data_cov where kota = 'KAB. SIDOARJO' order by tanggal asc");
$kota      = mysqli_query($koneksi, "select * from select_input");

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
<meta name="viewport" content="width=700,initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <script src="js/Chart.js"></script>
    <style type="text/css">
            .container {
                width: 40%;
                margin: 15px auto;
            }
    </style>
  </head>
  <body>

   

 
<?php 
$array = array();
$i = 0;
while($d = mysqli_fetch_array($kota)){ 
$array[$i] = array();
$array[$i]['kota'] = $d['nama_kota'];
$i++;
}
$j = 0;

while(count($array) > $j){ 
  $nama_kota = $array[$j]['kota'];
  $nama_kota2 = $array[$j+1]['kota'];
  $nama_kota3 = $array[$j+2]['kota'];

  $sby = mysqli_query($koneksi, "select * from data_cov where kota = '$nama_kota' order by tanggal asc");
  $sby2 = mysqli_query($koneksi, "select * from data_cov where kota = '$nama_kota2' order by tanggal asc");
  $sby3 = mysqli_query($koneksi, "select * from data_cov where kota = '$nama_kota3' order by tanggal asc");

  $tanggal      = mysqli_query($koneksi, "select * from data_cov where kota = '$nama_kota' order by tanggal asc");

?>
 <div class="container">
        <canvas id="linechart<?php echo $j?>" width="100" height="100"></canvas>
    </div>
<script  type="text/javascript">
  function randCol(){
  const hex = '0123456789ABCDEF';
  let color ='#';
    for(let i=0; i<6; i++){
      color += hex[Math.floor(Math.random() * 16)];
    }
    return color;
  }
  var ctx = document.getElementById("linechart<?php echo $j?>").getContext("2d");
  var data = {
            labels: [<?php while ($p = mysqli_fetch_array($tanggal)) { echo '"'.$p['tanggal'] .'",';}?>],
            datasets: [
                
                  {
                    label: "<?php echo $nama_kota?>",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: randCol(),
                    borderColor: randCol(),
                    pointHoverBackgroundColor: "#F07124",
                    pointHoverBorderColor: "#F07124",
                    data: [<?php while ($p = mysqli_fetch_array($sby)) {  echo '"'.$p['kasus'] .'",';}?>]
                  },
                  {
                    label: "<?php echo $nama_kota2?>",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: randCol(),
                    borderColor: randCol(),
                    pointHoverBackgroundColor: "#F07124",
                    pointHoverBorderColor: "#F07124",
                    data: [<?php while ($p = mysqli_fetch_array($sby2)) {  echo '"'.$p['kasus'] .'",';}?>]
                  },
                  {
                    label: "<?php echo $nama_kota3?>",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: randCol(),
                    borderColor: randCol(),
                    pointHoverBackgroundColor: "#F07124",
                    pointHoverBorderColor: "#F07124",
                    data: [<?php while ($p = mysqli_fetch_array($sby3)) {  echo '"'.$p['kasus'] .'",';}?>]
                  },
                  ]
          };

  var myBarChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
            legend: {
              display: true
            },
            barValueSpacing: 20,
            scales: {
              yAxes: [{
                  ticks: {
                      min: 0,
                  }
              }],
              xAxes: [{
                          gridLines: {
                              color: "rgba(0, 0, 0, 0)",
                          }
                      }]
              }
          }
        });
</script>
<br/>
<?php 
$j = $j+3;

}?>

</body>
</html>