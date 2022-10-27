<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PortfolioController;
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

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
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
    Route::post('/education-info', [ResumeController::class, 'addEducation'])->name('resume.addEducation');
    Route::match(['put', 'patch'], '/education-info/{id}', [ResumeController::class, 'editEducation'])->name('resume.editEducation');
    Route::post('/ability', [ResumeController::class, 'addAbility'])->name('resume.addAbility');
    Route::match(['put', 'patch'], '/ability/{id}', [ResumeController::class, 'editAbility'])->name('resume.editAbility');
    Route::post('/languages', [ResumeController::class, 'addLanguage'])->name('resume.addLanguage');
    Route::match(['put', 'patch'], '/languages/{id}', [ResumeController::class, 'editLanguage'])->name('resume.editLanguage');

    Route::resource('/portfolio', PortfolioController::class);
    Route::post('/manage-portfolio', [PortfolioController::class, 'addPortfolio'])->name('portfolio.addPortfolio');
    Route::match(['put', 'patch'], '/manage-portfolio/{id}', [PortfolioController::class, 'editPortfolio'])->name('portfolio.editPortfolio');
    Route::delete('/manage-portfolio/{id}', [PortfolioController::class, 'deletePortfolio'])->name('portfolio.deletePortfolio');
});

Route::resource('/', publicController::class);
