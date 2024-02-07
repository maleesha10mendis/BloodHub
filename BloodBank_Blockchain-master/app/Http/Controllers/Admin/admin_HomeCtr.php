<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\User;
use App\Models\Donor;
use App\Models\Organization;
use App\Models\Hospital;


use Auth;

class admin_HomeCtr extends Controller
{
   //protected $task;


 //Authenticate all Admin routes
    public function __construct()
    {
        $this->middleware('checkAdmin');
       // $this->task = new branches;
    }


//Dashboard
    public function checkAdmin()
    {


        $donorCount = Donor::count();

        $orgCount = Organization::count();

        $hospCount = Hospital::count();



        //Get data for pie chart
        $maleP     =   Donor::where('donors.gender','Male')->count();
        $femaleP     =   Donor::where('donors.gender','Female')->count();
        $otherP     =   Donor::where('donors.gender','Other')->count();
        $notSayP     =   Donor::where('donors.gender','Prefer not to say')->count();

        //get Blood group count
        $aP = Donor::where('donors.bloodGroup','A+')->count();
        $aM = Donor::where('donors.bloodGroup','A-')->count();
        $bP = Donor::where('donors.bloodGroup','B+')->count();
        $bM = Donor::where('donors.bloodGroup','B-')->count();
        $abP = Donor::where('donors.bloodGroup','AB+')->count();
        $abM = Donor::where('donors.bloodGroup','AB-')->count();
        $oP = Donor::where('donors.bloodGroup','O+')->count();
        $oM = Donor::where('donors.bloodGroup','O-')->count();


        return view('Users.Admin.home',compact('donorCount','orgCount','hospCount','maleP','femaleP','otherP','notSayP','aP','aM','bP','bM','abP','abM','oP','oM'));
    }

}