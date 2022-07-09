<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\PlatinumController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\PembelajaranController;

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

Route::get('/', [HomeController::class, "home"]);

Route::get("/login", [LoginController::class, "login"])->middleware("guest")->name("login");

Route::post("/login", [LoginController::class, "authenticate"]);

Route::get("/about", [HomeController::class, "about"]);

Route::get("/logout", [LoginController::class, "logout"])->middleware("auth");

Route::get("/class/{id}", [HomeController::class, "showKelas"]);

Route::get("/platinumm/{id}", [HomeController::class, "showPlatinum"]);

Route::resource("kelas", KelasController::class)->except("show")->middleware("auth");

Route::resource("platinum", PlatinumController::class)->except("show")->middleware("auth");

Route::resource("pertanyaan", PertanyaanController::class)->middleware("auth");

Route::resource("mentor", MentorController::class)->middleware("auth");

Route::resource("pembelajaran", PembelajaranController::class)->middleware("auth");

Route::resource("fasilitas", FasilitasController::class)->middleware("auth");

Route::get("/even", [HomeController::class, "showEvent"]);

Route::get("/even/{id}", [HomeController::class, "detailEvent"]);

Route::resource("event", EventController::class)->middleware("auth")->except("show");