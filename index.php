<?php
ob_start();
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE); 


//kiểm tra xem có file log chưa? chưa :tạo file và lưu vào /có: lưu vào luôn 
ini_set('error_log', './logs/php/php-errors.log');

use App\Helpers\AuthHelper;
use App\Route;

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once 'config.php';

AuthHelper::middleware();
 



// *** Client
Route::get('/', 'App\Controllers\Client\HomeController@index');
Route::get('/products', 'App\Controllers\Client\ProductController@index');
Route::get('/products/{id}', 'App\Controllers\Client\ProductController@detail');
Route::get('/products/categories/{id}', 'App\Controllers\Client\ProductController@getProductByCategory');

Route::post('/comments', 'App\Controllers\Client\CommentController@store');

Route::put('/comments/{id}', 'App\Controllers\Client\CommentController@update');

Route::delete('/comments/{id}', 'App\Controllers\Client\CommentController@delete');



Route::get('/register', 'App\Controllers\Client\AuthController@register');
Route::post('/register', 'App\Controllers\Client\AuthController@registerAction');

Route::get('/cart', 'App\Controllers\Client\AuthController@cart');




Route::get('/login', 'App\Controllers\Client\AuthController@login');
Route::post('/login', 'App\Controllers\Client\AuthController@loginAction');


Route::get('/logout', 'App\Controllers\Client\AuthController@logout');


Route::get('/users/{id}', 'App\Controllers\Client\AuthController@edit');
Route::put('/users/{id}', 'App\Controllers\Client\AuthController@update');

Route::get('/change-password', 'App\Controllers\Client\AuthController@changePassword');
Route::put('/change-password', 'App\Controllers\Client\AuthController@changePasswordAction');

Route::get('/forgot-password', 'App\Controllers\Client\AuthController@forgotPassword');
Route::post('/forgot-password', 'App\Controllers\Client\AuthController@forgotPasswordAction');

Route::get('/reset-password', 'App\Controllers\Client\AuthController@resetPassword');
Route::put('/reset-password', 'App\Controllers\Client\AuthController@resetPasswordAction');

// *** Admin

Route::get('/admin', 'App\Controllers\Admin\HomeController@index');

//  *** Category
// GET /categories (lấy danh sách loại sản phẩm)
Route::get('/admin/categories', 'App\Controllers\Admin\CategoryController@index');

// GET /categories/create (hiển thị form thêm loại sản phẩm)
Route::get('/admin/categories/create', 'App\Controllers\Admin\CategoryController@create');

// POST /categories (tạo mới một loại sản phẩm)
Route::post('/admin/categories', 'App\Controllers\Admin\CategoryController@store');

// GET /categories/{id} (lấy chi tiết loại sản phẩm với id cụ thể)
Route::get('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@edit');

// PUT /categories/{id} (update loại sản phẩm với id cụ thể)
Route::put('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@update');

// DELETE /categories/{id} (delete loại sản phẩm với id cụ thể)
Route::delete('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@delete');





//  *** Product
// GET /Product (lấy danh sách  sản phẩm)
Route::get('/admin/products', 'App\Controllers\Admin\ProductController@index');

// GET /Product/create (hiển thị form thêm  sản phẩm)
Route::get('/admin/products/create', 'App\Controllers\Admin\ProductController@create');

// POST /Product (tạo mới một  sản phẩm)
Route::post('/admin/products', 'App\Controllers\Admin\ProductController@store');

// GET /Product/{id} (lấy chi tiết  sản phẩm với id cụ thể)
Route::get('/admin/products/{id}', 'App\Controllers\Admin\ProductController@edit');

// PUT /Product/{id} (update  sản phẩm với id cụ thể)
Route::put('/admin/products/{id}', 'App\Controllers\Admin\ProductController@update');

// DELETE /Product/{id} (delete  sản phẩm với id cụ thể)
Route::delete('/admin/products/{id}', 'App\Controllers\Admin\ProductController@delete');



//  *** User
// GET /User (lấy danh sách  người dùng)
Route::get('/admin/users', 'App\Controllers\Admin\UserController@index');

// GET /User/create (hiển thị form thêm  người dùng)
Route::get('/admin/users/create', 'App\Controllers\Admin\UserController@create');

// POST /User (tạo mới một  người dùng)
Route::post('/admin/users', 'App\Controllers\Admin\UserController@store');

// GET /User/{id} (lấy chi tiết  người dùng với id cụ thể)
Route::get('/admin/users/{id}', 'App\Controllers\Admin\UserController@edit');

// PUT /User/{id} (update  người dùng với id cụ thể)
Route::put('/admin/users/{id}', 'App\Controllers\Admin\UserController@update');

// DELETE /User/{id} (delete  người dùng với id cụ thể)
Route::delete('/admin/users/{id}', 'App\Controllers\Admin\UserController@delete');



//  *** Comment
// GET /Comment (lấy danh sách  bình luận)
Route::get('/admin/comments', 'App\Controllers\Admin\CommentController@index');


// GET /Comment/{id} (lấy chi tiết  bình luận với id cụ thể)
Route::get('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@edit');

// PUT /Comment/{id} (update  bình luận với id cụ thể)
Route::put('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@update');

// DELETE /Comment/{id} (delete  bình luận với id cụ thể)
Route::delete('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@delete');


Route::dispatch($_SERVER['REQUEST_URI']);
