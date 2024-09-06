<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ChecklistItemController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function(){
    Route::apiResource('checklist', ChecklistController::class);
    

    Route::get('/checklist/{checklistid}/item', [ChecklistItemController::class, 'index'])->name('checklistItem.index');
    Route::post('/checklist/{checklistid}/item', [ChecklistItemController::class, 'store'])->name('checklistItem.store');
    Route::get('/checklist/{checklistid}/item/{checklistItemId?}', [ChecklistItemController::class, 'show'])->name('checklistItem.show');
    Route::put('/checklist/{checklistid}/item/{checklistItemId?}', [ChecklistItemController::class, 'update'])->name('checklistItem.update');
    Route::put('/checklist/{checklistid}/item/rename/{checklistItemId?}', [ChecklistItemController::class, 'update'])->name('checklistItem.rename');
    Route::delete('/checklist/{checklistid}/item/{checklistItemId?}', [ChecklistItemController::class, 'destroy'])->name('checklistItem.destroy');
});

