<?php
include 'koneksi.php'; 
$query = mysqli_query($koneksi, "select * from data_cov order by tanggal desc");
?>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
<p>Welcome Sir Dandy, Im Jarvis, Which data you want to order? <?php echo " (".mysqli_num_rows($query)." Data)"?> </p>
<form action="find.php" method="post">
<select name="pilih" id="">
<?php 
$query2 = mysqli_query($koneksi, "select * from select_input");
while($d=mysqli_fetch_array($query2)) {
?>
<option value="<?php echo $d['nama_kota']?>"><?php echo $d['nama_kota']?></option>
<?php }?>
</select>
<input type="submit" value="cari">
</form>

<table>
<th>ID</th>
<th>Kota</th>
<th>Kasus</th>
<th>tanggal</th>
<th>Meninggal</th>
<th>Confirm Selesai</th>
<th>Created at DB</th>
<?php 
 while($data=mysqli_fetch_array($query)) {
?>
<tr>

<td><?php echo $data['id']?></td>
<td><?php echo $data['kota']?></td>
<td><?php echo $data['kasus']?></td>
<td><?php echo $data['tanggal']?></td>
<td><?php echo $data['meninggal']?></td>
<td><?php echo $data['confirm_selesai']?></td>
<td><?php echo $data['created_at_db']?></td>

</tr>
<?php } ?>
</table>