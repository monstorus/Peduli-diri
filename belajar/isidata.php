<?php
include 'header.php';

if (isset($_POST['simpan'])) {
	$tanggal = $_POST['tanggal'];
	$jam = $_POST['jam'];
	$lokasi = $_POST['lokasi'];
	$suhu = $_POST['suhu'];
	$nama = $_SESSION['username'];
	$text = "$tanggal,$jam,$lokasi,$suhu</tr> \n";
	$data = "catatan/$nama.txt";
	$dirname = dirname($data);
	
	if (!is_dir($dirname)) {
		mkdir($dirname, 0755, true);
	}

	$fp = fopen($data, 'a+');
	if (fwrite($fp, $text)) {
		echo "<script>alert('Catatan Berhasil Disimpan')</script>";
	}
}
?>
<table border="1" align="center" width="50%" height="40%">
	<td>
		<form method="POST">
			<table>
				<tr>
					<td>Tanggal</td>
					<td><input type="date" name="tanggal"></td>
				</tr>
				<tr>
					<td>Jam</td>
					<td><input type="time" name="jam"></td>
				</tr>
				<tr>
					<td>Lokasi yang dikunjungi</td>
					<td><input type="text" name="lokasi"></td>
				</tr>
				<tr>
					<td>Suhu tubuh</td>
					<td><input type="number" name="suhu"></td>
				</tr>
				<tr>
					<td></td>
					<td><input align="right" type="submit" name="simpan" value="Simpan"></td>
				</tr>
			</table>
		</form>
	</td>
</table>