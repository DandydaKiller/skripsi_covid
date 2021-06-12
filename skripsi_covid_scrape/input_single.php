<form action="submit-input_single.php" method="post">
<select name="pilih" id="">
<?php 
include 'koneksi.php';
$query2 = mysqli_query($koneksi, "select * from select_input");
while($d=mysqli_fetch_array($query2)) {
?>
<option value="<?php echo $d['nama_kota']?>"><?php echo $d['nama_kota']?></option>
<?php }?>
</select>
<input type="text" placeholder="positif/kasus" name="positif">
<input type="text" placeholder="conf selesai/sembuh" name="sembuh">
<input type="text" placeholder="meninggal" name="meninggal">
<input type="text" placeholder="tanggal" value="<?php echo strval(date("Y-m-d")); ?>" name="tanggal" readonly>

<input type="submit" value="insert data">
</form>