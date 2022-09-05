<?php

// Panggil koneksi database.php untuk koneksi database
require_once "../../../config/database.php";
session_start();

// fungsi untuk pengecekan status login user 
//jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "oy";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    // echo "<pre>";
    // echo var_dump($_GET);
    // echo "</pre>";
    // die;
    if ($_GET['act'] == 'insert') {
        if (isset($_POST['simpan'])) {
            // echo '<pre>';
            // var_dump($_POST);
            // var_dump($_FILES);
            // echo '</pre>';
            // die;
            // ambil data hasil submit dari form
            $nama_dimsum      = mysqli_real_escape_string($mysqli, trim($_POST['nama_dimsum']));
            $stok = mysqli_real_escape_string($mysqli, trim($_POST['stok']));
            $harga           = str_replace('.', '', trim($_POST['harga']));
            $deskripsi       = mysqli_real_escape_string($mysqli, trim($_POST['deskripsi']));

            // Upload gambar
            if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
                $foto_dimsum = upload();
            } else {
                $foto_dimsum = 'default.png';
            }

            // perintah query untuk menyimpan data ke tabel paket
            $query = mysqli_query($mysqli, "INSERT INTO dimsum(nama_dimsum,stok,harga,gambar,deskripsi)
                                                VALUES('$nama_dimsum','$stok','$harga','$foto_dimsum','$deskripsi')")
                or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=produk&alert=1");
            }
        }
    } elseif ($_GET['act'] == 'edit') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            // ambil data hasil submit dari form
            $id_dimsum       = mysqli_real_escape_string($mysqli, trim($_POST['id_dimsum']));
            $nama_dimsum     = mysqli_real_escape_string($mysqli, trim($_POST['nama_dimsum']));
            $stok            = mysqli_real_escape_string($mysqli, trim($_POST['stok']));
            $harga           = str_replace('.', '', trim($_POST['harga']));
            $deskripsi       = mysqli_real_escape_string($mysqli, trim($_POST['deskripsi']));
            $gambar_lama     = mysqli_real_escape_string($mysqli, trim($_POST['gambar_lama']));

            // Cek apakah user pilih gambar baru atau tidak
            if ($_FILES['gambar']['error'] === 4) {
                $foto_dimsum = $gambar_lama;
            } else {
                if ($gambar_lama != 'default.png') {
                    //Hapus gambar
                    unlink('../../../img/produk/' . $gambar_lama);
                };
                $foto_dimsum = upload();
            }
            // perintah query untuk mengubah data pada tabel paket
            $query = mysqli_query($mysqli, "UPDATE dimsum SET nama_dimsum      = '$nama_dimsum',
                                                                        stok = '$stok',
                                                                        harga           = '$harga',
                                                                        harga           = '$harga',
                                                                        gambar     = '$foto_dimsum',
                                                                        deskripsi       = '$deskripsi'
                                                                WHERE id_dimsum        = '$id_dimsum'")
                or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil update data
                header("location: ../../main.php?module=produk&alert=2");
            }
        }
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id_dimsum'])) {
            $id_dimsum = $_GET['id_dimsum'];
            $query = mysqli_query($mysqli, "SELECT * FROM dimsum WHERE id_dimsum='$id_dimsum'")
                or die('Ada kesalahan pada query tampil data galeri: ' . mysqli_error($mysqli));

            $galeri = mysqli_fetch_assoc($query);

            if ($galeri['gambar'] != 'default.png') {
                //Hapus gambar
                unlink('../../../img/produk/' . $galeri['gambar']);
            };

            // perintah query untuk menghapus data pada tabel dimsum
            $query = mysqli_query($mysqli, "DELETE FROM dimsum WHERE id_dimsum='$id_dimsum'")
                or die('Ada kesalahan pada query delete : ' . mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=produk&alert=3");
            }
        }
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
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;

    // Lolos pengecekan, gambar siap diUpload
    move_uploaded_file($tmpName, '../../../img/produk/' . $namafilebaru);

    return $namafilebaru;
}
