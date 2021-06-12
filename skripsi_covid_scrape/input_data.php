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
    <form action="submit-input_data.php" method="post">
        <table>
                
                <th>Kota</th>
                <th>Kasus</th>
                <th>Meninggal</th>
                <th>Konfirm Selesai</th>
                <th>Tanggal Saat ini</th>
        <?php
             while($data=mysqli_fetch_array($query)) {
        ?>
                
                <tr>
                    <td><input type="text" name= "<?php echo str_replace(str_split(' .'),'',$data['kota']);?>" value = "<?php echo $data['kota']?>" readonly></td>
                    <td><input type="text" name="<?php echo "kasus".str_replace(str_split(' .'),'',$data['kota']);?>" required></td>
                    <td><input type="text" name="<?php echo "meninggal".str_replace(str_split(' .'),'',$data['kota']);?>" required></td>
                    <td><input type="text" name="<?php echo "cs".str_replace(str_split(' .'),'',$data['kota']);?>" required></td>
                    <td><input type="text" name="<?php echo "tanggal".str_replace(str_split(' .'),'',$data['kota']);?>" value = "<?php echo strval(date("Y-m-d"))?>" readonly></td>

                </tr>
        <?php
             }
        ?>
        <tr>
        <!--<td><input type="text" name="TEST" value="coba"></td>-->
        <td><input type="submit" value="Submit Data"></td>
        </tr>
        </table>

    </form>
</body>
</html>