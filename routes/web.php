<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Email;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Crud_Laravel;
use App\Http\Controllers\Wizard;
use App\Http\Controllers\DateWiseData;
use App\Http\Controllers\TaskAddController;

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

// Route::get('/sendmail',[App\Http\Controllers\Email::class, 'index']);
// Route::post('/sendmail',[App\Http\Controllers\Email::class, 'sendmail']);

Route::get('/ajax',[App\Http\Controllers\AjaxController::class, 'index']);
Route::post('/ajax',[App\Http\Controllers\AjaxController::class, 'store'])->name('projects.store');
Route::get('/edit',[App\Http\Controllers\AjaxController::class, 'Edit'])->name('projects.edit');
Route::post('/edit',[App\Http\Controllers\AjaxController::class, 'EditData'])->name('projects.update');
// Route::get('/delete',[App\Http\Controllers\AjaxController::class, 'Delete']);
Route::get('/delete/{id}',[App\Http\Controllers\AjaxController::class, 'DeleteData'])->name('projects.delete');

// Mail
Route::get('/MailSend', [Email::class, 'index']);
Route::post('/MailSend_Data', [Email::class, 'MailSend']);
// Route::post('/MailSend', [Email::class, 'MailSend'])->name('laravel.mailsend');

// Crud
Route::get('/Crud', [Crud_Laravel::class, 'index']);
// Route::get('/Create', [Crud_Laravel::class, 'Create']);
Route::post('/Crud_AA', [Crud_Laravel::class, 'Insert_Data'])->name('products.index');
Route::get('/Show', [Crud_Laravel::class, 'Show']);
Route::get('/Edit', [Crud_Laravel::class, 'Edit'])->name('products.edit');

// Wizard
Route::get('/Wizard', [Wizard::class, 'index']);
Route::post('/Wizard', [Wizard::class, 'DataInsert']);
// Route::post('/NameData', [Wizard::class, 'NameData'])->name('NameData');
Route::post('/NameData', [Wizard::class, 'NameData'])->name('NameData');


Route::get('/DownloadPDF/{name}', [Wizard::class, 'DownloadPDF'])->name('DownloadPDF');
// Route::get('/Edit', [Wizard::class, 'Edit']);
Route::get('/Edit/{name}', [Wizard::class, 'Edit']);
// Route::post('/data/{id}', [PdfImportController::class, 'update'])->name('DownloadPDF');

// For Table
Route::get('/Data',[DateWiseData::class,'index']);
Route::post('/Data',[DateWiseData::class, 'getData'])->name('Data');

// TaskAddController
Route::get('/addData',[TaskAddController::class,'index']);
Route::post('/addData',[TaskAddController::class,'addTask'])->name('addData');
Route::post('/NameData', [Wizard::class, 'NameData'])->name('NameData');


