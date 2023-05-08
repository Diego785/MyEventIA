<?php

use App\Http\Controllers\Organizer\OrganizerEventsController;
use App\Http\Controllers\Photographer\MyEventsController;
use App\Http\Controllers\System\RegisterController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//-------------------- MY ROUTES ------------------------//
// Route::get('/', function () {
//     return view('my-views.testing.testing-menu');
// })->name('testing-menu');
// Route::get('/main-layout', function () {
//     return view('layouts.my-layouts.main-layout');
// })->name('testing-main-layout');



//SYSTEM
Route::get('/registering', [RegisterController::class, 'select_register'])->name('registering');
Route::get('/registering-time', [RegisterController::class, 'registering_time'])->name('registering.time');
Route::get('/registering-photographer/{amount}', [RegisterController::class, 'registering_photographer'])->name('registering.photographer');
Route::get('/registering-organizer', [RegisterController::class, 'registering_organizer'])->name('registering.organizer');
Route::get('/my-login', [RegisterController::class, 'login'])->name('my_login');

//MAIN

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/eventos', [MyEventsController::class, 'eventos'])->name('events');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/show-requests', [MyEventsController::class, 'requests'])->name('requests');



//PHOTOGRAPHER
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/photographer-event/{event}', [MyEventsController::class, 'event_selected'])->name('photographer.event-selected');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->post('/upload-photo', [MyEventsController::class, 'upload_photo'])->name('upload-photo');


//ORGANIZER
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/photographers', [OrganizerEventsController::class, 'photographers'])->name('organizer.photographers');


//TESTING VIEWS
Route::get('/testing-payment-view', [RegisterController::class, 'testing_payment_view'])->name('testing.payment-view');
Route::get('/testing-qr', [RegisterController::class, 'testing_qr'])->name('testing.qr');


//TESTING PYTHON
Route::get('/testing-ia', [MyEventsController::class, 'python'])->name('python.ia');
Route::get('/testing-bd-py', [MyEventsController::class, 'python_bd'])->name('python.bd');
Route::get('/testing-imgs-py', [MyEventsController::class, 'python_imgs'])->name('python.imgs');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->post('/testing-screen', function () {
//     return view('my-views.testing.testing-screen');
// })->name('testing-screen');
