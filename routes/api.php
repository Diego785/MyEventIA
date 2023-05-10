<?php

use App\Http\Controllers\Api\PhotosController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Livewire\Photographer\EventSelected;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//------------------------------------------------------ USERS ----------------------------------------------------------------------------------//
Route::get('/users', [GuestController::class, 'index'])->name('users');
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    $user->tokens()->where('name', $request->device_name)->delete();

    return $user->createToken($request->device_name)->plainTextToken;
});

Route::middleware(['auth:sanctum'])->get('/user/revoke', function (Request $request) {
    $user = $request->user();
    $user->tokens()->delete();
    return "The tokens have been deleted";
})->name('login.revoke');
//-----------------------------------------------------------------------------------------------------------------------------------------------//

//PHOTOS
Route::post('/photos', [PhotosController::class, 'show_photos'] )->name('show_photos_event');    
Route::post('/profiles', [PhotosController::class, 'show_profile_photos'] )->name('show_profile_photos');    
Route::post('/events', [PhotosController::class, 'show_events'] )->name('show_event');    
Route::post('/upload_photos', [PhotosController::class, 'get_profile_photo'] )->name('save_photo');    
Route::post('/guests_event', [PhotosController::class, 'testing_guests_photos'] )->name('guests.photos');    
// Route::get('/guests', [PhotosController::class, 'show_guests'] )->name('show_event');
// Hacer una consulta con el id del usuario logueado en mòvil más el user_id del inivitado registrado, para traer su foto.    