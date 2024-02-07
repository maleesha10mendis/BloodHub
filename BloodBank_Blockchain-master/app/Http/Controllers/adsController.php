<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\adPosts;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\UserRequest;



class adsController extends Controller
{

    public function addAd()
    {
        $images = adPosts::all();
        return view('Users.Admin.Ads.ads', compact('images'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('homePage/images/ads/'), $imageName);

        $image = new adPosts;
        $image->name = $imageName;
        $image->path = 'homePage/images/ads/'.$imageName;
        $image->save();

        return redirect()->route('adminAds')
                        ->with('success','Image uploaded successfully');
    }


    public function destroy(adPosts $image)
{
    $imagePath = public_path($image->path);

    // Delete the image from the database
    $image->delete();

    // Check if the file exists before attempting deletion
    if (File::exists($imagePath)) {
        // Delete the physical file
        File::delete($imagePath);

        return redirect()->route('adminAds')->with('success', 'Image deleted successfully');
    } else {
        return redirect()->route('adminAds')->with('error', 'Image file not found.');
    }
}

}