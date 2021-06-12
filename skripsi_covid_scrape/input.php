<?php
include 'koneksi.php'; 

$yesterday = strval(date("Y-m-d",mktime(0, 0, 0, date("m"),date("d")-1,date("Y"))));
$today = strval(date("Y-m-d"));
echo $yesterday ."\n";
echo $today;
$query = mysqli_query($koneksi, "select * from data_cov where tanggal = '$yesterday' order by tanggal desc");
?>
<html>
<head>
<title>Input Data Darurat</title>
</head>
<body>
    <form action="submit-input.php" method="post">
        <table>
                
                <th>Kota</th>
                <th>Kasus</th>
                <th>Tanggal Sebelumnya</th>
                <th>Meninggal</th>
                <th>Konfirm Selesai</th>
        <?php
             while($data=mysqli_fetch_array($query)) {
        ?>
                
                <tr>
                    <td><input type="text" name= "<?php echo $data['kota']?>" value = "<?php echo $data['kota']?>" disabled></td>
                    <td><input type="text" name="<?php echo $data['kasus']?>" value = "<?php echo $data['kasus']?>" disabled></td>
                    <td><input type="text" name="<?php echo $data['tanggal']?>" value = "<?php echo $data['tanggal']?>" disabled></td>
                    <td><input type="text" name="<?php echo $data['meninggal']?>" value = "<?php echo $data['meninggal']?>" disabled></td>
                    <td><input type="text" name="<?php echo $data['confirm_selesai']?>" value = "<?php echo $data['confirm_selesai']?>" disabled></td>

                </tr>
        <?php
             }
        ?>
        <tr>
        <td><input type="submit" value="Submit Data"></td>
        </tr>
        </table>

    </form>
</body>
</html>