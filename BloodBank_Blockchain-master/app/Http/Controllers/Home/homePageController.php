<?php

namespace App\Http\Controllers\Home;
use App\Models\adPosts;
use App\Models\Donor;
use App\Models\Organization;
use App\Models\Hospital;
use App\Http\Controllers\Controller;



class homePageController extends Controller
{


    public function index()
    {
        // $availableTcount = AvailableTest::all()->count();
        // $Dcount = Doctor::all()->count();
        // $Pcount = Patient::all()->count();

        // $allAvialableTest = AvailableTest::all();
         //dd($allAvialableTest);
         $images = adPosts::all();
         $donorCount = Donor::count();
         $orgCount = Organization::count();
         $hospCount = Hospital::count();

        return view('Home.welcome', compact('images','donorCount','orgCount','hospCount'));

    }


    public function register2()
    {

        return view('auth.register');

    }


}