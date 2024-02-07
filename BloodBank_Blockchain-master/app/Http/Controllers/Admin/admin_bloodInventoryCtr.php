<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Donor;
use Carbon\Carbon;
use Illuminate\Validation\Rule;



class admin_bloodInventoryCtr extends Controller
{


 //Authenticate all Admin routes
    public function __construct()
    {
        $this->middleware('checkAdmin');
       // $this->task = new branches;
    }


    //campaigns
    public function bloodInventoryView()
    {

        $orgNames = User::where('role', 2)->get(['id', 'name']);
        return view('Users.Admin.Inventory.bloodInventory', compact('orgNames'));
    }

    public function bloodTransferView()
    {

        $hospitals = User::join('hospitals', 'users.id', '=', 'hospitals.userid')
        ->where('users.role', 3)
        ->select('users.id','users.name', 'hospitals.address', 'hospitals.mobile')
        ->get();
        return view('Users.Admin.Inventory.bloodTransfer', compact('hospitals'));
    }

    public function bloodRequestsView()
    {
        $hospitals = User::join('hospitals', 'users.id', '=', 'hospitals.userid')
        ->where('users.role', 3)
        ->select('users.id','users.name', 'hospitals.address', 'hospitals.mobile')
        ->get();

        return view('Users.Admin.hospitalRequests.hospitalRequests', compact('hospitals'));

    }

    public function bloodTransferORG()
    {

        $orgNames = User::where('role', 2)->get(['id', 'name']);
        return view('Users.Admin.Inventory.organizationTransfer', compact('orgNames'));
    }


}