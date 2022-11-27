<?php


Route::get('/',[
    'as'=>'trangchu',
    'uses'=>'PageController@getTrangchu'
]);


// chitietsanpham
Route::get('/chitiet-san-pham/{type}',[
    'as'=>'chitietsanpham',
    'uses'=>'PageController@getChitietsp']);

Route::get('/p/{name1}',[
    'as'=>'chitietsanpham1',
    'uses'=>'PageController@getChitietsp1']);

Route::get('/c/{categorie}',[
    'as'=>'categorie',
    'uses'=>'PageController@get_categorie']);

Route::post('/search', [
    'as'=>'postsearch',
    'uses'=>'PageController@search']);

Route::get('search', 'PageController@search');


Route::get('/banchay', function () {
    return view('banchay');
});
Route::get('/thanhcong',[
    'as'=>'thanhcong',
    'uses'=>'LoginController@getThanhcong'
]);

Route::get('/home',[
    'as'=>'trangchu',
    'uses'=>'PageController@getTrangchu'
]);
Route::get('/loaigiay/{type}',[
    'as'=>'loaigiay',
    'uses'=>'PageController@getLoaigiay']);


Route::get('dat-hang',[
     'as'=>'dathang',
    'uses'=>'PageController@getDathang']);
Route::get('/dangnhap', [
    'as'=>'dangnhap',
    'uses'=>'PageController@getDangnhap']);
Route::get('/dangxuat', [
    'as'=>'dangxuat',
    'uses'=>'PageController@getDangxuat']);
Route::get('/dangky',[
    'as'=>'dangky',
    'uses'=>'PageController@getDangky']);
Route::get('/kiem-tra-don-hang',[
    'as'=>'tracuu',
    'uses'=>'PageController@getTracuu'
]);
Route::get('/timkiem',[
    'as'=>'timkiem',
    'uses'=>'PageController@getTimkiem'
]);
Route::get('/khuyenmai',[
    'as'=>'khuyenmai',
    'uses'=>'PageController@getKhuyenmai'
]);
Route::get('/profile',function(){
    return view('thongtintaikhoan');
});


Route::get('/add-to-cart/{id}',[
    'as'=>'themgiohang',
    'uses'=>'PageController@getAddtocart']);
Route::get('del-cart/{id}',[
    'as'=>'xoagiohang',
    'uses'=>'PageController@getDeletecart']);
Route::get('del-order/{id}',[
    'as'=>'xoadonhang',
    'uses'=>'PageController@getDeleteOrder']);

Route::post('/dangnhap', [
    'as'=>'dangnhap',
    'uses'=>'PageController@postDangnhap']);
Route::post('postdathang',[
     'as'=>'postdathang',
    'uses'=>'PageController@postDathang']);
Route::post('postdathang1',[
     'as'=>'postdathang1',
    'uses'=>'PageController@postDathang1']);
Route::post('/postdangky',[
    'as'=>'dangky',
    'uses'=>'PageController@postDangky']);
Route::post('/posttracuu',[
    'as'=>'posttracuu',
    'uses'=>'PageController@postTracuu']);
Route::post('/profile', [
    'as'=>'postprofile',
    'uses'=>'PageController@postprofile']);


// Phần của admin
Route::get('/admin-order',[
    'as'=>'admin-order',
    'uses'=>'AdminController@getOrder'
]);
Route::get('/admin-account',[
    'as'=>'admin-account',
    'uses'=>'AdminController@getAccount'
]);