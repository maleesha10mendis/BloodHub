<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Donor;

use Carbon\Carbon;
use Illuminate\Validation\Rule;



class admin_DonorCtr extends Controller
{


 //Authenticate all Admin routes
    public function __construct()
    {
        $this->middleware('checkAdmin');
       // $this->task = new branches;
    }


    //Donor

    public function addDonor()
    {


        return view('Users.Admin.Donors.addDonor');
    }

    public function allDonors()
    {
        //$clients=User::where('role',0)->get();

        $usersWithDonors = Donor::with('user')->get();


        //->join('table1','table1.id','=','table3.id');
        // dd($usersWithDonors);
        return view('Users.Admin.Donors.allDonors',compact('usersWithDonors'));
    }

    public function deleteDonor($userID)
    {
        // dd($userID);
        //Delete donor data from user,donor,test tables
        $donor = Donor::where('did', $userID)->first();
        // dd($donor);
        $user = User::where('id', $donor->userID)->delete();
        // $userDonor = User::find($userID);


        // $userDonor->delete();
        $donor->delete();


        return redirect()->back()->with('message','Deleted Successfully');
    }

    public function updateDonor(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:male,female,other,prefer-not-to-say'],
            'dob' => ['required', 'string', 'date','before:-18 years'],
            'mobile' =>['string',Rule::unique('donors', 'mobile')->ignore($request->did, 'did')],
            'address' =>['string']
        ]);
        //change the date format
        $formattedDate = Carbon::createFromFormat('m/d/Y', $request->dob)->format('Y-m-d');

        Donor::where('did', $request->did)
        ->update([
                    'mobile' => $request->mobile,
                    'address' => $request->address,
                    'gender'=> $request->gender,
                    'bloodGroup'=> $request->bloodGroup,
                    'dob'=> $formattedDate

                ]);

        User::where('id', $request->id)
        ->update([
                    'name' => $request->name,

                ]);

        return redirect()->back()->with('message','Updated Successfully!');

    }

    public function allDonorsPdf()
    {
        //$clients=User::where('role',0)->get();

        $usersWithDonors = Donor::with('user')->get();


        //->join('table1','table1.id','=','table3.id');
        // dd($usersWithDonors);
        return view('Users.Admin.Donors.components.DownloadallDonorTable',compact('usersWithDonors'));
    }


}