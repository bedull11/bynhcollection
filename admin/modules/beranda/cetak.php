<?php


require_once "../../../config/database.php";
require_once "../../../config/fungsi_tanggal.php";
require_once "../../../config/fungsi_rupiah.php";
require_once '../../assets/plugins/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
session_start();
ob_start();

// echo "<pre>";
// var_dump($_GET);
// echo "</pre>";
// die;



$hari_ini = date("d-m-Y");
// ambil data hasil submit dari form
$tgl1     = $_GET['tgl_awal'];
$explode  = explode('-', $tgl1);
$tgl_awal = $explode[2] . "-" . $explode[1] . "-" . $explode[0];

$tgl2      = $_GET['tgl_akhir'];
$explode   = explode('-', $tgl2);
$tgl_akhir = $explode[2] . "-" . $explode[1] . "-" . $explode[0];

if (isset($tgl_awal) && isset($tgl_akhir)) {
    $no    = 1;
    $total = 0;
    // fungsi query untuk menampilkan data dari tabel transaksi
    $query = mysqli_query($mysqli, "SELECT * FROM transaksi 
                                    WHERE tanggal_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir' AND status = 'Pembayaran Diterima'
                                    ORDER BY tanggal_transaksi DESC")
            or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));
    
            $count = mysqli_num_rows($query);
            // echo "<pre>";
            // var_dump($query);
            // echo "</pre>";
            // die;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Rekap Data Transaksi</title>
    <!-- <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" /> -->
</head>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
            font-size: 14px;
        }

        .table {
            width: 100%;
        }


        .table,
        .table th,
        .table td {
            padding: 5px;
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>


    <div id="title">
        REKAP DATA TRANSAKSI
    </div>
    <?php
    if ($tgl_awal == $tgl_akhir) { ?>
        <div id="title-tanggal">
            Tanggal <?php echo tgl_eng_to_ind($tgl1); ?>
        </div>
    <?php
    } else { ?>
        <div id="title-tanggal">
            Tanggal <?php echo tgl_eng_to_ind($tgl1); ?> s.d. <?php echo tgl_eng_to_ind($tgl2); ?>
        </div>
    <?php
    }
    ?>

    <hr><br>
    <div id="isi">
        <table width="100%" border="0.3" cellpadding="0" class="table" cellspacing="0">
            <thead>
                <tr class="tr-title">
                    <th height="20" align="center" valign="middle">No.</th>
                    <th height="20" align="center" valign="middle">ID Transaksi</th>
                    <th height="20" align="center" valign="middle">Nama</th>
                    <th height="20" align="center" valign="middle">Email</th>
                    <th height="20" align="center" valign="middle">Alamat</th>
                    <th height="20" align="center" valign="middle">Total</th>
                    <th height="20" align="center" valign="middle">Tanggal Transaksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // jika data ada
                if ($count == 0) {
                    echo " <tr>
                    <td align='center' valign='middle'></td>
                    <td align='center' valign='middle'></td>
                    <td align='center' valign='middle'></td>
                    <td align='center' valign='middle'></td>
                    <td align='center' valign='middle'></td>
                    <td align='center' valign='middle'></td>
                    <td align='center' valign='middle'></td>
                </tr>";
                }
                // jika data tidak ada
                else {
                    // tampilkan data
                    while ($data = mysqli_fetch_assoc($query)){
                        // $t_transaksi       = $data['tanggal'];
                        // $exp               = explode('-', $t_transaksi);
                        // $tanggal_transaksi = tgl_eng_to_ind($exp[2] . "-" . $exp[1] . "-" . $exp[0]);

                        $jumlah = $data['total'];
                        // menampilkan isi tabel dari database ke tabel di aplikasi
                        echo "  <tr>
                        <td align='center' valign='middle'>$no</td>
                        <td align='center' valign='middle'>$data[id_transaksi]</td>
                        <td style='padding-left:5px;' valign='middle'>$data[nama]</td>
                        <td align='center' valign='middle'>$data[email]</td>
                        <td align='center' valign='middle'>$data[alamat], $data[kota]</td>
                        <td style='padding-right:5px;' align='right' valign='middle'>Rp. " . format_rupiah($jumlah) . "</td>
                        <td align='center' valign='middle'>$data[tanggal_transaksi]</td>
                    </tr>";
                        $no++;
                        $total += $jumlah;
                    }
                    echo " <tr>
                        <td colspan='6' align='center' valign='middle'><strong>Total</strong></td>
                        <td style='padding-right:5px;' align='right' valign='middle'><strong>Rp. " . format_rupiah($total) . "</strong></td>
                    </tr>";
                }
                ?>
                </tbody>
        </table>

        <div id="footer-tanggal">
            Tangerang, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
        </div>
        <div id="footer-jabatan">
            Pimpinan
        </div>

        <div id="footer-nama">
            ByNH Collection
        </div>
    </div>

    <!--  -->

</body>

<?php

// use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->load_html(ob_get_clean());
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Laporan.pdf", array("Attachment" => false));
?>

</html><!-- Akhir halaman HTML yang akan di konvert -->