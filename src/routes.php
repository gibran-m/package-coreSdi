<?php
use Illuminate\Support\Facades\Route;
use Bjbs\Coresdi\Http\Controllers\Dashboard\DashboardController;
use Bjbs\Coresdi\Http\Controllers\MasterData\UnitKerjaController;



  // dashboard section
  Route::get('/dashboard', [DashboardController::class, 'hrdlive'])->middleware('cek.auth')->name('dashboard');
  
  // master data section
  Route::prefix('/master-data')->name('master-data.')->group(function () {
      Route::prefix('/unit-kerja')->name('unit-kerja.')->group(function () {
          Route::get('/', [UnitKerjaController::class, 'index'])->middleware('cek.auth')->name('index');
          Route::get('/add', [UnitKerjaController::class, 'add'])->middleware('cek.auth')->name('add');
          Route::get('/add', [UnitKerjaController::class, 'add'])->middleware('cek.auth')->name('add');
          Route::post('/create', [UnitKerjaController::class, 'create'])->middleware('cek.auth')->name('create');
          Route::get('/edit/{id}', [UnitKerjaController::class, 'edit'])->middleware('cek.auth')->name('edit');
          Route::post('/update/{id}', [UnitKerjaController::class, 'update'])->middleware('cek.auth')->name('update');
          Route::get('/datatables', [UnitKerjaController::class, 'dataTables'])->middleware('cek.auth')->name('datatables');
          Route::get('/datatable/filter', [UnitKerjaController::class, 'dataTablesFilter'])->middleware('cek.auth')->name('datatables-filter');
      });
  
      // Route::prefix('/pangkat')->name('pangkat.')->group(function () {
      //     Route::get('/', [PangkatController::class, 'index'])->middleware('cek.auth')->name('index');
      //     Route::get('/add', [PangkatController::class, 'add'])->middleware('cek.auth')->name('add');
      //     Route::post('/create', [PangkatController::class, 'create'])->middleware('cek.auth')->name('create');
      //     Route::get('/edit/{id}', [PangkatController::class, 'edit'])->middleware('cek.auth')->name('edit');
      //     Route::post('/update/{id}', [PangkatController::class, 'update'])->middleware('cek.auth')->name('update');
      //     Route::get('/datatable', [PangkatController::class, 'dataTables'])->middleware('cek.auth')->name('datatables');
      //     Route::get('/datatable/filter', [PangkatController::class, 'dataTablesFilter'])->middleware('cek.auth')->name('datatables-filter');
      // });
  
      // Route::prefix('/jabatan')->name('jabatan.')->group(function () {
      //     Route::get('/', [JabatanController::class, 'index'])->middleware('cek.auth')->name('index');
      //     Route::get('/add', [JabatanController::class, 'add'])->middleware('cek.auth')->name('add');
      //     Route::post('/create', [JabatanController::class, 'create'])->middleware('cek.auth')->name('create');
      //     Route::get('/edit/{id}', [JabatanController::class, 'edit'])->middleware('cek.auth')->name('edit');
      //     Route::patch('/update/{id}', [JabatanController::class, 'update'])->middleware('cek.auth')->name('update');
      //     Route::get('/datatables', [JabatanController::class, 'dataTables'])->middleware('cek.auth')->name('datatables');
      //     Route::get('/datatable/filter', [JabatanController::class, 'dataTablesFilter'])->middleware('cek.auth')->name('datatables-filter');
      // });
  
      // Route::prefix('/pendidikan')->name('pendidikan.')->group(function () {
      //     Route::get('/', [PendidikanController::class, 'index'])->name('index');
      //     Route::prefix('/add')->name('add.')->group(function () {
      //         Route::get('/pendidikan', [PendidikanController::class, 'addPendidikan'])->middleware('cek.auth')->name('pendidikan');
      //         Route::get('/perguruan', [PendidikanController::class, 'addPerguruan'])->middleware('cek.auth')->name('perguruan');
      //         Route::get('/fakultas', [PendidikanController::class, 'addFakultas'])->middleware('cek.auth')->name('fakultas');
      //         Route::get('/jurusan', [PendidikanController::class, 'addJurusan'])->middleware('cek.auth')->name('jurusan');
      //         Route::get('/kursus', [PendidikanController::class, 'addKursus'])->middleware('cek.auth')->name('kursus');
      //         Route::get('/akreditasi', [PendidikanController::class, 'addAkreditasi'])->middleware('cek.auth')->name('akreditasi');
      //     });
      //     Route::prefix('/create')->name('create.')->group(function () {
      //         Route::get('/pendidikan', [JabatanController::class, 'createPendidikan'])->middleware('cek.auth')->name('pendidikan');
      //         Route::get('/perguruan', [JabatanController::class, 'createPerguruan'])->middleware('cek.auth')->name('perguruan');
      //         Route::post('/fakultas', [JabatanController::class, 'createFakultas'])->middleware('cek.auth')->name('fakultas');
      //         Route::get('/jurusan', [JabatanController::class, 'createJurusan'])->middleware('cek.auth')->name('jurusan');
      //         Route::patch('/kursus', [JabatanController::class, 'createKursus'])->middleware('cek.auth')->name('kursus');
      //         Route::get('/akreditasi', [JabatanController::class, 'createAkreditasi'])->middleware('cek.auth')->name('akreditasi');
      //     });
  
      //     Route::prefix('/edit')->name('edit.')->group(function () {
      //         Route::get('/pendidikan', [JabatanController::class, 'editPendidikan'])->middleware('cek.auth')->name('pendidikan');
      //         Route::get('/perguruan', [JabatanController::class, 'editPerguruan'])->middleware('cek.auth')->name('perguruan');
      //         Route::post('/fakultas', [JabatanController::class, 'editFakultas'])->middleware('cek.auth')->name('fakultas');
      //         Route::get('/jurusan', [JabatanController::class, 'editJurusan'])->middleware('cek.auth')->name('jurusan');
      //         Route::patch('/kursus', [JabatanController::class, 'editKursus'])->middleware('cek.auth')->name('kursus');
      //         Route::get('/akreditasi', [JabatanController::class, 'editAkreditasi'])->middleware('cek.auth')->name('akreditasi');
      //     });
  
      //     Route::post('/create', [PendidikanController::class, 'create'])->middleware('cek.auth')->name('create');
      //     Route::get('/edit/{id}', [PendidikanController::class, 'edit'])->middleware('cek.auth')->name('edit');
      //     Route::get('/update', [PendidikanController::class, 'update'])->middleware('cek.auth')->name('update');
      //     Route::get('/datatables', [PendidikanController::class, 'dataTables'])->middleware('cek.auth')->name('datatables');
      // });
  
      // Route::prefix('/corporate-title')->name('corporate-title.')->group(function () {
      //     Route::get('/', [CorporateTitleController::class, 'index'])->middleware('cek.auth')->name('index');
      //     Route::get('/add', [CorporateTitleController::class, 'add'])->middleware('cek.auth')->name('add');
      //     Route::post('/create', [CorporateTitleController::class, 'create'])->middleware('cek.auth')->name('create');
      //     // Route::get('/edit/{id}', [CorporateTitleController::class,'edit'])->name('edit');
      //     // Route::get('/update', [CorporateTitleController::class,'update'])->name('update');
      //     // Route::get('/datatables', [CorporateTitleController::class,'dataTables'])->name('datatables');
      // });
  
      // Route::prefix('/data-pegawai')->name('data-pegawai.')->group(function () {
      //     Route::prefix('/daftar-pegawai')->name('daftar-pegawai.')->group(function () {
      //         Route::get('/', [DaftarPegawaiController::class, 'index'])->middleware('cek.auth')->name('index');
      //         Route::get('/datatables', [DaftarPegawaiController::class, 'datatables'])->middleware('cek.auth')->name('datatables');
      //         Route::get('/verifikasi', [VerifikasiController::class, 'index'])->middleware('cek.auth')->name('verifikasi');
      //     });
      // });
  
  });
  
  // Pegawai section
//   Route::prefix('/pegawai')->name('pegawai.')->group(function () {
//       Route::prefix('/dashboard')->name('dashboard.')->group(function () {
//           Route::get('/', [DashboardPegawaiController::class, 'index'])->middleware('cek.auth')->name('index');
//           Route::get('/image/popup/{filename}', [DashboardPegawaiController::class, 'imagePopup'])->middleware('cek.auth')->name('image.popup'); // homepage.image.popup
//       });
//   });
