<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Leaves;

class LeaveController extends Controller
{
     /*
        @Author : Ritesh Rana
        @Desc   : Display a listing of the resource.
        @Input  : 
        @Output : \Illuminate\Http\Response
        @Date   : 17/09/2022
    */
    public function index()
    {
        return view('front.leavelist', [
            'leaves' => Leaves::Paginate(5)
        ]);
    }

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
        @Desc   : Show the form for creating a new resource.
        @Input  : 
        @Output : \Illuminate\Http\Response
        @Date   : 17/09/2022
    */
    public function create(Request $request)
    {
        $footerJs[0]    = "admin/js/jquery.validate.min.js";
        $footerJs[1]    = "admin/customJs/leave_managemnet.js";

        return view('front.create_leave', compact('request','footerJs'));
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
        $request->validate([
            'title' => 'required',
            'leave_date' => 'required',
            'leave_description' => 'required',
        ]);
        
        $book = new Leaves();
        $book->title = $request->title;
        $book->leave_date = $request->leave_date;
        $book->leave_description = $request->leave_description;
        $book->save();
        alert()->success('Leave added successfully!')->showConfirmButton('Ok', '#07689f');
        return redirect('/front/leave');
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
        $book = book::find($id);
        $footerJs[0]    = "admin/js/jquery.validate.min.js";
        $footerJs[1]    = "admin/customJs/leave_managemnet.js";
        return view('front.edit_leave', compact('request','book','footerJs'));
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
        $input = $request->all();
        $request->validate([
            'title' => 'required',
            'leave_date' => 'required',
            'leave_description' => 'required',
        ]);


        $book = Book::find($id);
        $book->title = $request->title;
        $book->leave_date = $request->leave_date;
        $book->leave_description = $request->leave_description;
        $book->save();
        alert()->success('leave updated successfully!')->showConfirmButton('Ok', '#07689f');
         return redirect('/front/dashboard');
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
        book::find($id)->delete();
        alert()->success('Leave deleted successfully!')->showConfirmButton('Ok', '#07689f');
        return redirect('/admin/team_management');
    }
}
