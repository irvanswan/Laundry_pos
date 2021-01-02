// $(document).ready(function () { // Ketika halaman sudah diload dan siap
//     $("#btn-tambah-form").click(function () { // Ketika tombol Tambah Data Form di klik
//         var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
//         var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

//         // Kita akan menambahkan form dengan menggunakan append
//         // pada sebuah tag div yg kita beri id insert-form
//         $("#insert-form").append(
//             "<hr>" +
//             "<h5 class='card-category mt-4'> Data ke - " + nextform + "</h5>" +
//             "<div class='form-row mt-4'>" +

//             "<div class='form-group col-md-4'>" +
//             "<label for='no_pemesanan'>No Pemesanan</label>" +
//             "<input type='text' class='form-control' name='no_pemesanan[]' id='no_pemesanan' placeholder='thn/bln/00001'>" +
//             "</div>" +

//             "<div class='form-group col-md-4'>" +
//             "<label for='nama_customer'>Nama Customer</label>" +
//             "<input type='text' class='form-control' name='nama_customer[]' id='nama_customer'>" +
//             "</div>" +

//             "<div class='form-group col-md-4'>" +
//             "<label for='nama_kasir'>Nama Kasir</label>" +
//             "<input type='text' class='form-control' name='nama_kasir[]' value='' id='nama_kasir' readonly>" +
//             "</div>" +
//             "</div>" +

//             "<div class='form-row'>" +

//             "<div class='form-group col-md-3'>" +
//             "<label for= 'berat_cucian' > Berat Cuci</label>" +
//             "<div class='input-group mb-2'>" +
//             "<div class='input-group-prepend'>" +
//             "<div class='input-group-text'>Kg</div>" +
//             "</div>" +
//             "<input type='number' class='form-control' name='berat_cucian' id='berat_cucian' placeholder='1'>" +
//             "</div>" +
//             "</div>" +

//             "<div class='form-group col-md-3'>" +
//             "<label for='paket_cucian'>Paket Cuci</label>" +
//             "<select id='paket_cucian' class='form-control' name='paket_cucian'>" +
//             "<option selected>Pilih...</option>" +
//             "<option value='3000'>Paket Kilat</option>" +
//             "<option value='4000'>Paket Biasa</option>" +
//             "</select>" +
//             "</div>" +

//             "<div class='form-group col-md-3'>" +
//             "<label for='jenis_cucian'>Jenis Cuci</label>" +
//             "<select id='jenis_cucian' class='form-control' name='jenis_cucian'>" +
//             "<option selected>Pilih...</option>" +
//             "<option value='1000'>Baju</option>" +
//             "<option value='3000'>Boneka</option>" +
//             "</select>" +
//             "</div>" +

//             "<div class='form-group col-md-3'>" +
//             "<label for='parfum_cucian'>Parfum Cuci</label>" +
//             "<select id='parfum_cucian' class='form-control' name='parfum_cucian'>" +
//             "<option selected>Pilih...</option>" +
//             "<option value='500'>Relaxa</option>" +
//             "<option value='1000'>Fablance</option>" +
//             "</select>" +
//             "</div>" +

//             "</div>" +

//             "<div class='form-row'>" +

//             "<div class='form-group col-md-4'>" +
//             "<label for='no_telp_customer'>No Whatsapp Aktif</label>" +
//             "<div class='input-group mb-2'>" +
//             "<div class='input-group-prepend'>" +
//             "<div class='input-group-text'>+62</div>" +
//             "</div>" +
//             "<input type='number' class='form-control' name='no_telp_customer' id='no_telp_customer' placeholder='85...'>" +
//             "</div>" +
//             "</div>" +

//             "<div class='form-group col-md-4'>" +
//             "<label for='status'>Status</label>" +
//             "<select id='status' class='form-control' name='status'>" +
//             "<option selected>Pilih...</option>" +
//             "<option value='1'>Tunggu</option>" +
//             "<option value='2'>Cuci - Siap Ambil</option>" +
//             "<option value='3'>Dryer - Siap Ambil</option>" +
//             "<option value='4'>Setrika - Siap Ambil</option>" +
//             "<option value='5'>Selesai</option>" +
//             "</select>" +
//             "</div>" +

//             "<div class='form-group col-md-4'>" +
//             "<label for='harga_total_pemesanan'>Harga Total</label>" +
//             "<input type='number' class='form-control money' name='harga_total_pemesanan' id='harga_total_pemesanan' readonly>" +
//             "</div>" +

//             "</div>" +

//             "<div class='form-row'>" +

//             "<div class='form-group col-md-6'>" +
//             "<label for='bayar'>Bayar</label>" +
//             "<input type='number' class='form-control money' name='bayar' id='bayar'>" +
//             "</div>" +

//             "<div class='form-group col-md-6'>" +
//             "<label for='kembalian'>Kembalian</label>" +
//             "<input type='number' class='form-control money' name='kembalian' id='kembalian' readonly>" +
//             "</div>" +

//             "</div>"
//         );

//         $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
//     });
//     // Buat fungsi untuk mereset form ke semula
//     $("#btn-reset-form").click(function () {
//         $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
//         $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
//     });
// });