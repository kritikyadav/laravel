<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CustomerController;
use App\Models\Customers;
use Illuminate\Http\Request;
use App\Http\Controllers\DemoControllers;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Registration and Customer routes */

Route::get('/', function(){
    return view('demo');
});
Route::get('/register', [RegistrationController::class, 'index']);
Route::post('/register', [RegistrationController::class, 'register']);

Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::get('/customer/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
Route::get('/customer/restore/{id}', [CustomerController::class, 'restore'])->name('customer.restore');
Route::get('/customer/force_delete/{id}', [CustomerController::class, 'force_delete'])->name('customer.force_delete');
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
Route::post('/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
Route::get('/customer', [CustomerController::class, 'view'])->name('customer.view');
Route::post('/customer', [CustomerController::class, 'store']);
Route::get('/customer/trash', [CustomerController::class, 'trash'])->name('customer.trash');

Route::get('set_session', function(Request $request){
    $request->session()->put('navtitle','QuickCap');
    // $request->session()->flash('status','Success'); //one time execution then it gets unset automatically
    return redirect('get_all_session');
});
Route::get('get_all_session', function(){
    $session = session()->all();
    echo '<pre>';print_r($session);
});
Route::get('destroy_session', function(){
    session()->forget(['navtitle']);
    return redirect('get_all_session');
});


/* Now route for file upload */

Route::get('/fileupload', function(){
    return view('fileupload');
});
Route::post('/fileupload',[DemoControllers::class, 'fileupload'])->name('fileupload');
