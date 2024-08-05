<?php 
 use Illuminate\Support\Facades\Route;
 use Modules\Help\Http\Controllers\api\HelpController;
 Route::middleware(['api'])->prefix('/api/help')->name('api.help.')->group(function(){
     Route::get('/', [HelpController::class, 'index'])->name('index');
});
 
  