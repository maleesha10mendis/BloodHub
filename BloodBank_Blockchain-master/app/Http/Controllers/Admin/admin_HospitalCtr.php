<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Hospital;

use Carbon\Carbon;
use Illuminate\Validation\Rule;


class admin_HospitalCtr extends Controller
{


 //Authenticate all Admin routes
    public function __construct()
    {
        $this->middleware('checkAdmin');
       // $this->task = new branches;
    }


    //Client

    public function addHospital()
    {


        return view('Users.Admin.Hospitals.addHospital');
    }

    public function allHospital()
    {
        //$clients=User::where('role',0)->get();

        $Hospitals = Hospital::with('user')->get();

        //->join('table1','table1.id','=','table3.id');
        // dd($Hospitals);
        return view('Users.Admin.Hospitals.allHospitals',compact('Hospitals'));
    }


    public function allHospitalPdf()
    {
        //$clients=User::where('role',0)->get();

        $Hospitals = Hospital::with('user')->get();

        //->join('table1','table1.id','=','table3.id');
        // dd($Hospitals);
        return view('Users.Admin.Hospitals.components.DownloadallHospitalsTable',compact('Hospitals'));
    }
    public function deleteHospital($userID)
    {
        //

        // dd($userID);
        //Delete donor data from user,donor,test tables
        $hospital = Hospital::where('hid', $userID)->first();
        // dd($donor);
        $user = User::where('id', $hospital->userID)->delete();
        // $userDonor = User::find($userID);


        // $userDonor->delete();
        $hospital->delete();


        return redirect()->back()->with('message','Deleted Successfully');
    }

    public function updateHospital(Request $request)
    {
        // dd($request);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'registerDate' => ['required', 'string', 'date', 'before:today'],
            'mobile' => ['string', Rule::unique('hospitals', 'mobile')->ignore($request->hid, 'hid')],
            'registerNumber' => ['required', 'string', 'max:255'],
            'address' =>['string']
        ]);

        $formattedDate = Carbon::createFromFormat('m/d/Y', $request->registerDate)->format('Y-m-d');

        Hospital::where('hid', $request->hid)
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