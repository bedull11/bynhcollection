jQuery(function ($) {
  //datepicker plugin
  $(".date-picker").datepicker({
    autoclose: true,
    todayHighlight: true,
  });

  // toolip
  $('[data-toggle="tooltip"]').tooltip();

  // mask
  $(".rupiah").maskMoney({
    thousands: ".",
    decimal: ",",
    precision: 0,
  });
});
