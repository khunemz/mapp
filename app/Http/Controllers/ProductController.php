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
        $this->middleware('admin', ['except' => ['index' , 'show']]);
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
            return view('/product', [
                'products' => $products
            ]);
        }
        $message = "Whoopss something went wrong, please try again.";
        return redirect()->route('/')->with(['message' => $message]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
