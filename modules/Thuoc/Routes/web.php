<?php 
 use Illuminate\Support\Facades\Route;
 use Modules\Thuoc\Http\Controllers\ThuocController;
 use Modules\Thuoc\Models\Thuoc;

Route::middleware(['web','thuoc.middleware'])->get('/thuoc', [ThuocController::class, 'index'])->name('thuoc.index');
Route::middleware(['web'])->get('/thuoc/login', [ThuocController::class, 'login'])->name('thuoc.login');
Route::middleware(['web'])->post('/thuoc/login', [ThuocController::class, 'loginPost'])->name('thuoc.login-post');
Route::middleware(['web'])->get('/thuoc/register', [ThuocController::class, 'register'])->name('thuoc.register');
Route::middleware(['web'])->get('/thuoc/forgot', [ThuocController::class, 'forgot'])->name('thuoc.forgot');
Route::middleware(['web','thuoc.middleware'])->get('/thuoc', [ThuocController::class, 'index'])->name('thuoc.index');
Route::middleware(['web','thuoc.middleware'])->get('/thuoc/trungthau', [ThuocController::class, 'trungthau'])->name('thuoc.trungthau');
Route::middleware(['web','auth','thuoc.middleware'])->prefix('/thuoc')->name('thuoc.')->group(function(){    
    Route::get('/add', [ThuocController::class, 'add'])->name('add')->can('create',Thuoc::class);
    Route::get('/edit/Thuoc', [ThuocController::class, 'edit'])->name('edit')->can('update',Thuoc::class);
    Route::post('/delete/{id}', [ThuocController::class, 'delete'])->name('delete')->can('delete',Thuoc::class);          
    Route::get('/list', [ThuocController::class, 'list'])->name('list')->can('view',Thuoc::class);
    Route::get('/thau', [ThuocController::class, 'thau'])->name('thau')->can('view',Thuoc::class);
});

 