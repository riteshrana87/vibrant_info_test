<?php

use Illuminate\Support\Facades\Route;
use App\Models\CmsPage;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/', [App\Http\Controllers\Front\HomeController::class,'index'])->name('home');

Route::get('/', [App\Http\Controllers\Front\HomeController::class,'login_page'])->name('loginPage');
Route::post('front/login', [App\Http\Controllers\Front\HomeController::class,'frontLogin'])->name('front/login');
Route::get('/signup', [App\Http\Controllers\Front\RegisterController::class,'signup'])->name('frontSignup');
Route::post('front/store-user', [App\Http\Controllers\Front\RegisterController::class,'saveUser'])->name('saveUserData');
Route::post('front/store-subscriber', [App\Http\Controllers\Front\SubsController::class,'storeSubscriber'])->name('saveSubscriberData');
Route::get('/pricing', [App\Http\Controllers\Front\HomeController::class,'pricing'])->name('pricing');
Route::post('front/store-contact', [App\Http\Controllers\Front\ContactUsController::class,'saveContact'])->name('saveContactData');
Route::get('/contract-sub-categorie-data/{id}', [App\Http\Controllers\Front\ContractController::class,'getsubCategorie'])->name('contract.subCategorieTypeData');




// Route::get('/', 'Front\HomeController@index')->name('home');

Route::get('admin/login', [App\Http\Controllers\Auth\AdminLoginController::class,'login'])->name('login');
Route::post('admin/login', [App\Http\Controllers\Auth\AdminLoginController::class,'adminLogin'])->name('adminLogin');


 Auth::routes();
Route::group(['prefix' => 'front'], function () {
    Route::get('/dashboard', [App\Http\Controllers\Front\ClientController::class,'index'])->name('client.dashboard');
    Route::get('/leave', [App\Http\Controllers\Front\LeaveController::class, 'index'])->name('leave');
    Route::get('/add_leave', [App\Http\Controllers\Front\LeaveController::class, 'create'])->name('add_leave');
    Route::post('/leave/create', [App\Http\Controllers\Front\LeaveController::class, 'store'])->name('leave.store');
    Route::get('/profile/{id}', [App\Http\Controllers\Front\ClientController::class, 'profile']);
    Route::post('/profile/update', [App\Http\Controllers\Front\ClientController::class, 'profileUpdate'])->name('profile.update');
});
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    
    //Client Management
    Route::get('/dashboard', [App\Http\Controllers\Admin\EmployeesController::class, 'index'])->name('dashboard');

    Route::get('/employees_management', [App\Http\Controllers\Admin\EmployeesController::class, 'index'])->name('employees_management');
    Route::get('/add_employees', [App\Http\Controllers\Admin\EmployeesController::class, 'create'])->name('add_employees');
    Route::post('/store_employees', [App\Http\Controllers\Admin\EmployeesController::class, 'store'])->name('store_employees');
    Route::get('/edit_employees/{id}', [App\Http\Controllers\Admin\EmployeesController::class, 'edit'])->name('edit_employees');
    Route::post('/update_employees/{id}', [App\Http\Controllers\Admin\EmployeesController::class, 'update'])->name('update_employees');
    Route::get('/delete_employees/{id}', [App\Http\Controllers\Admin\EmployeesController::class, 'destroy'])->name('delete_employees');
    Route::get('/profile', [App\Http\Controllers\Admin\EmployeesController::class, 'profile'])->name('profile');
    Route::post('/profile-update/{id}', [App\Http\Controllers\Admin\EmployeesController::class, 'profileUpdate'])->name('profile-update');
    Route::post('logout', [App\Http\Controllers\Auth\AdminLoginController::class,'logout'])->name('logout');

//Holidays Management
    Route::get('/holiday_management', [App\Http\Controllers\Admin\HolidaysController::class, 'index'])->name('holiday_management');
    Route::get('/add_holiday', [App\Http\Controllers\Admin\HolidaysController::class, 'create'])->name('add_holiday');
    Route::post('/store_holiday', [App\Http\Controllers\Admin\HolidaysController::class, 'store'])->name('store_holiday');
    Route::get('/edit_holiday/{id}', [App\Http\Controllers\Admin\HolidaysController::class, 'edit'])->name('edit_holiday');
    Route::post('/update_holiday/{id}', [App\Http\Controllers\Admin\HolidaysController::class, 'update'])->name('update_holiday');
    Route::get('/delete_holiday/{id}', [App\Http\Controllers\Admin\HolidaysController::class, 'destroy'])->name('delete_holiday');

//Leave Management
    Route::get('/leave_management', [App\Http\Controllers\Admin\LeaveController::class, 'index'])->name('leave_management');
    Route::get('/add_leave', [App\Http\Controllers\Admin\LeaveController::class, 'create'])->name('add_leave');
    Route::post('/store_leave', [App\Http\Controllers\Admin\LeaveController::class, 'store'])->name('store_leave');
    Route::get('/edit_leave/{id}', [App\Http\Controllers\Admin\LeaveController::class, 'edit'])->name('edit_leave');
    Route::post('/update_leave/{id}', [App\Http\Controllers\Admin\LeaveController::class, 'update'])->name('update_leave');
    Route::get('/delete_leave/{id}', [App\Http\Controllers\Admin\LeaveController::class, 'destroy'])->name('delete_leave');
    
   
    
});





























































