<?php

use App\Http\Controllers\ListingController;
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

//Route::get('/', function () {
//
//    $service_url = 'http://noyantapan.am/local/api/index.php';
//    $apiKey = '32Xhsdf7asd';
//    $headers = array(
//        'Authorization: ' . $apiKey
//    );
//    $curl = curl_init();
//    curl_setopt($curl, CURLOPT_URL, $service_url);
//
//    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//    $response = curl_exec($curl);
//    curl_close($curl);
//    $array = json_decode($response,true);
//    dd($array);
////foreach ($array['products'] as $arr){
////    dd($arr);
////}
//
//
//////        echo '<img src="' . $value[0]['IMAGES']['FileName'] . '" height="100%" width="100%">';
//
//
//});


Route::get('/', [ListingController::class,'index']);
Route::get('/listing/create', [ListingController::class, 'create'])->name('listing.create');
Route::post('/listing/store', [ListingController::class, 'store'])->name('listing.store');
Route::get('/listing/{id}', [ListingController::class, 'show']);
