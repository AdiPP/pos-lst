<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/logout', function () {
//     Auth::logout();
// });

Route::get('/login', function () {
    return view('registrasi.login');
});

Route::get('/logout', function () {
    Session::flush();
    
    return redirect('/login');
});

// dashboard
Route::get('/dashboard', 'HomeController@index')->name('home');

// modul super admin
Route::get('/admin/master/modals', 'AdminController@modals');
Route::get('/admin/master/unit/hapus', 'AdminController@unitHapus');
Route::get('/admin/master/unit/tampil', 'AdminController@unitTampil');
Route::post('/admin/master/unit/tambah', 'AdminController@unitTambah');
Route::get('/admin/master', 'AdminController@masterIndex');
Route::post('/admin/login/proses', 'AdminController@loginProses');
Route::get('/admin/login', 'AdminController@login');
Route::resource('/admin', 'AdminController');

// modul transaksi
Route::post('/pos/pelanggan/tambah', 'PosController@tambahPelanggan');
Route::get('/pos/pelanggan/reload', 'PosController@reloadPelanggan');
Route::post('/pos/bayar', 'PosController@bayar');
Route::get('/pos/infototal', 'PosController@infoTotal');
Route::get('/pos/keranjang/tambah', 'PosController@keranjangTambah');
Route::get('/pos/keranjang/kurang', 'PosController@keranjangKurang');
Route::get('/pos/keranjang/tampil', 'PosController@keranjangTampil');
Route::post('/pos/keranjang', 'PosController@keranjang');
Route::get('/pos/infoproduk', 'PosController@infoProduk');
Route::resource('/pos', 'PosController');


// modul registrasi
Route::post('/login/action', 'RegistrasiController@login');
Route::post('/pemulihan/katasandi/action', 'RegistrasiController@pemulihanKataSandiAction');
Route::get('/pemulihan/katasandi/{encryptedId}', 'RegistrasiController@pemulihanKataSandi');
Route::post('/lupapassword/kirimemail', 'RegistrasiController@lupaPasswordAction');
Route::get('/lupapassword', 'RegistrasiController@lupaPassword');
Route::resource('/registrasi', 'RegistrasiController');
Route::get('/email/verify/{vkey}', 'RegistrasiController@verifyEmail');
Route::get('/email/resend', 'RegistrasiController@resend');
Route::post('/email/resend/action', 'RegistrasiController@resendAction');

// modul produk
Route::resource('/produk/kategori', 'KategoriProdukController');
Route::resource('/produk', 'ProdukController');

// modul inventori
//  kartu stok
Route::get('/inventori/kartustok/tampil', 'InventoriController@tampilKartuStok');
Route::resource('/inventori/kartustok', 'InventoriController');
//  stok masuk
Route::get('/inventori/stokmasuk/tambahproduk', 'StokMasukController@tambahProduk');
Route::get('/inventori/stokmasuk/infoproduk', 'StokMasukController@infoProduk');
Route::resource('/inventori/stokmasuk', 'StokMasukController');
//  stok keluar
Route::resource('/inventori/stokkeluar', 'StokKeluarController');
//  transfer stok
Route::get('/inventori/transferstok/hapustemp', 'TransferStokController@hapusTemp');
Route::get('/inventori/transferstok/tampiltemp', 'TransferStokController@tampilTemp');
Route::post('/inventori/transferstok/tambahproduk', 'TransferStokController@tambahProduk');
Route::get('/inventori/transferstok/infoproduk', 'TransferStokController@infoProduk');
Route::resource('/inventori/transferstok', 'TransferStokController');
// stok opname
Route::get('/inventori/stokopname/setoutlet', 'StokOpnameController@setOutlet');
Route::get('/inventori/stokopname/hapustemp', 'StokOpnameController@hapusTemp');
Route::get('/inventori/stokopname/tampiltemp', 'StokOpnameController@tampilTemp');
Route::post('/inventori/stokopname/tambahproduk', 'StokOpnameController@tambahProduk');
Route::get('/inventori/stokopname/infoproduk', 'StokOpnameController@infoProduk');
Route::resource('/inventori/stokopname', 'StokOpnameController');

// modul supplier
Route::resource('/supplier', 'SupplierController');

// modul laporan
Route::resource('/laporan', 'LaporanController');

// modul outlet
Route::resource('/outlet', 'OutletController');

// modul pelanggan
Route::resource('/pelanggan', 'PelangganController');

// modul pengaturan
Route::post('/pengaturan/perbaruipassword', 'PengaturanController@perbaruiPassword');
Route::post('/pengaturan/perbaruiinfobisnis/aksi', 'PengaturanController@perbaruiInfoBisnisAksi');
Route::get('/pengaturan/perbaruiinfobisnis/pilihprovinsi', 'PengaturanController@pilihProvinsi');
Route::get('/pengaturan/perbaruiinfobisnis', 'PengaturanController@perbaruiInfoBisnis');
Route::post('/pengaturan/perbaruiinfoakun', 'PengaturanController@perbaruiInfoAkun');
Route::resource('/pengaturan', 'PengaturanController');

// dump route
Route::get('/email/check', 'RegistrasiController@checkMail');
Route::get('/send/email', 'HomeController@mail');
