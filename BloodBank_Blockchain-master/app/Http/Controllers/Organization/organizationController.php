<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;




class organizationController extends Controller
{
    public function checkOrganization()
    {

        $userId = Auth::id();

       return view('Users.Organization.home',compact('userId'));
    }

    public function OrganizationViewUpdateProfile(Request $request)
    {
        $client = Auth::user();

        return view('Users.Organization.Profile.myProfile',compact('client'));
    }

    public function OrganizationUpdateProfile(Request $request)
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
        return back()->with('message','Successfully Updated');
    }

    public function deleteUser($ID)
    {
        //dd($ID);
        $delete = User::find($ID);
        $delete->delete();
        return redirect()->back()->with('message','successful');
    }



    public function donorRequestView()
    {
        $orgNames = User::where('role', 0)->get(['id', 'name']);

        $donors = User::join('donors', 'users.id', '=', 'donors.userid')
        ->where('users.role', 0)
        ->select('users.name', 'donors.account', 'donors.address', 'donors.mobile', 'donors.bloodGroup', 'donors.dob', 'donors.gender')
        ->get();


        return view('Users.Organization.DonorRequest.donorRequest',compact('donors'));
    }

    public function campaignView()
    {
        return view('Users.Organization.Campaign.campaign');
    }

    public function inventoryView()
    {
        return view('Users.Organization.Inventory.inventory');
    }

    public function slotDataStore(Request $request)
    {
        dd($request);
        // return redirect()->back()->with('message','successful');
        // return view('Users.Organization.DonorRequest.donorRequest');
    }

    public function bloodTransfer()
    {
        $admin = User::where('role', 1)->get(['id']);
        return view('Users.Organization.Inventory.bloodTransfer',compact('admin'));
    }

}
