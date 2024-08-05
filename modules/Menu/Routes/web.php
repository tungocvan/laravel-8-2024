<?php 
 use Illuminate\Support\Facades\Route;
 use Modules\Menu\Http\Controllers\MenuController;
 use Modules\Menu\Models\Menu;
Route::middleware(['web','auth','menu.middleware'])->prefix('/menu')->name('menu.')->group(function(){
    Route::get('/', [MenuController::class, 'index'])->name('index')->can('view',Menu::class);
    Route::get('/add', [MenuController::class, 'add'])->name('add')->can('create',Menu::class);
    Route::post('/add', [MenuController::class, 'menuAdd'])->name('menu-add');
    Route::get('/edit/Menu', [MenuController::class, 'edit'])->name('edit')->can('update',Menu::class);
    Route::post('/delete', [MenuController::class, 'delete'])->name('delete')->can('delete',Menu::class);     
});

 