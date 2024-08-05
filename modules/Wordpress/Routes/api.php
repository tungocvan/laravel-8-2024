<?php 
 use Illuminate\Support\Facades\Route;
 use Modules\Wordpress\Http\Controllers\api\WordpressController;
 Route::middleware(['api'])->prefix('/api/wordpress')->name('api.wordpress.')->group(function(){
     Route::get('/', [WordpressController::class, 'index'])->name('index');
     Route::get('/get-user', [WordpressController::class, 'getUser'])->name('get-user');
     Route::post('/login', [WordpressController::class, 'login'])->name('login');
     Route::post('/register', [WordpressController::class, 'register'])->name('register');
});
 
  