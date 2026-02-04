<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return "Chào mừng đến với Laravel";
});
Route::get('/about', function () {
    return "
        <p>Họ tên: Đồng Việt Tiến</p>
        <p>Lớp: D18CNPM2 </p>
        <p>MSSV: 23810310142 </p>
    ";
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/tong/{a}/{b}', function ($a, $b) {
    $tong = $a + $b;
    return "Tổng của $a và $b là: $tong";
});
Route::get('/sinh-vien/{name}/{age?}', function ($name, $age = 20) {
    return "Sinh viên: $name - Tuổi: $age";
});

Route::prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return 'Chào mừng Admin';
    });

    Route::get('/users', function () {
        return 'Danh sách người dùng';
    });

});
Route::get('/check-date/{day}/{month}/{year}', function ($day, $month, $year) {
    return "Ngày bạn nhập: $day/$month/$year";
})->where([
    'day'   => '^(?:[1-9]|[12][0-9]|3[01])$',
    'month' => '^(?:[1-9]|1[0-2])$',
    'year'  => '^[0-9]{4}$'
]);