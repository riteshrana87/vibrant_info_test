<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Categories;
use App\Models\User;
use App\Models\Holidays;
use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
        @Author : Ritesh Rana
        @Desc   : Display the specified resource.
        @Input  : int  $id
        @Output : \Illuminate\Http\Response
        @Date   : 17/09/2022
    */
    public function index()
    {
        //add Jquery 
        $footerJs[0]    = "front/customJs/dashboard.js";
        
        //start get Holidays data
        $holidays = Holidays::select('id','title','holiday_date')->get();
        //End get Holidays data

        return view('front.dashboard', compact('holidays','footerJs'));
    }

    /*
        @Author : Ritesh Rana
        @Desc   : Display the specified resource.
        @Input  : int  $id
        @Output : \Illuminate\Http\Response
        @Date   : 17/09/2022
    */
    public function profile()
    {
        //add Jquery 
        $footerJs[0]    = "front/customJs/profile.js";
        $id =Auth::user()->id;

        $user = User::find($id);
        return view('front.client_profile', compact('user','footerJs'));
    }



    /*
        @Author : Ritesh Rana
        @Desc   : Update the specified resource in storage.
        @Input  : \Illuminate\Http\Request  $request and int  $id
        @Output : \Illuminate\Http\Response
        @Date   : 22/08/2022
    */
    public function profileUpdate(Request $request)
    {
        $id =Auth::user()->id;
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$id.',id',
            'name' => 'required',
        ]);
        //check validation
        //Start Update user data
         $user = User::find($id);
         $user->name = $request->name;
         $user->email = $request->email;
         $user->save();
         //End Update user data
         //Redirect with message
         alert()->success('your profile has been updated successfully!')->showConfirmButton('Ok', '#07689f');
         return redirect('/front/profile/'.$id);
    }

    

}
