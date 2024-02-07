<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Home\homePageController;

use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Admin\admin_HomeCtr;
use App\Http\Controllers\Admin\admin_DonorCtr;
use App\Http\Controllers\Admin\admin_campaignCtr;
use App\Http\Controllers\Admin\admin_bloodInventoryCtr;

use App\Http\Controllers\Admin\admin_ReportsCtr;
use App\Http\Controllers\Admin\admin_ProfileCtr;
use App\Http\Controllers\Admin\admin_HospitalCtr;
use App\Http\Controllers\Admin\admin_OrganizationCtr;


use App\Http\Controllers\Donor\donorController;
use App\Http\Controllers\UpdateProfile;
use App\Http\Controllers\adsController;

use App\Http\Controllers\Organization\organizationController;

use App\Http\Controllers\Hospital\hospitalController;

use Illuminate\Support\Facades\Auth;

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

// Route::get('/rr', function () {
//     return view('Home.welcome2'); // 'welcome' is the name of the Blade view for the home page
// });

//Homepage
Route::get('/', [homePageController::class, 'index'])->name('welcome');

//Register through HomePage
Route::POST('signup', [homePageController::class, 'register2'])->name('register2');
Route::POST('registering', [RegisterController::class, 'registeringDonor'])->name('registering');
Route::POST('registeringORG', [RegisterController::class, 'addingOrganization'])->name('registeringORG');

//Preventing go back
Route::middleware(['middleware'=>'lockBack'])->group(function(){
    Auth::routes();
});


//admin
Route::group(['prefix'=>'Account/Admin','middleware'=>['checkAdmin','auth','lockBack']],function(){

    // Route::get('testing', function () {
    //     return view('Users.Admin.test'); // 'welcome' is the name of the Blade view for the home page
    // })->name('adminTest');

    // Route::get('ads', function () {
    //     return view('Users.Admin.Ads.ads'); // 'welcome' is the name of the Blade view for the home page
    // })->name('adminAds');

    // Route::get('cam', function () {
    //     return view('Users.Admin.camp'); // 'welcome' is the name of the Blade view for the home page
    // })->name('adminCam');

    //Advertisement
    Route::get('ads', [adsController::class, 'addAd'])->name('adminAds');
    Route::POST('storeAd', [adsController::class, 'store'])->name('admin.storeAd');
    Route::delete('/images/{image}', [adsController::class, 'destroy'])->name('images.destroy');


    Route::get('/', [admin_HomeCtr::class, 'checkAdmin'])->name('admin.home');

    // (Donor)
    Route::get('AddDonor', [admin_DonorCtr::class, 'addDonor'])->name('admin.addDonor');
    Route::POST('registeringDonor', [RegisterController::class, 'registeringDonor'])->name('admin.registeringDonor');
    Route::get('AllDonors', [admin_DonorCtr::class, 'allDonors'])->name('admin.allDonors');
    Route::get('AllDonorsPdf', [admin_DonorCtr::class, 'allDonorsPdf'])->name('admin.allDonorsPdf');

    Route::get('donor/delete/{userID}', [admin_DonorCtr::class, 'deleteDonor'])->name('admin.deleteDonor');
    Route::post('donor/update', [admin_DonorCtr::class, 'updateDonor'])->name('admin.updateDonor');

    //Doctors (organization)
    Route::get('AddOrganization', [admin_OrganizationCtr::class, 'addOrganization'])->name('admin.addOrganization');
    Route::POST('addingOrganization', [RegisterController::class, 'addingOrganization'])->name('admin.addingOrganization');
    Route::get('AllOrganization', [admin_OrganizationCtr::class, 'allOrganization'])->name('admin.allOrganization');
    Route::get('AllOrganizationPdf', [admin_OrganizationCtr::class, 'allOrganizationPdf'])->name('admin.allorgPdf');

    Route::get('Organization/delete/{userID}', [admin_OrganizationCtr::class, 'deleteOrganization'])->name('admin.deleteOrganization');
    Route::post('Organization/update', [admin_OrganizationCtr::class, 'updateOrganization'])->name('admin.updateOrganization');

    //Hospitals
    Route::get('AddHospital', [admin_HospitalCtr::class, 'addHospital'])->name('admin.addHospital');
    Route::POST('addingHospital', [RegisterController::class, 'addingHospital'])->name('admin.addingHospital');
    Route::get('AllHospital', [admin_HospitalCtr::class, 'allHospital'])->name('admin.allHospital');
    Route::get('AllHospitalPdf', [admin_HospitalCtr::class, 'allHospitalPdf'])->name('admin.allHospitalPdf');

    Route::get('Hospital/delete/{userID}', [admin_HospitalCtr::class, 'deleteHospital'])->name('admin.deleteHospital');
    Route::post('Hospital/update', [admin_HospitalCtr::class, 'updateHospital'])->name('admin.updateHospital');

    //Campaigns
    // Route::get('allCampaigns', function () {
    //     return view('Users.Admin.Campaign.campaign'); //view campaigns
    // })->name('admin.allCampaigns');
    Route::get('allCampaigns', [admin_campaignCtr::class, 'viewCampaign'])->name('admin.allCampaigns');

    //Blood Inventory
    Route::get('bloodInventory', [admin_bloodInventoryCtr::class, 'bloodInventoryView'])->name('admin.bloodInventoryView');
    //bloodTransfer
    Route::get('bloodTransfer', [admin_bloodInventoryCtr::class, 'bloodTransferView'])->name('admin.bloodTransferView');

    //Blood Requests by Hospitals
    Route::get('bloodRequestsHospitals', [admin_bloodInventoryCtr::class, 'bloodRequestsView'])->name('admin.bloodRequestsView');
    //Organization Transfers
    Route::get('organizationTransfers', [admin_bloodInventoryCtr::class, 'bloodTransferORG'])->name('admin.bloodTransferORG');


    //Report
    Route::get('hospitalBloodS', [admin_ReportsCtr::class, 'hospitalBloodS'])->name('admin.hospitalBloodS');
    Route::get('organizationBloodS', [admin_ReportsCtr::class, 'organizationBloodS'])->name('admin.organizationBloodS');


    //Profile
    Route::get('/myProfile', [admin_ProfileCtr::class, 'AdminViewUpdateProfile'])->name('AdminViewUpdateProfile');
    Route::POST('updateAdmin', [admin_ProfileCtr::class, 'updateAdmin'])->name('admin.updateAdmin');
    Route::get('admin/delete/{userID}', [admin_ProfileCtr::class, 'deleteAdmin'])->name('admin.deleteAdmin');


});

// - Donor
Route::group(['prefix'=>'Account/Donor','middleware'=>['checkDonor','auth','lockBack']],function(){

    Route::get('cam', function () {
        return view('Users.Donor.camp'); // 'welcome' is the name of the Blade view for the home page
    })->name('donorCam');
    Route::get('/', [donorController::class, 'checkDonor'])->name('donor.home');

    //update user profile
    Route::get('/myProfile', [UpdateProfile::class, 'CustomerViewUpdateProfile'])->name('DonorProfileUpdate');
    Route::post('/updatingProfile', [UpdateProfile::class, 'CustomerUpdateProfile'])->name('DonorProfileUpdating');

    //Delete user profile
    Route::get('user/delete/{ID}', [donorController::class, 'deleteUser']);

    //Download Report
    // Route::get('patientReport/view/{ID}', [donorController::class, 'viewReport'])->name('patient.viewReport');

    Route::get('/campaign', [donorController::class, 'campaignView'])->name('donor.campaignView');
    Route::get('/badge', [donorController::class, 'badgeView'])->name('donor.badgeView');
    Route::get('/donorCard', [donorController::class, 'donorCard'])->name('donor.donorCard');
    Route::get('/donorCardDownload', [donorController::class, 'downloadDonorCard'])->name('donor.downloadDonorCard');
    Route::get('/myHistory', [donorController::class, 'myHistory'])->name('donor.myHistory');
});


//Organization
Route::group(['prefix'=>'Account/Organization','middleware'=>['checkOrganization','auth','lockBack']],function(){

    Route::get('cam', function () {
        return view('Users.Organization.camp'); // 'welcome' is the name of the Blade view for the home page
    })->name('orgCam');


    Route::get('/', [organizationController::class, 'checkOrganization'])->name('organization.home');

    //update user profile
    Route::get('/myProfile', [organizationController::class, 'OrganizationViewUpdateProfile'])->name('OrganizationProfileUpdate');
    Route::post('/organization/updatingProfile', [organizationController::class, 'OrganizationUpdateProfile'])->name('OrganizationProfileUpdating');

    //Delete user profile
    Route::get('user/delete/{ID}', [organizationController::class, 'deleteUser'])->name('organization.deleteProfile');

    //Download Report
    // Route::get('patientReport/view/{ID}', [organizationController::class, 'viewReport'])->name('doctor.viewReport');

    Route::get('/donorRequests', [organizationController::class, 'donorRequestView'])->name('organization.donorRequestView');
    Route::get('/campaign', [organizationController::class, 'campaignView'])->name('organization.campaignView');
    Route::post('/slotDataStore', [organizationController::class, 'slotDataStore'])->name('slotDataStore');

    //Inventory
    Route::get('/inventory', [organizationController::class, 'inventoryView'])->name('organization.inventoryView');
    Route::get('/bloodTransfer', [organizationController::class, 'bloodTransfer'])->name('organization.bloodTransfer');

    // Route::get('testing', function () {
    //     return view('Users.Organization.Campaign.test'); // 'welcome' is the name of the Blade view for the home page
    // })->name('organizationTest');
});

//Hospital
Route::group(['prefix'=>'Account/Hospital','middleware'=>['checkHospital','auth','lockBack']],function(){
    // Route::get('/', [organizationController::class, 'checkDoctor'])->name('doctor.home');

    // Route::get('/', function () {
    //     return view('Users.Hospital.Home'); // 'welcome' is the name of the Blade view for the home page
    // })->name('hospital.home');

    Route::get('/', [hospitalController::class, 'checkHospital'])->name('hospital.home');

    //update user profile
    Route::get('/myProfile', [hospitalController::class, 'HospitalViewUpdateProfile'])->name('HospitalProfileUpdate');
    Route::post('/hospital/updatingProfile', [hospitalController::class, 'HospitalUpdateProfile'])->name('HospitalProfileUpdating');

    //Delete user profile
    Route::get('hospital/delete/{ID}', [hospitalController::class, 'deleteUser'])->name('hospital.deleteProfile');


    Route::get('/requestBlood', [hospitalController::class, 'requestBloodView'])->name('Hospital.requestBloodView');
    Route::get('/history', [hospitalController::class, 'history'])->name('Hospital.history');
    Route::get('/inventory', [hospitalController::class, 'inventory'])->name('Hospital.inventory');

});

//Disabled User Registration
// Route::get('/register', function() {
//     return redirect('/');
// });