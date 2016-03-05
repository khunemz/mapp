<?php

namespace App\Http\Controllers;

use Faker\Provider\Image;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades;

class ProductController extends Controller
{

    /**
     * Constructor
     * Authorize action , except index, show
     */
//    public function __construct(){
//        $this->middleware('admin', ['only' => ['store' ,
//            'update' , 'destroy' ]]);
//    }
    /**
     * Display a listing of the resource.
     * 'products' is something which carry
     * $products data to the view
     * @return view otherwise redirect to /
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get()->take(40);
        if($products!=null){
            return
                view('product.index', [
                'products' => $products
            ]);
        }
        $message = "Whoopss something went wrong, please try again.";
        return redirect()->route('/product')->with(['message' => $message]);

    }

    /**
     * Show the form for creating.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate $request
        $this->validate($request,[
            'productTitle' => 'required|max:255',
            'productCaption' => 'required|max:1000',
            'price' => 'required',
            'category' => 'required',
            'image' => 'mimes:jpeg,png'
        ]);

        //Store $request to database
        $product = new Product();
        //store request image file on $file
        $file = $request->file('image');
        //get image file name
        $fileName = $file->getClientOriginalName('image');
        //Match table column to data input name
        $product->productTitle = $request->productTitle;
        $product->productCaption = $request->productCaption;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->images()->image = $fileName;

        //move file to public/uploads
        $file->move( public_path() . '/uploads/');

        //Check success and redirect
        if($product->save()){
        return redirect()->route('product.index')->with(['product'=> $product]);
        }
    }

    /**
     * Show data with ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show', [
            'product' => $product
        ]);
    }

    /**
     * Show edit form with retrieved specific data.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', [
            'product' => $product
        ]);
    }

    /**
     * Find record by id then assign request to Product instance
     * and store to database. Finally , redirect to @show.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'productTitle' => 'required|max:255',
            'productCaption' => 'required|max:1000',
            'price' => 'required',
            'category' => 'required'
        ]);
        $product = Product::find($id);
        $product->productTitle = $request->productTitle;
        $product->productCaption = $request->productCaption;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->save();

        return view('product.show', [
            'product' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index');
    }


}
