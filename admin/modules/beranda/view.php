<?php 
$transaksi = query("select * from transaksi order by tanggal_transaksi desc");

$tahun = date("Y");
$bulan = date("m");

$transaksiPerbulan = query("select month(tanggal_transaksi) as bulan, count(id_transaksi) as jumlah from transaksi where Year(tanggal_transaksi)='$tahun' group by bulan");

$transaksiDiterima = query("select count(id_transaksi) as jumlah from transaksi where status = 'Pembayaran Diterima' and Year(tanggal_transaksi) = '$tahun'")[0]['jumlah'];
$transaksiDitunggu = query("select count(id_transaksi) as jumlah from transaksi where status = 'Menunggu Pembayaran' and Year(tanggal_transaksi) = '$tahun'")[0]['jumlah'];
$transaksiDitolak = query("select count(id_transaksi) as jumlah from transaksi where status = 'Pembayaran Ditolak' and Year(tanggal_transaksi) = '$tahun'")[0]['jumlah'];
$pendapatanPertahun = query("select sum(total) as total from transaksi where status = 'Pembayaran Diterima' and Year(tanggal_transaksi)='$tahun'")[0]['total'];
$pendapatan = query("select sum(total) as total from transaksi where status = 'Pembayaran Diterima' and Year(tanggal_transaksi)='$tahun' and month(tanggal_transaksi) = '$bulan'")[0]['total'];
// echo "<pre>";
// var_dump($transaksiDiterima);
// var_dump($transaksiDitunggu);
// var_dump($transaksiDitolak);
// var_dump($pendapatan);
// echo "</pre>";
// die;
?>

<!-- heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
  <div class="col">
    <button class="btn btn-outline-info float-right d-none d-sm-inline-block" data-toggle="modal" data-target="#modalLaporan"><i class="fas fa-file-pdf"></i> Laporan</button>
  </div>
</div>

<!-- Content Row -->
<div class="row">
<!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                          Revenue / Pendapatan <?= date('F') ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($pendapatan, 0, 0, '.'); ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  <!-- <fa-2x class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Diterima</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $transaksiDiterima; ?></div>
                </div>
                <div class="col-auto">
                <i class="fas fa-check fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pelanggan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $transaksiDitunggu; ?></div>
                </div>
                <div class="col-auto">
                <i class="far fa-clock fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                          Pendapatan <?= $tahun; ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($pendapatanPertahun, 0, 0, '.'); ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Bar Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4" style="height:500px">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">Transaksi Perbulan</h6>
            </div>
            <div class="card-body">
                <div class="chart-bar">
                    <canvas id="myChart" style="max-height: 400px;" ></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Laporan -->
<form action="modules/beranda/cetak.php" method="GET" enctype="multipart/form-data" target="_blank">
  <div class="modal" id="modalLaporan">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: black;">
          <h5 style="color: white" class="modal-title">Buat Laporan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="color: black;">
          <div class="container-fluid">
            <div class="form-group row">
              <label for="kategoriLayanan" class="col-sm-3 col-form-label">Tanggal Awal</label>
              <div class="col-sm-9">
              <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_awal" autocomplete="off" required>
                <div class="invalid-feedback">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="kategoriLayanan" class="col-sm-3 col-form-label">Tanggal Akhir</label>
              <div class="col-sm-9">
              <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_akhir" autocomplete="off" required>
                <div class="invalid-feedback">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary"><i class="fas fa-file-pdf"></i> Buat PDF</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- Akhir modal laporan -->

<script src="assets/js/chart.min.js"></script>
<script>
const booking_perbulan = document.getElementById('Chart1');
const transaksi_bulan = [];
const transaksi_jumlah = [];
const namaBulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni",
    "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

<?php foreach ($transaksiPerbulan as $b) : ?>
transaksi_bulan.push(namaBulan[<?= $b['bulan']; ?>]);
transaksi_jumlah.push(<?= $b['jumlah']; ?>);
<?php endforeach; ?>
// console.log(transaksi_bulan);
// console.log(transaksi_jumlah);

const data = {
  labels: transaksi_bulan,
  datasets: [{
    label: 'Transaksi Perbulan',
    backgroundColor: 'rgb(255, 99, 132)',
    borderColor: 'rgb(255, 99, 132)',
    data: transaksi_jumlah,
    backgroundColor: [
      'rgba(255, 99, 132)',
      'rgba(255, 159, 64)',
      'rgba(255, 205, 86)',
      'rgba(75, 192, 192)',
      'rgba(54, 162, 235)',
      'rgba(153, 102, 255)',
      'rgba(201, 203, 207)'
    ],
  }]
};

const config = {
  type: 'bar',
  data,
  options: {
    scales: {
          y: {
            ticks: {
              stepSize: 1
            }
          }
        },
  }
};


var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );

  const pieChart = document.getElementById('myPieChart');
  const data_presentase = [];
  data_presentase.push(<?= $transaksiDiterima; ?>);
  data_presentase.push(<?= $transaksiDitunggu; ?>);
  data_presentase.push(<?= $transaksiDitolak; ?>);
  // console.log(data_presentase);
  const data_transaksi = {
    datasets: [{
      label: '',
      data: data_presentase,
      backgroundColor: [
        'rgba(86, 235, 52)',
        'rgba(52, 171, 235)',
        'rgba(235, 70, 52)',
      ]
    }],
    labels: ['Diterima', 'Ditunggu', 'Ditolak']
  }
  const Chart2 = new Chart(
    pieChart, {
      type: 'doughnut',
      data: data_transaksi,
    }
  );
</script>