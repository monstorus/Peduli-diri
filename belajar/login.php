<?php
if (isset($_POST['daftar'])) {
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$txt = "$nik,$nama\n";
	$fp = fopen('config.txt', 'a+');

	if (fwrite($fp, $txt)) {
		echo "<script>alert('Anda Berhasil Mendaftar!')</script>";
	}
} else if (isset($_POST['masuk'])) {
	$data = file_get_contents('config.txt');
	$contents = explode("\n", $data);

	foreach($contents as $values) {
		$login = explode(',', $values);
		$nik = $login[0];
		$nama = $login[1];

		if ($nik == $_POST['nik'] && $nama == $_POST['nama']) {
			session_start();
			$_SESSION['username'] = $nama;
			header('location: home.php');
		} else {
			echo "<script>alert('NIK atau Nama Anda Salah!')</script>";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Peduli Diri - LOGIN</title>
</head>
<body>
	<form method="POST" style="padding-top: 30vh">
		<table align="center">
			<tr>
				<td><input type="text" name="nik" placeholder="NIK"></td>
			</tr>
			<tr>
				<td><input type="text" name="nama" placeholder="Nama Lengkap"></td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="daftar" value="Saya Pengguna Baru">
					<input type="submit" name="masuk" value="Login">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>