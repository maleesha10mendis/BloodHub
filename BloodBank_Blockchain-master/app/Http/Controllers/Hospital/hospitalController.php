<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Hospital;




class hospitalController extends Controller
{
    public function checkHospital()
    {

       return view('Users.Hospital.home');
    }

    public function HospitalViewUpdateProfile(Request $request)
    {
        $client = Auth::user();

        return view('Users.Hospital.Profile.myProfile',compact('client'));
    }

    public function HospitalUpdateProfile(Request $request)
    {

        $this->validate($request, [

            'name' => ['required', 'string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            'current_password' => 'required|string'

        ]);
        $auth = Auth::user();
        $user =  User::find($auth->id);

        $newPWD = $request->new_password;
        if ($newPWD !=''){
            $this->validate($request, [
                'new_password' => 'confirmed|min:8|string'

            ]);

        $user->password = Hash::make($request->new_password);
        }


        // The passwords matches
        if (!Hash::check($request->get('current_password'), $auth->password))
        {
            return back()->with('error', "Current Password is Invalid");
        }

        // Current password and new password same
        if (strcmp($request->get('current_password'), $request->new_password) == 0)
        {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
        return back()->with('message','successful');
    }

    public function deleteUser($ID)
    {


        $patient = Hospital::where('userID', $ID)->first();
        // $testPatient = Test::where('pid', $patient->pid)->delete();
        $delete = User::find($ID);

        $patient->delete();

        $delete->delete();
        return redirect()->back()->with('message','successful');
    }


    public function requestBloodView()
    {
        return view('Users.Hospital.RequestBlood.requestBlood');
    }


    public function history()
    {
        return view('Users.Hospital.History.history');
    }

    public function inventory()
    {
        return view('Users.Hospital.Inventory.inventory');
    }
}