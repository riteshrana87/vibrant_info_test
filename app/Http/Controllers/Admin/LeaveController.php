<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Leaves;
use Auth;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class LeaveController extends Controller
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
        @Desc   : Display a listing of the resource.
        @Input  : 
        @Output : \Illuminate\Http\Response
        @Date   : 17/09/2022
    */
    public function index(Request $request)
    {
        $footerJs[0]    = "admin/js/jquery.validate.min.js";
        $footerJs[1]    = "admin/customJs/admin_client_managemnet.js";

        $dataQuery = Leaves::orderBy('id', 'DESC');
        if ($request->has('search_by_user_name') && $request->search_by_user_name != '') {
           $dataQuery->where('title', 'like', '%' . $request->search_by_user_name . '%')
           ->orWhere('leave_date', 'like', '%' . $request->search_by_user_name . '%');
        }
        $data = $dataQuery->get();
        //$currentUserData = User::find(Auth::id()); 
        return view('admin.leave.index', compact('data','request','footerJs'));
    }

    /*
        @Author : Ritesh Rana
        @Desc   : Show the form for creating a new resource.
        @Input  : 
        @Output : \Illuminate\Http\Response
        @Date   : 17/09/2022
    */
    public function create(Request $request)
    {

        $headerCss[0] = "admin/css/select2.css";
        $headerCss[1] = "admin/css/uppy.min.css";

        $footerJs[0]    = "admin/js/select2.min.js";
        $footerJs[1]    = "admin/js/jquery.validate.min.js";
        $footerJs[2]    = "admin/js/uppy.min.js";
        
        return view('admin.leave.add', compact('request','footerJs','headerCss'));
    }

    /*
        @Author : Ritesh Rana
        @Desc   : Display the specified resource.
        @Input  : int  $id
        @Output : \Illuminate\Http\Response
        @Date   : 17/09/2022
    */
    public function show($id)
    {
        //
    }

    /*
        @Author : Ritesh Rana
        @Desc   : Show the form for editing the specified resource.
        @Input  : int  $id
        @Output : \Illuminate\Http\Response
        @Date   : 17/09/2022
    */
    public function edit(Request $request,$id)
    {
        $headerCss[0] = "admin/css/demo.css";
        $headerCss[1] = "admin/css/uppy.min.css";

        $footerJs[0]    = "admin/js/select2.min.js";
        $footerJs[1]    = "admin/js/jquery.validate.min.js";
        $footerJs[2]    = "admin/js/uppy.min.js";
        
        $userdata = Leaves::find($id);
        return view('admin.leave.edit', compact('request','userdata','footerJs','headerCss'));
    }

    /*
        @Author : Ritesh Rana
        @Desc   : Update the specified resource in storage.
        @Input  : \Illuminate\Http\Request  $request and int  $id
        @Output : \Illuminate\Http\Response
        @Date   : 17/09/2022
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id.',id',
        ]);

         $user = User::find($id);
         $user->name = $request->name;
         $user->email = $request->email;
         $user->address = $request->address;
         $user->phone = (int)$request->phone;
         $user->dob = $request->dob;
         $user->save();

         alert()->success('User updated successfully!')->showConfirmButton('Ok', '#07689f');
         return redirect('/admin/leave_management');
    }


}
