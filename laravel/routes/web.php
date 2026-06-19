<?php

use App\Http\Controllers\KeepController;
use App\Models\Nota;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/keep', [KeepController::class, 'index'])->name('keep.index');

Route::get('/keep/create', [KeepController::class, 'create'])->name('keep.create');

Route::post('/keep/create', [KeepController::class, 'create']);

Route::get('/keep/edit/{nota}', [KeepController::class, 'edit'])->name('keep.edit');

Route::put('/keep/edit/{nota}', [KeepController::class, 'edit']);

Route::get('/keep/delete/{nota}', [KeepController::class, 'delete'])->name('keep.delete');

Route::delete('/keep/delete/{nota}', [KeepController::class, 'delete']);

Route::get('/keep/trash', [KeepController::class, 'trash'])->name('keep.trash');

Route::get('/keep/trash/{nota}/restore', [KeepController::class, 'restore'])->withTrashed()->name('keep.trash.restore');

Route::get('/keep/trash/{nota}/delete', [KeepController::class, 'delete'])->withTrashed()->name('keep.trash.delete');


// Route::get('/hello', function() {
//     return 'Hello world :-)';
// });

// Route::get('/num/{n}', function($n) {
//     return 'Número: ' . $n;
// });

// Route::get('/calc/{n1}/{n2}', function($n1, $n2) {
//     return $n1 + $n2;
// });