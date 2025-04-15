<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\GoogleController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
route::get('/',[HomeController::class,'index']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

route::get('/redirect',[HomeController::class,'redirect'])->middleware(['auth'])->name('redirect');

route::get('auth/google',[GoogleController::class,'googlepage']);
route::get('auth/google/callback',[GoogleController::class,'googlecallback']);



route::get('/view_category',[AdminController::class,'view_category']);
route::post('/add_category',[AdminController::class,'add_category']);
route::get('/delete_category/{id}',[AdminController::class,'delete_category']);
route::get('/edit_category/{id}',[AdminController::class,'edit_category']);
route::post('/update_category/{id}',[AdminController::class,'update_category']);


route::get('/view_product',[AdminController::class,'view_product']);
route::post('/add_product',[AdminController::class,'add_product'])->name('add_product');
route::get('/show_product',[AdminController::class,'show_product']);
route::get('/delete_product/{id}',[AdminController::class,'delete_product']);
route::get('/update_product/{id}',[AdminController::class,'update_product']);
route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']);

route::get('create_service',[AdminController::class,'create_service'])->name('create_service');
route::post('add_service',[AdminController::class,'add_service'])->name('add_service');
route::get('/view_service',[AdminController::class,'view_service']);
route::get('/delete_service/{id}',[AdminController::class,'delete_service']);
route::get('/update_service/{id}',[AdminController::class,'update_service']);
route::post('/update_service_confirm/{id}',[AdminController::class,'update_service_confirm']);


route::get('post_page',[AdminController::class,'post_page']);
route::post('add_post',[AdminController::class,'add_post']);
route::get('show_post',[AdminController::class,'show_post']);
route::get('/delete_post/{id}',[AdminController::class,'delete_post']);
route::get('/edit_post/{id}',[AdminController::class,'edit_post']);
route::post('/update_post/{id}',[AdminController::class,'update_post']);


route::get('/bookings',[AdminController::class,'bookings']);
route::get('/approve_book/{id}',[AdminController::class,'approve_book']);
route::get('/reject_book/{id}',[AdminController::class,'reject_book']);
Route::get('/complete_booking/{id}', [AdminController::class, 'completeBooking']);



route::get('/order/{id}',[AdminController::class,'order']);

route::get('/view_order',[AdminController::class,'view_order']);

route::get('/delivered/{order_id}',[AdminController::class,'delivered']);
Route::get('/completed/{order_id}', [AdminController::class, 'completeOrder']);


route::get('/print_pdf/{order_id}',[AdminController::class,'print_pdf']);



route::get('/all_messages',[AdminController::class,'all_messages']);
route::get('/send_mail/{id}',[AdminController::class,'send_mail']);
route::post('/mail/{id}',[AdminController::class,'contact_mail']);


route::get('/customer_list',[AdminController::class,'customer_list']);

route::get('/view_user',[AdminController::class,'view_user']);
route::post('/add_user',[AdminController::class,'add_user']);

route::get('/edit_customer/{id}',[AdminController::class,'edit_customer']);
route::post('/update_customer/{id}',[AdminController::class,'update_customer']);


Route::post('confirm_delete_customer', [AdminController::class, 'confirm_delete_customer']);

Route::get('view_customer_orders/{id}', [AdminController::class, 'view_customer_orders']);



route::get('/show_role',[AdminController::class,'show_role']);

route::get('/view_acc',[AdminController::class,'view_acc']);

route::get('/edit_acc/{id}',[AdminController::class,'edit_acc']);
route::post('/update_acc/{id}',[AdminController::class,'update_acc']);

route::post('/add_acc',[AdminController::class,'add_acc']);


Route::post('confirm_delete_account', [AdminController::class, 'confirm_delete_account']);


route::get('/search_customer',[AdminController::class,'searchCustomer']);

route::get('/search_product',[AdminController::class,'searchProduct']);

route::get('/search_service',[AdminController::class,'searchService']);












route::get('/about_us',[HomeController::class,'introduce']);



route::get('/product_page',[HomeController::class,'product_page']);
route::get('/product_details/{id}',[HomeController::class,'product_details']);




route::get('/service_page',[HomeController::class,'service_page']);
route::get('/service_details/{id}',[HomeController::class,'service_details']);

route::post('/add_booking/{id}',[HomeController::class,'add_booking']);
route::get('/show_booking',[HomeController::class,'show_booking']);
route::get('/cancel_book/{id}',[HomeController::class,'cancel_book']);


route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
route::get('/show_cart',[HomeController::class,'show_cart']);
route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);




Route::controller(HomeController::class)->middleware('auth')->group(function(){
    Route::get('stripe/{final_total}', 'stripe');
    Route::post('stripe/{final_total}', 'stripePost')->name('stripe.post');
});


route::get('/show_order',[HomeController::class,'show_order']);
route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);





route::post('/add_comment',[HomeController::class,'add_comment']);
route::post('/add_reply',[HomeController::class,'add_reply']);





route::get('/search',[HomeController::class,'search']);
route::get('/cat_search/{id}',[HomeController::class,'cat_search']);






route::get('/view_post',[HomeController::class,'view_post']);
route::get('/post_details/{id}',[HomeController::class,'post_details']);


route::get('/contact',[HomeController::class,'contact']);
route::post('/contact_us',[HomeController::class,'contact_us']);


route::post('/confirm_order',[HomeController::class,'confirm_order']);




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
