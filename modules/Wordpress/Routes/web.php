<?php 
 use Illuminate\Support\Facades\Route;
 use Modules\Wordpress\Http\Controllers\WordpressController;
 use Modules\Wordpress\Models\Wordpress;
Route::middleware(['web','auth','wordpress.middleware'])->prefix('/wordpress')->name('wordpress.')->group(function(){
    Route::get('/', [WordpressController::class, 'index'])->name('index')->can('view',Wordpress::class);
    Route::get('/add', [WordpressController::class, 'add'])->name('add')->can('create',Wordpress::class);
    Route::get('/edit/Wordpress', [WordpressController::class, 'edit'])->name('edit')->can('update',Wordpress::class);
    Route::post('/delete/{id}', [WordpressController::class, 'delete'])->name('delete')->can('delete',Wordpress::class);     
    Route::get('/list', [WordpressController::class, 'list'])->name('list')->can('view',Wordpress::class);
});

 