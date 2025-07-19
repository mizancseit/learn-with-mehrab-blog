<?php

use Illuminate\Support\Facades\Route;


/**************************************************
 * Start Front End Route
 ****************************************************/

Route::get('register',[\App\Http\Controllers\Template\AuthController::class,'register'])->name('register');
Route::post('register',[\App\Http\Controllers\Template\AuthController::class,'registerSubmit'])->name('register.submit');


Route::get('/',function (){
    return view('welcome');
});

/**************************************************
 * End Front End Route
 ****************************************************/





/**************************************************
 * Start Back End Route
 ****************************************************/
Route::get("admin-login",[\App\Http\Controllers\AdminAuthController::class,'login'])->name('admin.login');
Route::post("admin-login",[\App\Http\Controllers\AdminAuthController::class,'loginSubmit'])->name('admin.login.submit');
Route::prefix('admin')->middleware('auth:admin')->group(function (){

    Route::get('dashboard',[\App\Http\Controllers\BackEnd\Dashboard\DashboardController::class,'index']);

    Route::get('profile/{user_id}',[\App\Http\Controllers\ProfileController::class,'profile'])->name('profile');
    //Route::get('notifications/{user_id}',[\App\Http\Controllers\NotificationController::class,'index'])->name('notifications');

    Route::get('activity-logs',[\App\Http\Controllers\ActivityLogController::class,'index'])->name('activity.log');
    Route::get('activity-log-details/{id}',[\App\Http\Controllers\ActivityLogController::class,'details'])->name('activity.log.show');

    Route::post('change-password',[\App\Http\Controllers\BackEnd\Dashboard\DashboardController::class,'changePassword']);
    //Route::get('logout',[\App\Http\Controllers\ClientEnd\DashboardController::class,'logout'])->name('logout');

    //Route::resource('gallery-types','\App\Http\Controllers\Gallery\GalleryTypeController');


    //Staff Groups
    Route::resource('staff-groups','\App\Http\Controllers\BackEnd\UserManagement\GroupController');
    Route::resource('staffs','\App\Http\Controllers\BackEnd\UserManagement\StaffController');
    Route::post('staff-permission/{user_id}',[\App\Http\Controllers\BackEnd\UserManagement\StaffController::class,'permissionEditSubmit'])->name('permission.edit.submit');


    //About Company routes
    Route::resource('about-companies','\App\Http\Controllers\BackEnd\AboutCompanyController')
        ->only('edit','update');

   // Route::resource('teams','\App\Http\Controllers\BackEnd\TeamController');


    /****** new route *****************/
    Route::resource('blog-categories','\App\Http\Controllers\BackEnd\Blog\BlogCategoryController');
    Route::resource('blog-posts','\App\Http\Controllers\BackEnd\Blog\BlogPostController');
   // Route::resource('blog-tags','\App\Http\Controllers\BackEnd\Blog\BlogTagController');


});

/**************************************************
 * End Back End Route
 ****************************************************/
