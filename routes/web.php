<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ResumeController;
use App\Http\Controllers\publicController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/intro', MainController::class);
    Route::post('/intro-skill', [MainController::class, 'addSkill'])->name('intro.addSkill');
    Route::match(['put', 'patch'], '/edit-skill/{id}', [MainController::class, 'editSkill'])->name('intro.editSkill');
    Route::delete('/intro-skill/{id}', [MainController::class, 'deleteSkill'])->name('intro.deleteSkill');

    Route::post('/intro-sosmed', [MainController::class, 'addSosmed'])->name('intro.addSosmed');
    Route::match(['put', 'patch'], '/intro-sosmed/{id}', [MainController::class, 'editSosmed'])->name('intro.editSosmed');
    Route::delete('/intro-sosmed/{id}', [MainController::class, 'deleteSosmed'])->name('deleteSosmed');


    Route::resource('/about', AboutController::class);
    Route::post('/personal-info', [AboutController::class, 'addPersonalInfo'])->name('about.addPersonalInfo');
    Route::match(['put', 'patch'], '/personal-info/{id}', [AboutController::class, 'editPersonalinfo'])->name('about.editPersonalInfo');
    Route::post('/expertise-info', [AboutController::class, 'addExpertise'])->name('about.addExpertise');
    Route::match(['put', 'patch'], '/expertise-info/{id}', [AboutController::class, 'editExpertise'])->name('about.editExpertise');


    Route::resource('/resume', ResumeController::class);
});

Route::resource('/', publicController::class);
