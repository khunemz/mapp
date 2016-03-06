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
     * 1. validate input data
     * 2. Store input image to a variable call $file
     * 3. Get original client name to name storing image
     * 4. Move image to given File path with original name
     * 5. Instantiate imageObje
     * 6. In order to store file path on 'image' column
     * 7. Instantiate Product object
     * 8. In order to store product input in it
     * 9. Save $product first , it will return $product
     *  , including id
     * 10. Create image which matches to returned id
     *  from $product , which saved before via create method.
     * 11. redirect
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response $product
     */
    public function store(Request $request)
    {
        //Validate $request
        $this->validate($request,[
            'productTitle' => 'required|max:255',
            'productCaption' => 'required|max:1000',
            'price' => 'required',
            'category' => 'required',
            'image[]' => 'mimes:jpeg,png'
        ]);


        //instantiate Image (has-many) object
        $imageObj = new \App\Image();
        $img[] = $imageObj->image;
        $uploadcount=0;
        //Store request image file on $file
        $files = $request->file('image');
        $files_count = count($files);
        foreach($files as $file){
            $filePath = $file->getClientOriginalName();
            $file->move(public_path() . '/uploads/', $filePath);
            $img[$uploadcount] = $filePath;
            $uploadcount ++;
        }


        //Match table column to data input name
        $product = new Product();
        $product->productTitle = $request->productTitle;
        $product->productCaption = $request->productCaption;
        $product->price = $request->price;
        $product->category = $request->category;
        //Store to database
        $product->save();

        for($i=0; $i < $files_count; $i++){
            $product->images()->create([
                'image' => $img[$i],
                'product_id' => $product->id
            ]);
        }

        return view('product.show')->with([
            'product'=> $product
            ]);
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
            'category' => 'required',
            'image[]' => 'mimes:jpeg,png'

        ]);

        //instantiate Image (has-many) object
        $imageObj = new \App\Image();
        $img[] = $imageObj->image;
        $uploadcount=0;
        //Store request image file on $file
        $files = $request->file('image');
        $files_count = count($files);
        foreach($files as $file){
            $filePath = $file->getClientOriginalName();
            $file->move(public_path() . '/uploads/', $filePath);
            $img[$uploadcount] = $filePath;
            $uploadcount ++;
        }

        $product = Product::find($id);
        $product->productTitle = $request->productTitle;
        $product->productCaption = $request->productCaption;
        $product->price = $request->price;
        $product->category = $request->category;


        $product->save();

        for($i=0; $i < $files_count; $i++){
            $product->images()->update([
                'image' => $img[$i],
                'product_id' => $product->id
            ]);
        }

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
        $product->images()->delete();
        $product->delete();
        return redirect()->route('product.index');
    }


}
