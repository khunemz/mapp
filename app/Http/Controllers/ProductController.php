<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;

class ProductController extends Controller
{

    /**
     * Constructor
     * Authorize action , except index, show
     */
    public function __construct(){
        $this->middleware('admin', ['only' => ['store' ,
            'update' , 'destroy' ]]);
    }
    /**
     * Display a listing of the resource.
     * 'products' is something which carry
     * $products data to the view
     * @return view otherwise redirect to /
     */
    public function index()
    {
        $products = Product::all()->take(10);
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
        //
    }

    /**
     * Show data with ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* todo change 2 to $id */
        $product = Product::find('2');
        return view('product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
