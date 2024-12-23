<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\EditorController;
use App\Http\Controllers\User\TemplateController;
use App\Http\Controllers\Admin\AddtempController;
use App\Http\Controllers\User\SettingsController;
use App\Http\Controllers\User\UserManagementController;
use App\Http\Controllers\User\HelpController;
use App\Http\Controllers\Admin\AdminController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/business', function () {
    return view('template-view.business');
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/ai', function () {
    return view('help.ai');
});
Route::get('/email ', function () {
    return view('help.email');
});
Route::get('/landfy', function () {
    return view('help.landfy');
});
Route::get('/page', function () {
    return view('help.page');
});
Route::get('/plan', function () {
    return view('help.plan');
});
Route::get('/domain', function () {
    return view('help.domain');
});
Route::get('/tech', function () {
    return view('technology.tech');
});

//sementara
Route::get('/template', [DashboardController::class, 'template_index']);
Route::get('/template/{id}', [DashboardController::class, 'template_show']);

Route::get('/landify/{id}/{slug}', [EditorController::class, 'publish'])->name('page.publish');

// Rute autentikasi Laravel, termasuk reset password
Auth::routes(['verify' => true]);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute untuk login dengan Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Rute untuk auth jadi hanya bisa diakses jika login
Route::group(['middleware' => ['auth']], function () {
    Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update', [UserController::class, 'update'])->name('user.update');
});

// Rute untuk admin dengan middleware auth dan role admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
    
    //ACOOUNT USER MANAGE
    Route::get('/admin/user', [AdminController::class, 'user_index'])->name('admin.user');
    Route::get('/admin/user/edit/{id}', [AdminController::class, 'user_edit'])->name('admin.edit_user');
    Route::put('/admin/user/update/{id}', [AdminController::class, 'user_update'])->name('admin.update_user');
    Route::delete('/admin/user/delete/{id}', [AdminController::class, 'user_delete'])->name('admin.delete_user');

    //ADD TEMPLATES
    Route::get('/add-temp', [AddtempController::class, 'index'])->name('admin.add-temp');
    Route::get('/preview/{id}', [AddtempController::class, 'show']);
    Route::resource('/temp',AddtempController::class);
    Route::get('/page-builder', function () {
        return view('page-builder.index');
    });

});

// Rute untuk user dengan middleware auth dan role user
Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('user.index');
    Route::get('/users', [UserManagementController::class, 'index'])->name('user.users');
    
    //TEMPLATES
    Route::get('/templates', [TemplateController::class, 'index'])->name('user.templates');
    Route::get('/templates/{id}', [TemplateController::class, 'show'])->name('detail.templates');
    Route::get('/template-preview/{id}', [TemplateController::class, 'preview']);
    Route::get('/temp-use/{id}', [TemplateController::class, 'use']);
    Route::post('/temp-use/{id}', [TemplateController::class, 'store'])->name('temp-use.create');

    //EDITOR
    Route::get('/editor', [EditorController::class, 'index'])->name('user.editor');
    Route::get('/page-preview/{id}', [EditorController::class, 'preview'])->name('page.preview');
    
    Route::resource('/pages',EditorController::class);

    Route::get('/pages-edit_site/{id}', [EditorController::class, 'edit'])->name('user.edit_site');
    Route::get('/pages-edit_page/{id}', [EditorController::class, 'show'])->name('user.edit_page');

    Route::get('/page-builder', function () {
        return view('page-builder.index');
    });
    Route::get('/pages/time-filter', [EditorController::class, 'timeindex'])->name('pages.timeindex');
    
    //SETTING
    Route::get('setting/index', [SettingsController::class, 'index'])->name('user.setting.index');
    Route::get('/portfolio', [SettingsController::class, 'portfolio'])->name('user.setting.porfolio');
    
    //SEO
    Route::get('setting/seo/index', [SettingsController::class, 'SEOindex'])->name('user.setting.seo.index');
    
    //DOMAIN
    Route::get('/index', [SettingsController::class, 'DOMAINindex'])->name('user.setting.domain.index');
    Route::get('/marketing', [SettingsController::class, 'marketing'])->name('user.setting.domain.marketing');
    Route::get('/google', [SettingsController::class, 'google'])->name('user.setting.domain.google');

    //HELP
    Route::get('/helpcenter/index', [HelpController::class, 'index'])->name('user.helpcenter.index');
    Route::get('/getting/index', [HelpController::class, 'getting'])->name('user.helpcenter.getting.index');


});
