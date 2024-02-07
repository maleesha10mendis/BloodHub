<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Organization;

use Carbon\Carbon;
use Illuminate\Validation\Rule;


class admin_OrganizationCtr extends Controller
{


 //Authenticate all Admin routes
    public function __construct()
    {
        $this->middleware('checkAdmin');
       // $this->task = new branches;
    }


    //Client

    public function addOrganization()
    {
        return view('Users.Admin.Organizations.addOrganization');
    }

    public function allOrganization()
    {
        //$clients=User::where('role',0)->get();

        $usersWithOrganizations = Organization::with('user')->get();

        //->join('table1','table1.id','=','table3.id');
        //dd($usersWithDoctors);
        return view('Users.Admin.Organizations.allOrganizations',compact('usersWithOrganizations'));
    }


    public function allOrganizationPdf()
    {
        //$clients=User::where('role',0)->get();

        $usersWithOrganizations = Organization::with('user')->get();

        //->join('table1','table1.id','=','table3.id');
        //dd($usersWithDoctors);
        return view('Users.Admin.Organizations.components.DownloadallOrganizationsTable',compact('usersWithOrganizations'));
    }

    public function deleteOrganization($userID)
    {

        //Delete donor data from user,donor,test tables
        $org = Organization::where('oid', $userID)->first();
        // dd($donor);
        $user = User::where('id', $org->userID)->delete();
        // $userDonor = User::find($userID);


        // $userDonor->delete();
        $org->delete();


        return redirect()->back()->with('message','Deleted Successfully');
    }

    public function updateOrganization(Request $request)
    {
        // dd($request);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'registerDate' => ['required', 'string', 'date', 'before:today'],
            'mobile' => ['string', Rule::unique('organizations', 'mobile')->ignore($request->oid, 'oid')],
            'registerNumber' => ['required', 'string', 'max:255'],
            'address' =>['string']
        ]);

        $formattedDate = Carbon::createFromFormat('m/d/Y', $request->registerDate)->format('Y-m-d');

        Organization::where('oid', $request->oid)
        ->update([
                    'mobile' => $request->mobile,
                    'registerDate'=> $formattedDate,
                    'registerNumber'=> $request->registerNumber,
                    'address' => $request->address,

                ]);

        User::where('id', $request->id)
        ->update([
                    'name' => $request->name,

                ]);

        return redirect()->back()->with('message','Updated Successfully');

    }



}