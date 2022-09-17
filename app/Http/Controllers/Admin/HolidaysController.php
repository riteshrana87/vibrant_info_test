<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Holidays;
use Auth;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class HolidaysController extends Controller
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
        $footerJs[1]    = "admin/customJs/admin_holiday_managemnet.js";

        $dataQuery = Holidays::orderBy('id', 'DESC');
        if ($request->has('search_by_user_name') && $request->search_by_user_name != '') {
           $dataQuery->where('title', 'like', '%' . $request->search_by_user_name . '%');
        }
        $data = $dataQuery->get();
        return view('admin.holiday.index', compact('data','request','footerJs'));
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
        $footerJs[3]    = "admin/customJs/admin_holiday_managemnet.js";

        return view('admin.holiday.add', compact('request','footerJs','headerCss'));
    }

    /*
        @Author : Ritesh Rana
        @Desc   : Store a newly created resource in storage.
        @Input  : \Illuminate\Http\Request  $request
        @Output : \Illuminate\Http\Response
        @Date   : 17/09/2022
    */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'title' => 'required',
            'holiday_date' =>'required',
        ]);

        if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		}

        $holidays = new Holidays();
        $holidays->title = $request->title;
        $holidays->holiday_date = $request->holiday_date;
        $holidays->save();
        alert()->success('Holidays added successfully!')->showConfirmButton('Ok', '#07689f');
        return redirect('/admin/holiday_management');
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
        $footerJs[3]    = "admin/customJs/admin_holiday_managemnet.js";

        $userdata = Holidays::find($id);
        return view('admin.holiday.edit', compact('request','userdata','footerJs','headerCss'));
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
            'title' => 'required',
            'holiday_date' =>'required',
        ]);

        $holidays = Holidays::find($id);
        $holidays->title = $request->title;
        $holidays->holiday_date = $request->holiday_date;
        $holidays->save();

         alert()->success('Holidays updated successfully!')->showConfirmButton('Ok', '#07689f');
         return redirect('/admin/holiday_management');
    }

    /*
        @Author : Ritesh Rana
        @Desc   : Remove the specified resource from storage.
        @Input  : int  $id
        @Output : \Illuminate\Http\Response
        @Date   : 17/09/2022
    */
    public function destroy($id)
    {
        $category = Holidays::find($id)->delete();
        alert()->success('Holidays deleted successfully!')->showConfirmButton('Ok', '#07689f');
        return redirect('/admin/holiday_management');
    }
}
