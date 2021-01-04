<?php

use Illuminate\Support\Facades\Route;
//use app\Http\Controllers\loginC;
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
//Route::get('/login','loginC@index')->name('login');
//Route::get('/login', [loginC::class, 'index']);

Route::get('/login', 'retailseller\loginController@index');
Route::post('/login', 'retailseller\loginController@verify');
Route::get('/logout', 'retailseller\logoutController@index')->name('logout');


Route::group(['middleware' => ['session']], function () {
    Route::get('/retailseller', 'retailseller\profileController@index');

    Route::get('/retailseller/addProduct', 'retailseller\productController@index');
    Route::post('/retailseller/addProduct', 'retailseller\productController@addProduct');

    Route::get('/retailseller/deleteProduct', 'retailseller\productController@deleteProductView');
    Route::post('/retailseller/deleteProduct', 'retailseller\productController@deleteProduct');

    Route::get('/retailseller/publishedProduct', 'retailseller\productController@publishedProductView');
    Route::post('/retailseller/publishedProduct', 'retailseller\productController@publishedProduct');

    Route::get('/retailseller/unpublishedProduct', 'retailseller\productController@unPublishedProductView');
    Route::post('/retailseller/unpublishedProduct', 'retailseller\productController@unPublishedProduct');

    Route::get('/retailseller/editProduct', 'retailseller\productController@editProductView');
    Route::post('/retailseller/editProduct', 'retailseller\productController@editProduct')->name('editPP');

    Route::get('/retailseller/addCoupon', 'retailseller\productController@addCouponView');
    Route::post('/retailseller/addCoupon', 'retailseller\productController@addCoupon');

    Route::get('/retailseller/addCatagory', 'retailseller\productController@addCatagoryView');
    Route::post('/retailseller/addCatagory', 'retailseller\productController@addCatagory');

    Route::get('/retailseller/reviewProduct', 'retailseller\sellController@reviewProductView');
    Route::get('/retailseller/reviewProduct/{productID}', 'retailseller\sellController@reviewProductDetails');
    //Route::post('/retailseller/reviewProduct', 'retailseller\sellController@reviewProduct');

    Route::get('/retailseller/totalIncome', 'retailseller\sellController@totalIncomeView');
    Route::get('retailseller/totalIncomeDetails/', 'retailseller\sellController@totalIncomeView');
    Route::get('/retailseller/totalIncomeDetails/{productID}', 'retailseller\sellController@totalIncomeDetails');
    //Route::post('/retailseller/totalIncome', 'retailseller\sellController@totalIncome');

    Route::get('/retailseller/deliverdOrders', 'retailseller\sellController@deliveredOrderView');

    Route::get('/retailseller/pendingOrders', 'retailseller\sellController@pendingOrderView');
    Route::post('/retailseller/pendingOrders', 'retailseller\sellController@pendingOrder');

    Route::get('/retailseller/reportCustomer', 'retailseller\sellController@reportCustomerView');
    Route::get('/retailseller/reportCustomer/{customerID}', 'retailseller\sellController@reportCustomerDetails');
    Route::post('/retailseller/reportCustomer/{customerID}', 'retailseller\sellController@reportCustomer');
});