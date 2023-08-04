<?php

use App\Http\Controllers\CobaController;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\MenuComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Controllers\OrderController;
use App\Http\Livewire\Admin\AdminAddAdmin;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Admin\AdminMenuComponent;
use App\Http\Livewire\Admin\AdminAddMenuComponent;
use App\Http\Livewire\Admin\AdminMessageComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminEditMenuComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;

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
Route::get('/contact', ContactComponent::class)->name('contact');

Route::get('/coba', [CobaController::class, 'coba_order']);

//route untuk pembayaran, harus post karena data nya gaboleh dikirim lewat url atau GET
Route::post('/checkoutget', [OrderController::class, 'checkout'])->name('checkout');
//memanggil fungsi secara hidden dihalaman checkout
Route::post('/checkout', [OrderController::class, 'payment_post']);

Route::get('/menu/{slug}', DetailsComponent::class)->name('menu.details');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

//verified berguna untuk verifikasi email
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// route untuk admin dan sudah dilindungin oleh middleware, authadmin dibuat manual
Route::middleware(['auth', 'authadmin'])->group(function () {
    // kalo pake /admin, logo image di navbar tidak muncul
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/message', AdminMessageComponent::class)->name('admin.message');
    Route::get('/admin/addadmin', AdminAddAdmin::class)->name('admin.addadmin');

    Route::get('/admin/menus', AdminMenuComponent::class)->name('admin.menus');
    Route::get('/admin/menu/add', AdminAddMenuComponent::class)->name('admin.menu.add');
    Route::get('/admin/menu/edit/{menu_id}', AdminEditMenuComponent::class)->name('admin.menu.edit');
});


require __DIR__ . '/auth.php';
