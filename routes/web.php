<?php

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

Route::get('/', 'Frontend\FrontendController@index')->name('front.home');
Route::get('hotels', 'Frontend\FrontendController@hotel')->name('front.hotel');
Route::post('guide-search', 'Frontend\FrontendController@guide_search')->name('front.guide_search');
Route::get('single-hotel', 'Frontend\FrontendController@single_hotel')->name('front.single_hotel');
Route::get('restaurants', 'Frontend\FrontendController@restaurants')->name('front.restaurants');
Route::get('single-restaurant', 'Frontend\FrontendController@single_restaurant')->name('front.single_restaurant');
//guide
Route::get('tourist-guide', 'Frontend\FrontendController@tourist_guide')->name('front.tourist_guide');
Route::get('tourist-guide/{id}', 'Frontend\FrontendController@local_guide')->name('front.local_guide');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', function () {
    return redirect()->route('front.home');
});

//Admin
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    //Url ---> admin/dashboard
    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    //role
    Route::get('role', 'AdminController@role')->name('admin.role');
    Route::post('add-role', 'AdminController@add_role')->name('admin.add_role');
    Route::post('role-find', 'AdminController@find_role')->name('admin.find_role');
    Route::post('role-update', 'AdminController@role_update')->name('admin.role_update');
    Route::delete('role-delete/{id}', 'AdminController@role_delete')->name('admin.role_delete');

    //admin-Guide
    Route::get('guide', 'AdminController@guide')->name('admin.guide');
    Route::get('unverified-guide', 'AdminController@unverified_guide')->name('admin.unverified_guide');
    Route::delete('guide-delete/{id}', 'AdminController@guide_delete')->name('admin.guide_delete');
    Route::get('guide-view/{id}', 'AdminController@guide_view')->name('admin.guide_view');
    Route::post('guide-approve/{id}', 'AdminController@guide_approve')->name('admin.guide_approve');

    //admin-Customer
    
    Route::get('customer', 'AdminController@customer')->name('admin.customer');
    Route::get('unverified-customer', 'AdminController@unverified_customer')->name('admin.unverified_customer');
    Route::delete('customer-delete/{id}', 'AdminController@customer_delete')->name('admin.customer_delete');
    Route::post('customer-approve/{id}', 'AdminController@customer_approve')->name('admin.customer_approve');
    Route::get('customer-view/{id}', 'AdminController@customer_view')->name('admin.customer_view');
});

//Route For merchant
Route::middleware(['subadmin'])->prefix('subadmin')->group(function () {
    //Url ---> subadmin/dashboard
    Route::get('dashboard', 'Subadmin\SubAdminController@dashboard')->name('subadmin.dashboard');
});

//Customer

Route::group(['namespace' => 'Customer', 'prefix' => 'user', 'middleware' => ['customer','verified']], function () {
    //Url ---> user/dashboard
    Route::get('dashboard', 'CustomerController@dashboard')->name('customer.dashboard');
    Route::get('profile','CustomerController@profile')->name('customer.profile');
    Route::post('profile-update','CustomerController@profile_update')->name('customer.profile_update');
});

//guide

Route::group(['namespace' => 'guide', 'prefix' => 'guide', 'middleware' => ['guide','verified']], function () {
    //Url ---> guide/dashboard
    Route::get('dashboard', 'GuideController@guide_dashboard')->name('front.guide_dashboard');
    Route::get('edit-profile', 'GuideController@edit_profile')->name('guide.edit_profile');
    Route::post('profile-update','GuideController@profile_update')->name('guide.profile_update');
    Route::get('details', 'GuideController@details')->name('guide.details');
    Route::post('guide-detals-add','GuideController@detals_add')->name('guide.detals_add');
    Route::post('guide-detals-update/{id}','GuideController@detals_update')->name('guide.detals_update');
    Route::delete('guide-detals-delete/{id}','GuideController@detals_delete')->name('guide.detals_delete');
    Route::get('view-place', 'GuideController@place')->name('guide.place');
    Route::post('add-place', 'GuideController@add_place')->name('guide.add_place');
    Route::post('edit-place/{id}', 'GuideController@update_place')->name('guide.update_place');
    Route::delete('delete-place/{id}', 'GuideController@place_delete')->name('guide.place_delete');
    Route::get('view-introduce', 'GuideController@introduce')->name('guide.introduce_profile');
    Route::post('add-introduce', 'GuideController@add_introduce_profile')->name('guide.add_introduce_profile');
    Route::post('edit-introduce/{id}', 'GuideController@edit_introduce_profile')->name('guide.edit_introduce_profile');
    Route::delete('delete-introduce/{id}', 'GuideController@delete_introduce_profile')->name('guide.delete_introduce_profile');
    Route::get('balance', 'GuideController@earning')->name('guide.earning');
});



//coutry
    Route::get('country','CountryApiController@country');
    Route::get('state/{name}','CountryApiController@state');
    Route::get('city/{name}','CountryApiController@city');