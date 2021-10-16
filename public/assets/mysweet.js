const data = $('.flash-data').data('flashdata');

if(data) {
  Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'jumlah pengambilan : ' + data,
  confirmButtonText : '<i class="fa fa-thumbs-up"></i> Terimakaish!',
  timer: 2000
})
}
