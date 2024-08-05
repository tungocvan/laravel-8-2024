<?php 
 use Illuminate\Support\Facades\Route;
 use Modules\Thuoc\Http\Controllers\api\ThuocController;
 Route::middleware(['api'])->prefix('/api/thuoc')->name('api.thuoc.')->group(function(){
     Route::get('/', [ThuocController::class, 'index'])->name('index');
});
 
  