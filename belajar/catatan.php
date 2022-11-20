<?php
include 'header.php';

$user = $_SESSION['username'];
$datauser = "catatan/$user.txt";

if (!file_exists($datauser)) {
	die('<center>Kamu Belum Mempunyai Catatan</center>');
} else {
	$file = fopen($datauser, 'r');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Peduli Diri - Catatan</title>
</head>
<body>
	<table border="1" align="center" width="50%">
		<td>
			<a>Urutkan Berdasarkan</a>
			<select id="urut" onclick="urutkan(this)">
				<option value="0">Tanggal</option>
				<option value="1">Waktu</option>
				<option value="2">Lokasi</option>
				<option value="3">Suhu</option>
			</select>
			<input type="submit" value="Urutkan">
		</td>
	</table>
	<br>
	<table border="1" align="center" width="50%" height="40%">
		<td>
			<table align="center" border="1" width="80%" id="myTable">
				<tr>
					<th>Tanggal</th>
					<th>Waktu</th>
					<th>Lokasi yang dikunjungi</th>
					<th>Suhu Tubuh</th>
				</tr>
<?php
while(($row = fgets($file)) != false) {
	$col = explode(',',$row);
	foreach($col as $data) {
?>
				<td><?=trim($data)?></td>
<?php }} ?>
			</table>
		</td>
</body>
<script src="main.js"></script>
</html>