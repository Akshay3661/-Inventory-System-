<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Profile\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['middleware' => ['auth','permission']], function() {
    //     Route::get('admin/login', [App\Http\Controllers\Admin\AdminController::class, 'adminLogin'])->name('admin.login');
    //     Route::get('admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');
    //     Route::get('/logout',[App\Http\Controllers\Admin\AdminController::class,'logout'])->name('admin.logout');

// });

//permission-permission
//Route::resource('admin/roles', App\Http\Controllers\Admin\RoleController::class);
//Route::resource('admin/permissions', App\Http\Controllers\Admin\PermissionController::class);

// Role
// Route::get('admin/roles', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('admin.roles.list');
// Route::get('admin/roles/create', [App\Http\Controllers\Admin\RoleController::class, 'create'])->name('admin.roles');
// Route::post('admin/roles/store', [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('admin.roles.store');
// Route::get('admin/roles/show/{id}', [App\Http\Controllers\Admin\RoleController::class, 'show'])->name('admin.roles.show');
// Route::get('admin/roles/edit/{id}', [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('admin.roles.edit');
// Route::post('admin/roles/update/{id}', [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('admin.roles.update');
// Route::delete('admin/roles/delete/{id}', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('admin.roles.delete');

// Permissions
// Route::get('admin/permissions', [App\Http\Controllers\Admin\PermissionController::class, 'index'])->name('admin.permissions.list');
// Route::get('admin/permissions/create', [App\Http\Controllers\Admin\PermissionController::class, 'create'])->name('admin.permissions');
// Route::post('admin/permissions/store', [App\Http\Controllers\Admin\PermissionController::class, 'store'])->name('admin.permissions.store');
// Route::get('admin/permissions/show/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'show'])->name('admin.permissions.show');
// Route::get('admin/permissions/edit/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'edit'])->name('admin.permissions.edit');
// Route::post('admin/permissions/update/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'update'])->name('admin.permissions.update');
// Route::delete('admin/permissions/delete/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'destroy'])->name('admin.permissions.delete');

//Admin
Route::get('admin/login', [App\Http\Controllers\Admin\AdminController::class, 'adminLogin'])->name('admin.login');
Route::post('/login',[App\Http\Controllers\Admin\AdminController::class,'authenticate'])->name('admin.auth');
Route::get('/logout',[App\Http\Controllers\Admin\AdminController::class,'logout'])->name('admin.logout');
Route::get('admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');

// User Manage
Route::get('admin/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.list');
Route::get('admin/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users');
Route::post('admin/users/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');
Route::get('admin/users/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
Route::post('admin/users/update/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
Route::delete('admin/users/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.delete');

//Profile
Route::get('admin/profile', [App\Http\Controllers\Admin\Profile\ProfileController::class, 'index'])->name('profile');
Route::post('admin/profile_update/{id}',[App\Http\Controllers\Admin\Profile\ProfileController::class,'update'])->name('profile_update');
Route::post('admin/password_update/{id}',[App\Http\Controllers\Admin\Profile\ProfileController::class,'passwordUpdate'])->name('password_update');
Route::post('admin/profile_image/{id}',[App\Http\Controllers\Admin\Profile\ProfileController::class,'profileImage'])->name('profile_image');
Route::post('admin/email_update/{id}',[App\Http\Controllers\Admin\Profile\ProfileController::class,'emailUpdate'])->name('email_update');

//Account Setting
Route::get('admin/accountsetting', [App\Http\Controllers\Admin\AccountsettingController::class, 'index'])->name('admin.accountsetting');

//Setting
Route::get('admin/setting', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin.setting');
Route::post('admin/setting/store/', [App\Http\Controllers\Admin\SettingController::class, 'store'])->name('admin.setting.store');

//Category
Route::get('admin/category', [App\Http\Controllers\Admin\Category\CategoryController::class, 'index'])->name('admin.category.list');
Route::get('admin/category/create', [App\Http\Controllers\Admin\Category\CategoryController::class, 'create'])->name('admin.category');
Route::post('admin/category/store', [App\Http\Controllers\Admin\Category\CategoryController::class, 'store'])->name('admin.category.store');
Route::get('admin/category/edit/{id}', [App\Http\Controllers\Admin\Category\CategoryController::class, 'edit'])->name('admin.category.edit');
Route::post('admin/category/update/{id}', [App\Http\Controllers\Admin\Category\CategoryController::class, 'update'])->name('admin.category.update');
Route::delete('admin/category/delete/{id}', [App\Http\Controllers\Admin\Category\CategoryController::class, 'destroy'])->name('admin.category.delete');

//Product
Route::get('admin/product', [App\Http\Controllers\Admin\Product\ProductController::class, 'index'])->name('admin.product.list');
Route::get('admin/product/create', [App\Http\Controllers\Admin\Product\ProductController::class, 'create'])->name('admin.product');
Route::post('admin/product/store', [App\Http\Controllers\Admin\Product\ProductController::class, 'store'])->name('admin.product.store');
Route::get('admin/product/edit/{id}', [App\Http\Controllers\Admin\Product\ProductController::class, 'edit'])->name('admin.product.edit');
Route::post('admin/product/update/{id}', [App\Http\Controllers\Admin\Product\ProductController::class, 'update'])->name('admin.product.update');
Route::delete('admin/product/delete/{id}', [App\Http\Controllers\Admin\Product\ProductController::class, 'destroy'])->name('admin.product.delete');

//Employee
Route::get('admin/employee', [App\Http\Controllers\Admin\Employee\EmployeeController::class, 'index'])->name('admin.employee.list');
Route::get('admin/employee/create', [App\Http\Controllers\Admin\Employee\EmployeeController::class, 'create'])->name('admin.employee');
Route::post('admin/employee/store', [App\Http\Controllers\Admin\Employee\EmployeeController::class, 'store'])->name('admin.employee.store');
Route::get('admin/employee/edit/{id}', [App\Http\Controllers\Admin\Employee\EmployeeController::class, 'edit'])->name('admin.employee.edit');
Route::post('admin/employee/update/{id}', [App\Http\Controllers\Admin\Employee\EmployeeController::class, 'update'])->name('admin.employee.update');
Route::delete('admin/employee/delete/{id}', [App\Http\Controllers\Admin\Employee\EmployeeController::class, 'destroy'])->name('admin.employee.delete');
