<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Book;

class BookController extends Controller
{
    /*
        @Author : Ritesh Rana
        @Desc   : Display a listing of the resource.
        @Input  : 
        @Output : \Illuminate\Http\Response
        @Date   : 22/08/2022
    */
    public function index($categorieId)
    {
        return view('front.booklist', [
            'books' => book::Paginate(5)
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
        @Date   : 22/08/2022
    */
    public function create(Request $request)
    {
        $footerJs[0]    = "admin/js/jquery.validate.min.js";
        $footerJs[1]    = "admin/customJs/book_managemnet.js";

        $categories = Categories::get();

        return view('front.create_book', compact('categories','request','footerJs'));
    }

    /*
        @Author : Ritesh Rana
        @Desc   : Store a newly created resource in storage.
        @Input  : \Illuminate\Http\Request  $request
        @Output : \Illuminate\Http\Response
        @Date   : 22/08/2022
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif',
        ]);
        
        $document_file = $request->image;
        
        $file_name = time().'.'.$document_file->getClientOriginalExtension();
        $destinationPath = public_path(config('constants.bookImagePath'));
        $document_file->move($destinationPath, $file_name);

        $book = new Book();
        $book->name = $request->name;
        $book->categorie_id = $request->category_id;
        $book->image = $file_name;
        $book->author_name = $request->author_name;
        $book->published_date = $request->published_date;
        $book->save();
        alert()->success('Book added successfully!')->showConfirmButton('Ok', '#07689f');
        return redirect('/front/dashboard');
    }

    /*
        @Author : Ritesh Rana
        @Desc   : Display the specified resource.
        @Input  : int  $id
        @Output : \Illuminate\Http\Response
        @Date   : 22/08/2022
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
        @Date   : 22/08/2022
    */
    public function edit(Request $request,$id)
    {
        $book = book::find($id);
        $footerJs[0]    = "admin/js/jquery.validate.min.js";
        $footerJs[1]    = "admin/customJs/book_managemnet.js";
        return view('front.edit_book', compact('request','book','footerJs'));
    }

    
    /*
        @Author : Ritesh Rana
        @Desc   : Update the specified resource in storage.
        @Input  : \Illuminate\Http\Request  $request and int  $id
        @Output : \Illuminate\Http\Response
        @Date   : 22/08/2022
    */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif',
        ]);


        $file = $request->file('image');

			if(!empty($file)){
            	$fileArr = Book::select('image')->where(array('id'=>$id))->first();
                if(!empty($fileArr)){
					$image_path = base_path() . '/public/'.BOOK_IMAGE.$fileArr->image;
                    if (file_exists($image_path)) {
						@unlink($image_path);
					}
				}

				$file_name = time().'.'.$file->getClientOriginalExtension();
                $file->move(base_path() . '/public/'.BOOK_IMAGE, $file_name);
                $document = array(
					'image' =>   $file_name,
				);
                Book::where('id', $id)->update($document);
			}

        $book = Book::find($id);
        $book->name = $request->name;
        $book->categorie_id = $request->categorie_id;
        $book->author_name = $request->author_name;
        $book->published_date = $request->published_date;
        $book->save();
        alert()->success('Book updated successfully!')->showConfirmButton('Ok', '#07689f');
         return redirect('/front/dashboard');
    }

    /*
        @Author : Ritesh Rana
        @Desc   : Remove the specified resource from storage.
        @Input  : int  $id
        @Output : \Illuminate\Http\Response
        @Date   : 22/08/2022
    */
    public function destroy($id)
    {
        book::find($id)->delete();
        alert()->success('Book deleted successfully!')->showConfirmButton('Ok', '#07689f');
        return redirect('/admin/team_management');
    }

}
