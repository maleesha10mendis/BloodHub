<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Donor;

use Carbon\Carbon;
use Illuminate\Validation\Rule;



class admin_campaignCtr extends Controller
{


 //Authenticate all Admin routes
    public function __construct()
    {
        $this->middleware('checkAdmin');
       // $this->task = new branches;
    }


    //campaigns
    public function viewCampaign()
    {

        $orgNames = User::where('role', 2)->get(['id', 'name']);
        return view('Users.Admin.Campaign.campaign', compact('orgNames'));
    }


}