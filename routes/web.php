<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'),'verified'])->group(function () {
//     Route::get('/admin/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });



Route::middleware(['auth:sanctum,web','verified'])->get('/dashboard', function () {

    return view('dashboard');
    
})->name('dashboard');

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function(){

    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');

});

Route::middleware(['auth:admin'])->group(function(){

    Route::middleware(['auth:sanctum,admin','verified'])->get('/admin/dashboard', function () {
        return view('dashboard');
    })->name('admin.dashboard');

    // check admin roles
    Route::get('/redirects', [HomeController::class, 'index'])->name('check-admin');

    // Admin Profile
    Route::get('/admin-profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/admin-profile-edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin-profile-store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
    
    // Admin logout
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

    // Branch
    Route::prefix('branch')->group(function(){
        Route::get('/view', [BranchController::class, 'branch_view'])->name('branch.view');
        Route::post('/insert', [BranchController::class, 'store'])->name('branch.store');
        Route::get('/edit/{id}', [BranchController::class, 'edit'])->name('branch.edit');
        Route::post('/update/{id}', [BranchController::class, 'update'])->name('branch.update');
        Route::get('/delete/{id}', [BranchController::class, 'delete'])->name('branch.delete');
    });

    // Condition
    Route::prefix('condition')->group(function(){
        Route::get('/view', [ConditionController::class, 'view'])->name('condition.view');
        Route::post('/insert', [ConditionController::class, 'store'])->name('condition.store');
        Route::get('/edit/{id}', [ConditionController::class, 'edit'])->name('condition.edit');
        Route::post('/update/{id}', [ConditionController::class, 'update'])->name('condition.update');
        Route::get('/delete/{id}', [ConditionController::class, 'delete'])->name('condition.delete');
    });

    // Category
    Route::prefix('category')->group(function(){
        Route::get('/view', [CategoryController::class, 'view'])->name('category.view');
        Route::post('/insert', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    });

    // Fee weight
    Route::prefix('fee')->group(function(){
        Route::get('/view', [FeeController::class, 'view'])->name('fee.view');
        Route::post('/insert', [FeeController::class, 'store'])->name('fee.store');
        Route::get('/edit/{id}', [FeeController::class, 'edit'])->name('fee.edit');
        Route::post('/update/{id}', [FeeController::class, 'update'])->name('fee.update');
        Route::get('/delete/{id}', [FeeController::class, 'delete'])->name('fee.delete');
    });

    // Fee Cm
    Route::prefix('cm')->group(function(){
        Route::get('/view', [FeeController::class, 'view2'])->name('cm.view');
        Route::post('/insert', [FeeController::class, 'store2'])->name('cm.store');
        Route::get('/edit/{id}', [FeeController::class, 'edit2'])->name('cm.edit');
        Route::post('/update/{id}', [FeeController::class, 'update2'])->name('cm.update');
        Route::get('/delete/{id}', [FeeController::class, 'delete2'])->name('cm.delete');
    });

    // Order
    Route::prefix('order')->group(function(){
        Route::get('/branch1', [OrderController::class, 'branch1'])->name('branch1.view');
        Route::get('/branch2', [OrderController::class, 'branch2'])->name('branch2.view');
        Route::get('/branch3', [OrderController::class, 'branch3'])->name('branch3.view');

        // pending 
        Route::get('/pending1', [OrderController::class, 'pending1'])->name('pending1.view');
        Route::get('/pending2', [OrderController::class, 'pending2'])->name('pending2.view');
        Route::get('/pending3', [OrderController::class, 'pending3'])->name('pending3.view');

        // pending for sub Admin Branch 
        Route::get('/pending/admin1', [OrderController::class, 'PendingAdmin1'])->name('PendingAdmin1');
        Route::get('/pending/admin2', [OrderController::class, 'PendingAdmin2'])->name('PendingAdmin2');

        // confirmed
        Route::get('/confirmed1', [OrderController::class, 'confirmed1'])->name('confirmed1.view');
        Route::get('/confirmed2', [OrderController::class, 'confirmed2'])->name('confirmed2.view');
        Route::get('/confirmed3', [OrderController::class, 'confirmed3'])->name('confirmed3.view');

        // confirmed for Sub Admin Branch
        Route::get('/confirmed/admin1', [OrderController::class, 'ConfirmedAdmin1'])->name('ConfirmedAdmin1');
        Route::get('/confirmed/admin2', [OrderController::class, 'ConfirmedAdmin2'])->name('ConfirmedAdmin2');

        // processing
        Route::get('/processing1', [OrderController::class, 'processing1'])->name('processing1.view');
        Route::get('/processing2', [OrderController::class, 'processing2'])->name('processing2.view');
        Route::get('/processing3', [OrderController::class, 'processing3'])->name('processing3.view');

        // processing for Sub Admin Branch 
        Route::get('/processing/admin1', [OrderController::class, 'ProcessingAdmin1'])->name('ProcessingAdmin1');
        Route::get('/processing/admin2', [OrderController::class, 'ProcessingAdmin2'])->name('ProcessingAdmin2');

        // arrived
        Route::get('/arrived1', [OrderController::class, 'arrived1'])->name('arrived1.view');
        Route::get('/arrived2', [OrderController::class, 'arrived2'])->name('arrived2.view');
        Route::get('/arrived3', [OrderController::class, 'arrived3'])->name('arrived3.view');

        // Arrived for Sub Admin Branch
        Route::get('/arrived/admin1', [OrderController::class, 'ArrivedAdmin1'])->name('ArrivedAdmin1');
        Route::get('/arrived/admin2', [OrderController::class, 'ArrivedAdmin2'])->name('ArrivedAdmin2');

        // picked 
        Route::get('/picked1', [OrderController::class, 'picked1'])->name('picked1.view');
        Route::get('/picked2', [OrderController::class, 'picked2'])->name('picked2.view');
        Route::get('/picked3', [OrderController::class, 'picked3'])->name('picked3.view');

        // picked for Sub Admin Branch 
        Route::get('/picked/admin1', [OrderController::class, 'PickedAdmin1'])->name('PickedAdmin1');
        Route::get('/picked/admin2', [OrderController::class, 'PickedAdmin2'])->name('PickedAdmin2');

        // Update Status Pending To Confirmed
        Route::get('/status/comfirmed/{id}', [OrderController::class, 'pendingToConfirmed'])->name('pendingToConfirmed');
        Route::get('/status/comfirmed1/{id}', [OrderController::class, 'pendingToConfirmed1'])->name('pendingToConfirmed1');
        Route::get('/status/comfirmed2/{id}', [OrderController::class, 'pendingToConfirmed2'])->name('pendingToConfirmed2');

        // Update Status Confirmed To Processing
        Route::get('/status/processing/{id}', [OrderController::class, 'ConfirmedToProcessing'])->name('ConfirmedToProcessing');
        Route::get('/status/processing1/{id}', [OrderController::class, 'ConfirmedToProcessing1'])->name('ConfirmedToProcessing1');
        Route::get('/status/processing2/{id}', [OrderController::class, 'ConfirmedToProcessing2'])->name('ConfirmedToProcessing2');

        // Update Status Processing To Arrived
        Route::get('/status/arrived/{id}', [OrderController::class, 'ProcessingToArrived'])->name('ProcessingToArrived');
        Route::get('/status/arrived1/{id}', [OrderController::class, 'ProcessingToArrived1'])->name('ProcessingToArrived1');
        Route::get('/status/arrived2/{id}', [OrderController::class, 'ProcessingToArrived2'])->name('ProcessingToArrived2');

        // Update Status Processing To Arrived
        Route::get('/status/picked/{id}', [OrderController::class, 'ArrivedToPicked'])->name('ArrivedToPicked');
        Route::get('/status/picked1/{id}', [OrderController::class, 'ArrivedToPicked1'])->name('ArrivedToPicked1');
        Route::get('/status/picked2/{id}', [OrderController::class, 'ArrivedToPicked2'])->name('ArrivedToPicked2');

        // Detail && Detail for sub Admin
        Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('detail');
        Route::get('/detail-sub/{id}', [OrderController::class, 'sub_detail'])->name('sub_detail');
        Route::get('/detail-sub2/{id}', [OrderController::class, 'sub_detail2'])->name('sub_detail2');
    });
});
