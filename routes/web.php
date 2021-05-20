<?php

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
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {

    Route::get("dashboard","DashboardController@index")->name('dashboard');
    Route::get("profile","StaffController@setting")->name("profile");

    
    Route::middleware(["CheckPermission"])->group(function () {
        // resource
        Route::resource("projectsetup","ProjectSetupController");
        Route::resource("staff","StaffController");
        Route::get("staff/document/{document}","StaffController@document")->name("document");
        Route::get("staff/document/download/{document}","StaffController@documentDownload")->name("documentDownload");

        Route::resource("designation","DesignationController");
        Route::resource("leavetype","LeaveTypeController");
        Route::resource("namechart","NameChartController");
        Route::resource("category","CategoryController");
        Route::resource("itemsetup","ItemSetupController");
        Route::resource("leave","LeaveRequestController");
        Route::resource("fixasset","FixAssetController");
        Route::resource("goodreceipt","GoodReceiptController");
        Route::resource("goodstoreout","GoodStoreOutController");
        Route::resource("supplier","SupplierController");

        // log sheet
        Route::resource("logsheet","LogSheetController");

        // report 
        Route::get("staff/report/view","StaffController@staffReport")->name("staffReport");
        Route::get("fixasset/report/view","FixAssetController@fixassetReport")->name("fixassetReport");
        Route::get("goodreceipt/report/view","GoodReceiptController@goodreceiptReport")->name("goodreceiptReport");
        Route::get("goodstoreout/report/view","GoodStoreOutController@goodstoreoutReport")->name("goodstoreoutReport");
        Route::get("leave/report/view","LeaveRequestController@leaveReport")->name("leaveReport");

        Route::get("leave/report/compile","LeaveReportController@index")->name("leavereport.index");
        
    });
    
});

Route::fallback(function() {
    return redirect()->route("dashboard");
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
