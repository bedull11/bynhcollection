<?php
// panggil file untuk koneksi ke database
require_once "../config/database.php";

// ambil data hasil submit dari form
$username = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['username'])))));
$password = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim(md5($_POST['password']))))));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) or !ctype_alnum($password)) {
	header("Location: index.php?alert=1");
} else {
	// ambil data dari tabel admin untuk pengecekan berdasarkan inputan username dan passrword
	$query = mysqli_query($mysqli, "SELECT * FROM admin WHERE username='$username' AND password='$password'")
		or die('Ada kesalahan pada query admin: ' . mysqli_error($mysqli));
	$rows  = mysqli_num_rows($query);

	// jika data ada, jalankan perintah untuk membuat session
	if ($rows > 0) {
		$data  = mysqli_fetch_assoc($query);

		session_start();
		$_SESSION['id_admin']   = $data['id_admin'];
		$_SESSION['username']   = $data['username'];
		$_SESSION['password']   = $data['password'];
		$_SESSION['nama_admin'] = $data['nama_admin'];
		$_SESSION['foto'] = $data['foto'];

		// lalu alihkan ke halaman admin
		header("Location: main.php?module=beranda");
	}

	// jika data tidak ada, alihkan ke halaman login dan tampilkan pesan = 1
	else {
		// header("Location: index.php?alert=1");
		echo "<script type='text/javascript'>alert('Gagal Login! Email atau Password anda salah, silahkan cek kembali.');</script>
			  <meta http-equiv='refresh' content='0; url=index.php'>";
	}
}
