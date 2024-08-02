<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetsController;

Route::get('/', [PetsController::class, 'index'])->name('pets.index');

Route::get('/pets/pet/{id}', [PetsController::class, 'showPetById'])->name('pets.showPetById');

Route::delete('/pets/pet/{id}', [PetsController::class, 'deletePetById'])->name('pets.deletePetById');

Route::get('/pets/pet/edit/{id}', [PetsController::class, 'editPetById'])->name('pets.editPetById');
Route::put('/pets/{id}', [PetsController::class, 'updatePet'])->name('pets.update');

Route::get('/pets/create', [PetsController::class, 'createNewPet'])->name('pets.create');
Route::post('/pets', [PetsController::class, 'store'])->name('pets.store');

Route::get('/find-pet', [PetsController::class, 'findPetsById'])->name('pets.findPetsById');