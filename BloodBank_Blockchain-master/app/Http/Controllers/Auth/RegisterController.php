<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Donor;
use App\Models\Organization;
use App\Models\Hospital;
use Carbon\Carbon;
use DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest','admin');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => ['required', 'string', 'max:255'],
            // 'email' => ['string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'address' => ['string'],
            // 'mobile' =>['string'],
            // 'NIC'=>['integer','max:12']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */




    function addingOrganization(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed','regex:/[!@#\$%\^&\*]/'],
            'mobile' =>['string','unique:Organizations'],
            'Address' =>['string','max:255'],
            'account' =>['string','max:255','unique:Organizations'],
            'registerNumber' =>['string','max:255','unique:Organizations'],
            'registerDate' => ['required', 'date'],
        ]);

        $registerDate = Carbon::createFromFormat('m/d/Y', $request->registerDate)->format('Y-m-d');
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;

        $user->password = \Hash::make($request->password);
        $user->role = $request->role;

        $organization = new Organization();
        $organization->mobile = $request->mobile;
        $organization->address = $request->Address;
        $organization->account = $request->account;
        $organization->registerNumber = $request->registerNumber;
        $organization->registerDate = $registerDate;

            //Getting next Users table ID
            $tableName = 'users';
            $nextId = DB::select("SHOW TABLE STATUS LIKE '$tableName'")[0]->Auto_increment;

            if ($nextId) {
                $organization->userID = $nextId;
            } else {
                return "No users found.";
            }



        if( $user->save() &&  $organization->save()){
            $currentRoute = Route::currentRouteName();
            // dd($currentRoute);

            if ($currentRoute == "admin.addingOrganization") {
                // Redirect to admin.home
                return redirect()->back()->with('message', 'Organization was Added Successfully');
            }else{
                return redirect()->route('admin.home');
            }
            // return redirect()->back()->with('message','Organization was Added Successfully');
        }else{
            //return redirect()->back()->with('message','Failed');
        }
    }


    function registeringDonor(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed','regex:/[!@#\$%\^&\*]/'],
            'dob' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('m/d/y')],
            'gender' => ['required', 'string'],
            'bloodGroup' => ['required', 'string'],
            'address' => ['string'],
            'mobile' =>['string','unique:donors'],
            'account' =>['string','unique:donors']

        ]);

        $dob = Carbon::createFromFormat('m/d/Y', $request->dob)->format('Y-m-d');

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;

        $user->password = \Hash::make($request->password);
        $user->role = $request->role;

        $donors = new Donor();
        $donors->dob = $dob;
        $donors->gender = $request->gender;
        $donors->bloodGroup = $request->bloodGroup;
        $donors->address = $request->address;
        $donors->mobile = $request->mobile;
        $donors->account = $request->account;

        $tableName = 'users';
        $nextId = DB::select("SHOW TABLE STATUS LIKE '$tableName'")[0]->Auto_increment;

        if ($nextId) {
            $donors->userID = $nextId;
        } else {
            return "No users found.";
        }

        if( $user->save() &&  $donors->save()){
            // return redirect()->back()->with('message','successful');

            $currentRoute = Route::currentRouteName();
            // dd($currentRoute);

            if ($currentRoute == "admin.registeringDonor") {
                // Redirect to admin.home
                return redirect()->back()->with('message', 'Successful');
            }else{
                return redirect()->route('admin.home');
            }
            // return redirect()->back()->with('message', 'Successful');
        }else{
            return redirect()->back()->with('message','Failed');
        }

    }

    function addingHospital(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed','regex:/[!@#\$%\^&\*]/'],
            'mobile' =>['string','unique:hospitals'],
            'Address' =>['string','max:255'],
            'account' =>['string','max:255','unique:hospitals'],
            'registerNumber' =>['string','max:255','unique:hospitals'],
            'registerDate' => ['required', 'date'],
        ]);

        $registerDate = Carbon::createFromFormat('m/d/Y', $request->registerDate)->format('Y-m-d');
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;

        $user->password = \Hash::make($request->password);
        $user->role = $request->role;

        $Hospital = new Hospital();
        $Hospital->mobile = $request->mobile;
        $Hospital->address = $request->Address;
        $Hospital->account = $request->account;
        $Hospital->registerNumber = $request->registerNumber;
        $Hospital->registerDate = $registerDate;

            //Getting next Users table ID
            $tableName = 'users';
            $nextId = DB::select("SHOW TABLE STATUS LIKE '$tableName'")[0]->Auto_increment;

            if ($nextId) {
                $Hospital->userID = $nextId;
            } else {
                return "No users found.";
            }



        if( $user->save() &&  $Hospital->save()){
            return redirect()->back()->with('message','Hospital was Added Successfully');
        }else{
            //return redirect()->back()->with('message','Failed');
        }
    }



}