<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ContractCategories;
use Illuminate\Http\Request;
use App\Models\TeamMember;
use App\Models\Testimonials;
use App\Models\User;
use App\Models\Pricing;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /*
        @Author : Ritesh Rana
        @Desc   : befor login home page.
        @Input  : 
        @Output : \Illuminate\Http\Response
        @Date   : 22/08/2022
    */
    public function index()
    {
        /* Start get Data */
        $testimonials = Testimonials::select("id",'title','name','image','positions','status')
        ->where('status',1)
        ->get();
        /* End get Testimonials Data */
        return view('front.home', compact('testimonials'));
    }

     /*
        @Author : Ritesh Rana
        @Desc   : login page.
        @Input  : 
        @Output : \Illuminate\Http\Response
        @Date   : 22/08/2022
    */
    public function login_page()
    {
        /* add js */
        $footerJs[0]    = "front/customJs/signin.js";
        return view('front.login', compact( 'footerJs'));
    }

    
    /*
        @Author : Ritesh Rana
        @Desc   : front Login.
        @Input  : 
        @Output : \Illuminate\Http\Response
        @Date   : 22/08/2022
    */
    public function frontLogin(Request $request)
    {
        /* check validation */
        $validation = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        /* start check user data */
            $user = User::where(function ($u) use ($request) {
                $u->where('email', $request->email);
                })->where(function ($q) {
                    $q->where('role_id', 2);
                })->first();
            $extinginsyatem = User::where('email',$request->email)->where('role_id',2)->first();
            if(empty($extinginsyatem)){
                $newmassage = "This email is not registered, please sign up";
            }
        
        if (!$user) {
            if(isset($newmassage)){
                return back()->withErrors(['message' => $newmassage])->withInput();
            }

        }
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['message' => 'Your email and/or password is incorrect, please try again!'])->withInput();
        }
        /* End check user data */
        /* create auth */
        if ($user) {
            $user->save();
            Auth::login($user);
            //Redirect 
            return redirect(url('/front/dashboard'));
        }
    }

    /*
        @Author : Ritesh Rana
        @Desc   : front Logout.
        @Input  : 
        @Output : \Illuminate\Http\Response
        @Date   : 22/08/2022
    */
    public function frontLogout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
