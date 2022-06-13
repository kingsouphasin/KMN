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

Route::group(['middleware' => 'prevent-back-history'],function(){
  


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
            Route::get('/pending/admin3', [OrderController::class, 'PendingAdmin3'])->name('PendingAdmin3');

            // confirmed
            Route::get('/confirmed1', [OrderController::class, 'confirmed1'])->name('confirmed1.view');
            Route::get('/confirmed2', [OrderController::class, 'confirmed2'])->name('confirmed2.view');
            Route::get('/confirmed3', [OrderController::class, 'confirmed3'])->name('confirmed3.view');

            // confirmed for Sub Admin Branch
            Route::get('/confirmed/admin1', [OrderController::class, 'ConfirmedAdmin1'])->name('ConfirmedAdmin1');
            Route::get('/confirmed/admin2', [OrderController::class, 'ConfirmedAdmin2'])->name('ConfirmedAdmin2');
            Route::get('/confirmed/admin3', [OrderController::class, 'ConfirmedAdmin3'])->name('ConfirmedAdmin3');

            // processing
            Route::get('/processing1', [OrderController::class, 'processing1'])->name('processing1.view');
            Route::get('/processing2', [OrderController::class, 'processing2'])->name('processing2.view');
            Route::get('/processing3', [OrderController::class, 'processing3'])->name('processing3.view');

            // processing for Sub Admin Branch 
            Route::get('/processing/admin1', [OrderController::class, 'ProcessingAdmin1'])->name('ProcessingAdmin1');
            Route::get('/processing/admin2', [OrderController::class, 'ProcessingAdmin2'])->name('ProcessingAdmin2');
            Route::get('/processing/admin3', [OrderController::class, 'ProcessingAdmin3'])->name('ProcessingAdmin3');

            // arrived
            Route::get('/arrived1', [OrderController::class, 'arrived1'])->name('arrived1.view');
            Route::get('/arrived2', [OrderController::class, 'arrived2'])->name('arrived2.view');
            Route::get('/arrived3', [OrderController::class, 'arrived3'])->name('arrived3.view');

            // Arrived for Sub Admin Branch
            Route::get('/arrived/admin1', [OrderController::class, 'ArrivedAdmin1'])->name('ArrivedAdmin1');
            Route::get('/arrived/admin2', [OrderController::class, 'ArrivedAdmin2'])->name('ArrivedAdmin2');
            Route::get('/arrived/admin3', [OrderController::class, 'ArrivedAdmin3'])->name('ArrivedAdmin3');

            // picked 
            Route::get('/picked1', [OrderController::class, 'picked1'])->name('picked1.view');
            Route::get('/picked2', [OrderController::class, 'picked2'])->name('picked2.view');
            Route::get('/picked3', [OrderController::class, 'picked3'])->name('picked3.view');

            // picked for Sub Admin Branch 
            Route::get('/picked/admin1', [OrderController::class, 'PickedAdmin1'])->name('PickedAdmin1');
            Route::get('/picked/admin2', [OrderController::class, 'PickedAdmin2'])->name('PickedAdmin2');
            Route::get('/picked/admin3', [OrderController::class, 'PickedAdmin3'])->name('PickedAdmin3');

            // Update Status Pending To Confirmed
            Route::get('/status/comfirmed/branch1/{id}', [OrderController::class, 'pendingToConfirmed_branch1'])->name('pendingToConfirmed_branch1');
            Route::get('/status/comfirmed/branch2/{id}', [OrderController::class, 'pendingToConfirmed_branch2'])->name('pendingToConfirmed_branch2');
            Route::get('/status/comfirmed/branch3/{id}', [OrderController::class, 'pendingToConfirmed_branch3'])->name('pendingToConfirmed_branch3');
            Route::get('/status/comfirmed1/{id}', [OrderController::class, 'pendingToConfirmed1'])->name('pendingToConfirmed1');
            Route::get('/status/comfirmed2/{id}', [OrderController::class, 'pendingToConfirmed2'])->name('pendingToConfirmed2');
            Route::get('/status/comfirmed3/{id}', [OrderController::class, 'pendingToConfirmed3'])->name('pendingToConfirmed3');

            // Update Status Confirmed To Processing
            Route::get('/status/processing/branch1/{id}', [OrderController::class, 'ConfirmedToProcessing_branch1'])->name('ConfirmedToProcessing_branch1');
            Route::get('/status/processing/branch2/{id}', [OrderController::class, 'ConfirmedToProcessing_branch2'])->name('ConfirmedToProcessing_branch2');
            Route::get('/status/processing/branch3/{id}', [OrderController::class, 'ConfirmedToProcessing_branch3'])->name('ConfirmedToProcessing_branch3');
            Route::get('/status/processing1/{id}', [OrderController::class, 'ConfirmedToProcessing1'])->name('ConfirmedToProcessing1');
            Route::get('/status/processing2/{id}', [OrderController::class, 'ConfirmedToProcessing2'])->name('ConfirmedToProcessing2');
            Route::get('/status/processing3/{id}', [OrderController::class, 'ConfirmedToProcessing3'])->name('ConfirmedToProcessing3');

            // Update Status Processing To Arrived
            Route::get('/status/arrived/branch1/{id}', [OrderController::class, 'ProcessingToArrived_branch1'])->name('ProcessingToArrived_branch1');
            Route::get('/status/arrived/branch2/{id}', [OrderController::class, 'ProcessingToArrived_branch2'])->name('ProcessingToArrived_branch2');
            Route::get('/status/arrived/branch3/{id}', [OrderController::class, 'ProcessingToArrived_branch3'])->name('ProcessingToArrived_branch3');
            Route::get('/status/arrived1/{id}', [OrderController::class, 'ProcessingToArrived1'])->name('ProcessingToArrived1');
            Route::get('/status/arrived2/{id}', [OrderController::class, 'ProcessingToArrived2'])->name('ProcessingToArrived2');
            Route::get('/status/arrived3/{id}', [OrderController::class, 'ProcessingToArrived3'])->name('ProcessingToArrived3');

            // Update Status Processing To Arrived
            Route::get('/status/picked/branch1/{id}', [OrderController::class, 'ArrivedToPicked_branch1'])->name('ArrivedToPicked_branch1');
            Route::get('/status/picked/branch2/{id}', [OrderController::class, 'ArrivedToPicked_branch2'])->name('ArrivedToPicked_branch2');
            Route::get('/status/picked/branch3/{id}', [OrderController::class, 'ArrivedToPicked_branch3'])->name('ArrivedToPicked_branch3');
            Route::get('/status/picked1/{id}', [OrderController::class, 'ArrivedToPicked1'])->name('ArrivedToPicked1');
            Route::get('/status/picked2/{id}', [OrderController::class, 'ArrivedToPicked2'])->name('ArrivedToPicked2');
            Route::get('/status/picked3/{id}', [OrderController::class, 'ArrivedToPicked3'])->name('ArrivedToPicked3');

            // Detail Admin && Detail for sub Admin
                // Admin
            Route::get('/detail/{id}', [OrderController::class, 'detail_viewAll_branch'])->name('detail');
            Route::get('/detail/branch1/{id}', [OrderController::class, 'detail_branch1'])->name('detail_branch1');
            Route::get('/detail/branch2/{id}', [OrderController::class, 'detail_branch2'])->name('detail_branch2');
            Route::get('/detail/branch3/{id}', [OrderController::class, 'detail_branch3'])->name('detail_branch3');
                // end Admin
            Route::get('/detail-sub/{id}', [OrderController::class, 'sub_detail'])->name('sub_detail');
            Route::get('/detail-sub2/{id}', [OrderController::class, 'sub_detail2'])->name('sub_detail2');
            Route::get('/detail-sub3/{id}', [OrderController::class, 'sub_detail3'])->name('sub_detail3');
        });

        // OrderItem Edit & Update Admin & Admin_Sub 
        Route::prefix('orderItem')->group(function(){
            // branch1
            Route::get('edit/admin/branch1/{id}', [OrderController::class, 'admin_Edit_view_branch1'])->name('edit_admin_branch1');
            Route::post('update/admin/branch1/{id}', [OrderController::class, 'admin_update_branch1'])->name('update_admin_branch1');
            // branch2
            Route::get('edit/admin/branch2/{id}', [OrderController::class, 'admin_Edit_view_branch2'])->name('edit_admin_branch2');
            Route::post('update/admin/branch2/{id}', [OrderController::class, 'admin_update_branch2'])->name('update_admin_branch2');
            // branch3
            Route::get('edit/admin/branch3/{id}', [OrderController::class, 'admin_Edit_view_branch3'])->name('edit_admin_branch3');
            Route::post('update/admin/branch3/{id}', [OrderController::class, 'admin_update_branch3'])->name('update_admin_branch3');

            // Edit & Update for SubAdmin
            Route::get('edit/sub/admin/branch1/{id}', [OrderController::class, 'SubAdmin_Edit_view_branch1'])->name('SubAdmin_Edit_view_branch1');
            Route::post('update/sub/admin/branch1/{id}', [OrderController::class, 'SubAdmin_update_branch1'])->name('SubAdmin_update_branch1');

            Route::get('edit/sub/admin/branch2/{id}', [OrderController::class, 'SubAdmin_Edit_view_branch2'])->name('SubAdmin_Edit_view_branch2');
            Route::post('update/sub/admin/branch2/{id}', [OrderController::class, 'SubAdmin_update_branch2'])->name('SubAdmin_update_branch2');

            Route::get('edit/sub/admin/branch3/{id}', [OrderController::class, 'SubAdmin_Edit_view_branch3'])->name('SubAdmin_Edit_view_branch3');
            Route::post('update/sub/admin/branch3/{id}', [OrderController::class, 'SubAdmin_update_branch3'])->name('SubAdmin_update_branch3');
        });
    });
    // Admin main leo mod leo y luea tae sub Admin h update orderItem

}); // Prevent Back Button After Logout