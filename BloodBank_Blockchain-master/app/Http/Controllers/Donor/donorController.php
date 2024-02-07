<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Donor;




class donorController extends Controller
{
    public function checkDonor()
    {

        $orgNames = User::where('role', 2)->get(['id', 'name']);
        $userId = Auth::id();
        $Donor = Donor::with('user')->where('userID', $userId)->get();
        return view('Users.Donor.home',compact('orgNames','Donor'));
    }

    public function deleteUser($ID)
    {


        $patient = Patient::where('userID', $ID)->first();
        $testPatient = Test::where('pid', $patient->pid)->delete();
        $delete = User::find($ID);

        $patient->delete();

        $delete->delete();
        return redirect()->back()->with('message','successful');
    }


    public function campaignView()
    {
        $orgNames = User::where('role', 2)->get(['id', 'name']);
        $userId = Auth::id();
        $Donor = Donor::with('user')->where('userID', $userId)->get();
        // dd($Donor);
        return view('Users.Donor.CampaignAds.campaign', compact('orgNames','Donor'));
    }

    public function badgeView()
    {
        $orgNames = User::where('role', 2)->get(['id', 'name']);
        $userId = Auth::id();
        $Donor = Donor::with('user')->where('userID', $userId)->get();
        return view('Users.Donor.Badge.badge',compact('orgNames','Donor'));
    }

    public function donorCard()
    {
        $authUserId = Auth::id();
        $orgNames = User::where('role', 2)->get(['id', 'name']);
        $Donor = Donor::with('user')->where('userID', $authUserId)->get();

        $usersWithDonor = Donor::with('user')
            ->whereHas('user', function ($query) use ($authUserId) {
                $query->where('id', $authUserId);
            })->get();

            // dd($usersWithDonor);

        return view('Users.Donor.DonorCard.donorCard',['donorCardData' => $usersWithDonor,'orgNames' => $orgNames,'Donor' => $Donor ]);
    }

    public function downloadDonorCard()
    {
        $authUserId = Auth::id();
        $orgNames = User::where('role', 2)->get(['id', 'name']);
        $Donor = Donor::with('user')->where('userID', $authUserId)->get();

        $usersWithDonor = Donor::with('user')
            ->whereHas('user', function ($query) use ($authUserId) {
                $query->where('id', $authUserId);
            })->get();

            // dd($usersWithDonor);

        return view('Users.Donor.DonorCard.downloaddonorCard',['donorCardData' => $usersWithDonor,'orgNames' => $orgNames,'Donor' => $Donor]);
    }

    public function myHistory()
    {
        $orgNames = User::where('role', 2)->get(['id', 'name']);
        $userId = Auth::id();
        $Donor = Donor::with('user')->where('userID', $userId)->get();
        return view('Users.Donor.History.history',compact('orgNames','Donor'));
    }




}