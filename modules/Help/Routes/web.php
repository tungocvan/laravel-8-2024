<?php 
 use Illuminate\Support\Facades\Route;
 use Modules\Help\Http\Controllers\HelpController;
 use Modules\Help\Models\Help;
Route::middleware(['web','auth','help.middleware'])->prefix('/help')->name('help.')->group(function(){
    Route::get('/', [HelpController::class, 'index'])->name('index')->can('view',Help::class);
    Route::get('/backup', [HelpController::class, 'backup'])->name('backup')->can('view',Help::class);
    Route::get('/add', [HelpController::class, 'add'])->name('add')->can('create',Help::class);
    Route::get('/edit/Help', [HelpController::class, 'edit'])->name('edit')->can('update',Help::class);
    Route::post('/delete/{id}', [HelpController::class, 'delete'])->name('delete')->can('delete',Help::class);     
});

 