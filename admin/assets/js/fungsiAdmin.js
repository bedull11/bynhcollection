$(".btn-detail").on("click", function () {
  // alert('ok');
  // get data from button edit
  const id_bayar = $(this).data("idb");
  const id_transaksi = $(this).data("id");
  const nama = $(this).data("nama");
  const telepon = $(this).data("telepon");
  const jumlah_bayar = $(this).data("jumlah");
  const status_bayar = $(this).data("status");
  const tanggal_bayar = $(this).data("tanggal");
  const bukti_bayar = $(this).data("bukti");

  // console.log(id_transaksi);
  // console.log(nama);
  // console.log(telepon);
  // console.log(jumlah_bayar);
  // console.log(status_bayar);
  // console.log(tanggal_bayar);
  // console.log(bukti_bayar);

  $("span.id_transaksi").text(id_transaksi);
  $("span.nama").text(nama);
  $("span.telepon").text(telepon);
  $("span.jumlah_bayar").text(jumlah_bayar);
  $("span.status_bayar").text(status_bayar);
  $("span.tanggal_bayar").text(tanggal_bayar);
  $("img.img-bukti").attr("src", `../img/pembayaran/${bukti_bayar}`);

  $("a.btn-terima").attr(
    "href",
    `modules/pembayaran/proses.php?act=terima&id=${id_transaksi}`
  );
  $("a.btn-tolak").attr(
    "href",
    `modules/pembayaran/proses.php?act=tolak&id=${id_transaksi}`
  );

  // Call Modal Edit
  $("#modalDetail").modal("show");
});

// Delete
$(".btn-hapusPembeli").on("click", function () {
  // get data from button edit
  const id_pembeli = $(this).data("id");
  const nama = $(this).data("nama");

  // console.log(id_pembeli);
  // console.log(nama);

  // Set data to Form Edit
  $(".id_pembeli").val(id_pembeli);
  $(".ket-hapus").text(`Apakah kamu yakin ingin menghapus Pembeli ${nama} ?`);

  // Call Modal Edit
  $("#modalHapus").modal("show");
});
$(".btn-hapusTransaksi").on("click", function () {
  // get data from button edit
  const id_transaksi = $(this).data("id");
  const nama = $(this).data("nama");

  // console.log(id_transaksi);
  // console.log(nama);

  // Set data to Form Edit
  $(".id_transaksi").val(id_transaksi);
  $(".ket-hapus").text(
    `Apakah kamu yakin ingin menghapus Transaksi ${id_transaksi} atas nama ${nama}?`
  );

  // Call Modal Edit
  $("#modalHapus").modal("show");
});
$(".btn-hapusAdmin").on("click", function () {
  // get data from button edit
  const id_admin = $(this).data("id");
  const nama = $(this).data("nama");

  // console.log(id_admin);
  // console.log(nama);

  // Set data to Form Edit
  $(".id_admin").val(id_admin);
  $(".ket-hapus").text(
    `Apakah kamu yakin ingin menghapus Admin dengan nama ${nama}?`
  );

  // Call Modal Edit
  $("#modalHapus").modal("show");
});
$(".btn-hapusMenu").on("click", function () {
  // get data from button edit
  const id_dimsum = $(this).data("id");
  const nama = $(this).data("nama");

  console.log(id_dimsum);
  console.log(nama);

  // Set data to Form Edit
  $(".id_dimsum").val(id_dimsum);
  $(".ket-hapus").text(
    `Apakah kamu yakin ingin menghapus produk dengan nama ${nama}?`
  );

  // Call Modal Edit
  $("#modalHapus").modal("show");
});
