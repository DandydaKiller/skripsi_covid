<?php
include 'koneksi.php';
$today = strval(date("Y-m-d"));

?>
<html>
<head>
</head>
<body>
<p>Hapus Data Hari ini?</p>
    <form action="delete_data.php" method="post">
        <input type="text" name="tanggal" value="<?php echo $today?>">
        <input type="submit" value="Haous">
    </form>
</body>
</html>