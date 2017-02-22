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


Auth::routes();

Route::get('/', 'InitController@homePage');
Route::get('/edit_home_page/{saved?}', 'HomepageController@editHomePageForm');
Route::post('/edit_home_page', 'HomepageController@editHomePageEdit');

Route::get('/tapioca_manager', 'HomeController@index');

Route::get('images/{filename}', function ($filename)
{
    $ds = DIRECTORY_SEPARATOR;
    $path = storage_path() . "{$ds}app{$ds}public{$ds}images{$ds}" . $filename;

    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});
