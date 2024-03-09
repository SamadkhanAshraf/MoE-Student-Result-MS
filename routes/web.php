<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\Auth\UsersController;
use App\Http\Controllers\Admin\Auth\PermissionsController;
use App\Http\Controllers\Admin\Auth\RolesController;

use App\Http\Controllers\Admin\Localization\LocalizationController;
use App\Http\Controllers\Admin\Backup\BackupController;
use App\Http\Controllers\Admin\Setting\GeneralSettingController;
use App\Http\Controllers\Admin\Province\ProvinceController;
use App\Http\Controllers\Admin\Province\DistrictController;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\CollageController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\DepartmentController;


use App\Http\Controllers\Admin\DashboardController;


\Auth::routes();

//=================Localization Routes Start ============//
Route::get('language/{lang}', function ($lang) {
    \Session::put('locale',$lang);
    return redirect()->back();
});


// ==============Admin Side Routes Start ================//
//  Authenticated Routes
Route::group(['middleware' => ['auth', 'permission']], function() {
    Route::prefix('admin')->group(function (){
        //Dashboard Routes
        Route::get('/',[DashboardController::class,'dashboard'])->name('dashboard');

        // Localization
        Route::group(['prefix' => 'localization'], function(){
            // Lables
            Route::get('/labels',[LocalizationController::class,'labels'])->name('labels');
            Route::post('/labels/add-label',[LocalizationController::class,'addLabel'])->name('add-label');
            Route::delete('/labels/delete-label/{id}',[LocalizationController::class,'deleteLabel'])->name('delete-label');
            Route::get('/labels/edit-label/{id}',[LocalizationController::class,'editLabel'])->name('edit-label');
            Route::post('/labels/update-label',[LocalizationController::class,'updateLabel'])->name('update-label');

            //Messages
            Route::get('/messages',[LocalizationController::class,'messages'])->name('messages');
            Route::post('/messages/add-message',[LocalizationController::class,'addMessage'])->name('add-message');
            Route::delete('/messages/delete-message/{id}',[LocalizationController::class,'deleteMessage'])->name('delete-message');
            Route::get('/messages/edit-message/{id}',[LocalizationController::class,'editMessage'])->name('edit-message');
            Route::post('/messages/update-message',[LocalizationController::class,'updateMessage'])->name('update-message');
        });

        // Backup
        Route::group(['prefix' => 'Backups'], function(){
            Route::get('/all-backups',[BackupController::class,'index'])->name('all-backups');
            Route::get('/create',[BackupController::class,'create'])->name('create-backup');
            Route::get('/create',[BackupController::class,'create'])->name('create-backup');
            Route::get('/download/{file}',[BackupController::class,'download'])->name('download-backup');
            Route::delete('/delete/{file}',[BackupController::class,'delete'])->name('delete-backup');
        });

        //User Routes
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', [UsersController::class,'index'])->name('users.index');
            Route::get('/archive', [UsersController::class,'archive'])->name('users.archive');
            Route::get('/create', [UsersController::class,'create'])->name('users.create');
            Route::post('/create', [UsersController::class,'store'])->name('users.store');
            Route::get('/{user}/show', [UsersController::class,'show'])->name('users.show');
            Route::get('/{user}/edit', [UsersController::class,'edit'])->name('users.edit');
            Route::patch('/{user}/update', [UsersController::class,'update'])->name('users.update');
            Route::delete('/{user}/add-to-archive', [UsersController::class,'addToArchive'])->name('users.add-to-archive');
            Route::delete('/{user}/delete', [UsersController::class,'destroy'])->name('users.destroy');
            Route::post('/{user}/restore', [UsersController::class,'restore'])->name('users.restore');
            Route::post('/restore-all', [UsersController::class,'restoreAll'])->name('users.restore-all');
            Route::patch('/{user}/change-status', [UsersController::class,'changeStatus'])->name('users.change-status');
            Route::get('/profile', [UsersController::class,'profile'])->name('users.profile');
            Route::patch('/update-user-profile/{id}', [UsersController::class,'updateProfile'])->name('users.update-user-profile');


        });

        // Province Routes
        Route::group(['prefix'=>'provinces'],function(){
            Route::get('/',[ProvinceController::class,'index'])->name('provinces.index');
            Route::get('/create',[ProvinceController::class,'create'])->name('provinces.create');
            Route::post('/store',[ProvinceController::class,'store'])->name('provinces.store');
            Route::get('/edit/{id}',[ProvinceController::class,'edit'])->name('provinces.edit');
            Route::patch('/update/{id}',[ProvinceController::class,'update'])->name('provinces.update');
            Route::delete('/delete/{id}',[ProvinceController::class,'destroy'])->name('provinces.destroy');
            Route::get('/archive', [ProvinceController::class,'archive'])->name('provinces.archive');
            Route::delete('/{id}/add-to-archive', [ProvinceController::class,'addToArchive'])->name('provinces.add-to-archive');
            Route::post('/restore-all', [ProvinceController::class,'restoreAll'])->name('provinces.restore-all');
            Route::post('/{id}/restore', [ProvinceController::class,'restore'])->name('provinces.restore');

        });

        // Districts Routes
        Route::group(['prefix'=>'districts'],function(){
            Route::get('/',[DistrictController::class,'index'])->name('districts.index');
            Route::get('/create',[DistrictController::class,'create'])->name('districts.create');
            Route::post('/store',[DistrictController::class,'store'])->name('districts.store');
            Route::get('/edit/{id}',[DistrictController::class,'edit'])->name('districts.edit');
            Route::patch('/update/{id}',[DistrictController::class,'update'])->name('districts.update');
            Route::delete('/delete/{id}',[DistrictController::class,'destroy'])->name('districts.destroy');
            Route::get('/archive', [DistrictController::class,'archive'])->name('districts.archive');
            Route::delete('/{id}/add-to-archive', [DistrictController::class,'addToArchive'])->name('districts.add-to-archive');
            Route::post('/restore-all', [DistrictController::class,'restoreAll'])->name('districts.restore-all');
            Route::post('/{id}/restore', [DistrictController::class,'restore'])->name('districts.restore');

        });

        // school Routes

        Route::group(['prefix'=>'schools'],function(){
            Route::get('/',[SchoolController::class,'index'])->name('schools.index');
            Route::get('/create',[SchoolController::class,'create'])->name('schools.create');
            Route::post('/store',[SchoolController::class,'store'])->name('schools.store');
            Route::get('/edit/{id}',[SchoolController::class,'edit'])->name('schools.edit');
            Route::get('/show/{id}',[SchoolController::class,'show'])->name('schools.show');
            Route::patch('/update/{id}',[SchoolController::class,'update'])->name('schools.update');
            Route::delete('/delete/{id}',[SchoolController::class,'destroy'])->name('schools.destroy');
            Route::get('/archive', [SchoolController::class,'archive'])->name('schools.archive');
            Route::delete('/{id}/add-to-archive', [SchoolController::class,'addToArchive'])->name('schools.add-to-archive');
            Route::post('/restore-all', [SchoolController::class,'restoreAll'])->name('schools.restore-all');
            Route::post('/{id}/restore', [SchoolController::class,'restore'])->name('schools.restore');

        });

        // Collage Routes
        Route::resource('collages',CollageController::class);

         // Department Routes
         Route::resource('departments',DepartmentController::class);

        // Student Routes


        Route::group(['prefix'=>'students'],function(){
            Route::get('/',[StudentController::class,'index'])->name('students.index');
            Route::get('/create',[StudentController::class,'create'])->name('students.create');
            Route::post('/store',[StudentController::class,'store'])->name('students.store');
            Route::get('/edit/{id}',[StudentController::class,'edit'])->name('students.edit');
            Route::get('/show/{id}',[StudentController::class,'show'])->name('students.show');
            Route::patch('/update/{id}',[StudentController::class,'update'])->name('students.update');
            Route::delete('/delete/{id}',[StudentController::class,'destroy'])->name('students.destroy');
            Route::get('/create-student-result-sheet',[StudentController::class,'createStudentResult'])->name('students.create-student-result-sheet');
            Route::post('/store-student-result-sheet',[StudentController::class,'storeStudentResult'])->name('students.store-student-result-sheet');
            Route::get('/edit-student-result-sheet/{id}/{semester}',[StudentController::class,'editStudentResult'])->name('students.edit-student-result-sheet');
            Route::patch('/update-student-result-sheet/{id}',[StudentController::class,'updateStudentResult'])->name('students.update-student-result-sheet');
            Route::get('/search-students',[StudentController::class,'searchStudents'])->name('students.search');


        });

         //Setting Routes
         Route::group(['prefix' => 'setting'], function() {
            Route::get('/', [GeneralSettingController::class,'showSetting'])->name('setting.show');
            Route::post('/update/{id}', [GeneralSettingController::class,'updateSetting'])->name('setting.update');

        });

        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);

        //Logout Routes
        Route::get('/logout',[LogoutController::class,'perform'])->name('logout.perform');
        Route::get('/screen-locked',[LogoutController::class,'lockScreen'])->name('logout.lock-screen');
    });

});

// Ajax Routes
Route::get('/get-districts/{id}',[DistrictController::class,'getDistrict']);
Route::get('/get-collages/{id}',[CollageController::class,'getCollage']);
Route::get('/get-departments/{id}',[CollageController::class,'getDepartments']);
Route::get('/get-students/{year}/{province}/{collage}/{department}',[StudentController::class,'getStudents']);

// ==============Admin Side Routes End ================//


//----------------------------------------------------------------------------------------------//


// ====== Clients Side Routes Start ================//
Route::group(['middleware' => ['guest']], function() {
    // Login Routes
    Route::get('/login', [LoginController::class,'show'])->name('login.show');
    Route::post('/login', [LoginController::class,'login'])->name('login.perform');


    // Website Routes
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });
});
// ====== Clients Side Routes End ================//


// to create permission
//php artisan permission:create-permission-routes
