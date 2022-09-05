<?php

// Panggil koneksi database.php untuk koneksi database
require_once "../../../config/database.php";
session_start();

// fungsi untuk pengecekan status login user 
//jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<meta http-equiv='refresh' content='0; url=login.php?alert=1'>";
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
            $username            = mysqli_real_escape_string($mysqli, trim($_POST['username']));
            $password           = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim(md5($_POST['password']))))));
            $nama_admin      = mysqli_real_escape_string($mysqli, trim($_POST['nama_admin']));

            // Upload gambar
            if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
                $foto = upload();
            } else {
                $foto = 'default.png';
            }

            // perintah query untuk menyimpan data ke tabel paket
            $query = mysqli_query($mysqli, "INSERT INTO admin(username,password,nama_admin,foto)
                                                VALUES('$username','$password','$nama_admin','$foto')")
                or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=admin&alert=1");
            }
        }
    } elseif ($_GET['act'] == 'edit') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $id_admin            = mysqli_real_escape_string($mysqli, trim($_POST['id_admin']));
            $username            = mysqli_real_escape_string($mysqli, trim($_POST['username']));
            // $password           = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim(md5($_POST['password']))))));
            $nama_admin      = mysqli_real_escape_string($mysqli, trim($_POST['nama_admin']));
            $gambar_lama     = mysqli_real_escape_string($mysqli, trim($_POST['gambar_lama']));

            // Cek apakah user pilih gambar baru atau tidak
            if ($_FILES['gambar']['error'] === 4) {
                $foto = $gambar_lama;
            } else {
                if ($gambar_lama != 'default.png') {
                    //Hapus gambar
                    unlink('../../../img/admin/' . $gambar_lama);
                };
                $foto = upload();
            }
            // perintah query untuk mengubah data pada tabel paket
            $query = mysqli_query($mysqli, "UPDATE admin SET nama_admin      = '$nama_admin',
                                                                        username       = '$username',
                                                                        foto     = '$foto'
                                                                WHERE id_admin        = '$id_admin'")
                or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil update data
                header("location: ../../main.php?module=admin&alert=2");
            }
        }
    } elseif ($_GET['act'] == 'delete') {

        if (isset($_GET['id_admin'])) {
            $id_admin = $_GET['id_admin'];
            $query = mysqli_query($mysqli, "SELECT * FROM admin WHERE id_admin='$id_admin'")
                or die('Ada kesalahan pada query tampil data galeri: ' . mysqli_error($mysqli));

            $admin = mysqli_fetch_assoc($query);

            if ($admin['foto'] != 'default.png') {
                //Hapus gambar
                unlink('../../../img/admin/' . $admin['foto']);
            };

            // perintah query untuk menghapus data pada tabel admin
            $query = mysqli_query($mysqli, "DELETE FROM admin WHERE id_admin='$id_admin'")
                or die('Ada kesalahan pada query delete : ' . mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=admin&alert=3");
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
    move_uploaded_file($tmpName, '../../../img/admin/' . $namafilebaru);

    return $namafilebaru;
}
