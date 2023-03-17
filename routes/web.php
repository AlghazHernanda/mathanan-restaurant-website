<?php

use App\Http\Livewire\CartComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\MenuComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Admin\AdminAddMenuComponent;
use App\Http\Livewire\Admin\AdminMenuComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeComponent::class)->name('home.index');
Route::get('/menu', MenuComponent::class)->name('menu');
Route::get('/cart', CartComponent::class)->name('menu.cart');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'authadmin'])->group(function () {
    Route::get('/admin/menus', AdminMenuComponent::class)->name('admin.menus');
    Route::get('/admin/menu/add', AdminAddMenuComponent::class)->name('admin.menu.add');
    Route::get('/admin/menu/edit/{menu_id}', AdminEditMenuComponent::class)->name('admin.menu.edit');
});


require __DIR__ . '/auth.php';
