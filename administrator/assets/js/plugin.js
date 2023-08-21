// Fungsi untuk menginisialisasi plugin
$(document).ready(function() {
  // jquery datatables
  $('#basic-datatables').DataTable({
  });

  $('#tabel-dokumen').DataTable( {
    "pageLength": 50
  });
  
  $('.tabel-mangrove').DataTable( {
    "pageLength": 50
  });

  // datepicker
  $('.date-picker').datepicker({
      format: "dd-mm-yyyy",
      autoclose: true,
      todayHighlight: true
  });

  // chosen select
  $('.chosen-select').chosen();
});