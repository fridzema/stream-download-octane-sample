<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
// use Storage;

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

Route::get('download/{size}', function ($size = 'small') {
  $filename = "{$size}.pdf";
  $file = base64_encode(Storage::get($filename));

  return response()->streamDownload(function () use ($file) {
    echo base64_decode($file);
  }, $filename);
});
