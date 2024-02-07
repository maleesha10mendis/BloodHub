<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Organization;
use App\Models\AvailableTest;
use App\Models\Test;
use App\Models\Hospital;

use Carbon\Carbon;

class admin_ReportsCtr extends Controller
{


 //Authenticate all Admin routes
    public function __construct()
    {
        $this->middleware('checkAdmin');
       // $this->task = new branches;
    }



    public function hospitalBloodS()
    {
        $allHospital = Hospital::with('user')->get();

        //dd($allTestData);
        return view('Users.Admin.Reports.hospitalBloodStock',compact('allHospital'));
    }


    public function organizationBloodS()
    {
        $allorgs = Organization::with('user')->get();

        //dd($allTestData);
        return view('Users.Admin.Reports.organizationBloodStock',compact('allorgs'));
    }

}