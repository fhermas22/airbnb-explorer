<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // dd(DB::connection('mongodb')->getCollection('listingsAndReviews')->countDocuments());
    return view('welcome');
});
