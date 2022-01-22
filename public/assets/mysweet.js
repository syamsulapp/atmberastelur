const data_pengambilan = $('.request-pengambilan').data('flashdata');

const sudah_ambil = $('.sudah_ambil').data('flashdata');

if(data_pengambilan) {
  Swal.fire({
  icon: 'success',
  title: 'Sukses...',
  text: 'Pengambilan :' + data_pengambilan,
  footer: '<a href="">Jika Kartu Anda Belum Aktif Segera Laporkan!</a>',
  timer: 5000,
})
}

if(sudah_ambil) {
  Swal.fire({
  icon: 'error',
  title: 'error...',
  text: sudah_ambil,
  footer: '<a href="">Jika Kartu Anda Belum Aktif Segera Laporkan!</a>',
  timer: 5000,
})
}

