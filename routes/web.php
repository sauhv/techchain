<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\AdminLoaiController;
use App\Http\Controllers\AdminSPController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ThanhVienController;
use Illuminate\Http\Request;

Route::get('/', [SanPhamController::class,'index']);
Route::get('/sp/{id}', [SanPhamController::class,'chitiet']);
Route::get('/loai/{id}', [SanPhamController::class,'sptrongloai']);
Route::get('/test/{a}/{b}', [SanPhamController::class,'test']);

Route::get('/themvaogio/{idsp}/{soluong}', [SanPhamController::class,'themvaogio']);
Route::get('/hiengiohang', [SanPhamController::class,'hiengiohang']);
Route::get('/xoasptronggio/{idsp}', [SanPhamController::class,'xoasptronggio']);
Route::get('/xoagiohang', [SanPhamController::class,'xoagiohang']);
Route::get('/thanhtoan', [SanPhamController::class,'thanhtoan']);
Route::post('/luudonhang', [SanPhamController::class,'luudonhang']);
Route::get('/thongbao', [SanPhamController::class,'thongbao']);
Route::get('/download', [SanPhamController::class,'download'])->middleware('auth');

Route::get('/chenuser', function(){
    DB::table('users')->insert([
        'ho' => 'Huỳnh Văn','ten' => 'B', 'password' => bcrypt('123') , 'diachi'=>'',
        'email' => 'dodatcao@gmail.com','dienthoai' => '0353605902',
        'hinh' => '','vaitro' => 1 ,'trangthai' => 0
    ]);
    DB::table('users')->insert([
        'ho' => 'Huỳnh Văn','ten' => 'A', 'password' => bcrypt('123') ,'diachi'=>'',
        'email' => 'maianhtoi@gmail.com','dienthoai' => '098532482',
        'hinh' => '','vaitro' => 0 ,'trangthai' => 0
    ]);
    DB::table('users')->insert([
        'ho' => 'Huỳnh Văn','ten' => 'Sáu', 'password' => bcrypt('123') ,'diachi'=>'',
        'email' => 'admin@gmail.com','dienthoai' => '0353605901',
        'hinh' => '','vaitro' => 1 ,'trangthai' => 1
    ]);
});


Route::group(['prefix' => 'admin'], function() {   
    Route::get('dangnhap', [AdminController::class,'dangnhap']);
    Route::post('dangnhap', [AdminController::class,'dangnhap_']);
    Route::get('thoat', [AdminController::class, 'thoat']);
});

Route::group(['prefix' => 'admin','middleware' => 'adminauth'], function() {   
    Route::get('/', [AdminController::class,'index']);
    Route::resource('loai', AdminLoaiController::class); //resource route đặt biệt 
    Route::resource('sanpham', AdminSPController::class); //resource route đặt biệt 
    
});
Route::get('/dangnhap',[ThanhvienController::class,'dangnhap'])->name('login');
Route::post('/dangnhap', [ThanhvienController::class,'dangnhap_']);
Route::get('/thoat', [ThanhvienController::class,'thoat']);
Route::get('/dangky', [ThanhvienController::class,'dangky']);
Route::post('/dangky', [ThanhvienController::class,'dangky_']);
Route::get('/camon', [ThanhvienController::class,'camon']);

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/email/verify', function () {
    return view('verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/download', [SanPhamController::class,'download'])->middleware('auth','verified');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Thư kích hoạt đã gửi!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
