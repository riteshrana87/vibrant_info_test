<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Auth;

use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function signup()
    {
        $footerJs[0]    = "front/customJs/signUp.js";
        return view('front.signup', compact( 'footerJs'));
    }

    public function saveUser(Request $request)
    {
        
    /* start check validation */
        $validationArr = array(
			'email' => 'required|email|unique:App\Models\User,email',
            'password' => ['required', 'string', 'min:8'],
            'confirm_password' => 'required_with:password|same:password',
        );

        $validator = Validator::make($request->all(),$validationArr);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
       /* End check validation */     
		}else {
        //store User data
          $user = new User();
          $user->role_id = 2;
          $user->password = Hash::make($request->password);
          $user->email = $request->email;
          $user->save();

            //login and redirect to deshbord page
            if ($user->id) {
                Auth::login($user);
                alert()->success('Registration successfully!')->showConfirmButton('Ok', '#07689f');
                return redirect('/front/dashboard');
            }else{
                alert()->error('Sorry, your Registration failed!')->showConfirmButton('Ok', '#07689f');
                return redirect('/signup');
            }
        }
        
    }

    
}
