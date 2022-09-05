<?php
// Panggil koneksi database.php untuk koneksi database
require "../../config/database.php";
session_start();
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan message = 1
if (empty($_SESSION['email']) && empty($_SESSION['password'])) {
	echo "<meta http-equiv='refresh' content='0; url=?page=login&alert=2'>";
}

// echo "<pre>";
// var_dump($_SESSION['cart']);
// echo "</pre>";
// die;

if (isset($_POST)) {
//   echo "<pre>";
// var_dump($_POST);
// var_dump($_FILES);
// echo "</pre>";
// die;
  //ambil data 
  // $id_bayar =  mysqli_real_escape_string($mysqli, trim($_POST['id_bayar']));
  $id_transaksi =  mysqli_real_escape_string($mysqli, trim($_POST['id_transaksi']));
  $tgl                = $_POST['tanggal_bayar'];
  $exp                = explode('-',$tgl);
  $tanggal_bayar      = $exp[2]."-".$exp[1]."-".$exp[0];
  $nama = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
  $no_telepon = mysqli_real_escape_string($mysqli, trim($_POST['no_telepon']));
  $jumlah_bayar       = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['jumlah_bayar'])));
  $status_bayar       = 'Menunggu Verifikasi Pembayaran';

    // Upload gambar
    if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
        $bukti_bayar = upload();
    } else {
        $bukti_bayar = 'default.png';
    }

  // maka jalankan perintah query untuk menyimpan data ke tabel pesan
  $query = mysqli_query($mysqli, "UPDATE pembayaran SET tanggal_bayar = '$tanggal_bayar',
                        nama = '$nama',
                        no_telepon = '$no_telepon',
                        jumlah_bayar = '$jumlah_bayar',
                        bukti_bayar = '$bukti_bayar',
                        status_bayar = '$status_bayar' WHERE id_transaksi = $id_transaksi")
    or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

    $query = mysqli_query($mysqli, "UPDATE transaksi SET status = '$status_bayar' WHERE id_transaksi = $id_transaksi")
    or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

  
  if ($query) {
    // jika berhasil tampilkan pesan berhasil simpan data
    header("location: ../../main.php?page=konfirmasi");
  }
}



function upload()
{
    $namafile = $_FILES['gambar']['name'];
    // $ukuranfile = $_FILES['gambar']['size'];
    // $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    $ektensigambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ektensigambarvalid)) {
        echo "<script>
          alert('Yang anda upload bukan gambar!');
          </script>";
        return false;
    }

    // generate nama gambar baru
    // $namafilebaru = uniqid();
    // $namafilebaru .= '.';
    // $namafilebaru .= $ekstensigambar;

    // Lolos pengecekan, gambar siap diUpload
    move_uploaded_file($tmpName, '../../img/pembayaran/' . $namafile);

    return $namafile;
}