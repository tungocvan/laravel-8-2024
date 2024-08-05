<?php 
 use Illuminate\Support\Facades\Route;
 use Modules\Menu\Http\Controllers\api\MenuController;
 Route::middleware(['api'])->prefix('/api/menu')->name('api.menu.')->group(function(){
     Route::get('/', [MenuController::class, 'index'])->name('index');
});
 
  