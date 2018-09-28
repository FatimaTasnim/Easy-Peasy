<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Sell;

class SellsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sell = Sell::orderBy('created_at', 'desc')->paginate(7);
        return view('sells.index')->with('sells', $sell);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sells.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'booktitle' => 'required',
            'bookauthor' => 'required',
            'condition' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'book_image' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload

        if($request->hasFile('book_image')){
            //file name with extention
            $filenameWithExt = $request->file('book_image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('book_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('book_image')->storeAs('public/book_images', $fileNameToStore);
        
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        //create post
        $sell = new Sell;
        $sell->booktitle = $request->input('booktitle');
        $sell->bookauthor = $request->input('bookauthor');
        $sell->condition = $request->input('condition');
        $sell->price = $request->input('price');
        $sell->quantity = $request->input('quantity');
        $sell->user_id = auth()->user()->id;
        $sell->book_image = $fileNameToStore;
        $sell->save();

        return redirect('/sells')->with('success', 'Book Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sell = Sell::find($id);
        return view('sells.show')->with('sell', $sell);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sell = Sell::find($id);

        //check for correct user
        if(auth()->user()->id !==$sell->user_id){
            return redirect('/sells')->with('error', 'Unauthorized Page. You can only make changes in your own post');
        }
        return view('sells.edit')->with('sell', $sell);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'booktitle' => 'required',
            'bookauthor' => 'required',
            'price' => 'required',
            'quantity' => 'required'
            //'book_image' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload

        if($request->hasFile('book_image')){
            //file name with extention
            $filenameWithExt = $request->file('book_image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('book_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('book_image')->storeAs('public/book_images', $fileNameToStore);
        
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        //create post
        $sell = Sell::find($id);
        $sell->booktitle = $request->input('booktitle');
        $sell->bookauthor = $request->input('bookauthor');
        $sell->price = $request->input('price');
        $sell->quantity = $request->input('quantity');
        if($request->hasFile('book_image')){
            $post->book_image = $fileNameToStore;
        }
        $sell->save();

        return redirect('/sells')->with('success', 'Book Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sell = Sell::find($id);
        if(auth()->user()->id !==$sell->user_id){
            return redirect('/sells')->with('error', 'Unauthorized Page. You can only make changes in your own post');
        }

        if($sell->book_image != 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/book_images/'.$sell->book_image);

        }
        $sell->delete();
        return redirect('/sells')->with('success', 'Book Removed');
    }
}
