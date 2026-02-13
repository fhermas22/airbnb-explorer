<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // dd(DB::connection('mongodb')->getCollection('listingsAndReviews')->countDocuments());

    // En utilisant le modèle ListingAndReviews, montrez-moi 5 annonces à Barcelone.
    // dd(App\Models\ListingAndReviews::where('address.country', 'Spain')
    //     ->where('address.market', 'Barcelona')
    //     ->take(5)
    //     ->get());

    //  Montrez-moi des appartements à Porto à moins de 80 dollars.
    // dd(App\Models\ListingAndReviews::byCity("Porto", ["propertyType" => "Apartment", "maxPrice" => 80]));

    return view('welcome');
});
