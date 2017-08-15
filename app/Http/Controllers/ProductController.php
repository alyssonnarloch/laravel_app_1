<?php

namespace App\Http\Controllers;

use App\Product;
use Validator;
//use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //raw query
        //$products = DB::select('SELECT * FROM products');

        //active record
        //$products = Product::where('name', 'LIKE', "%{$request->name}%")
        //                        ->orderBy('name', 'asc')
        //                        ->get();


        $products = Product::where('name', 'LIKE', "%{$request->name}%")
                                ->orderBy('id', 'asc')
                                ->paginate(5);
        
        //$products = Product::where('stock_amount', '>', 0)->get();

        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create', ['product' => new Product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products|max:255',
            'stock_amount' => 'required|numeric',
            'price' => 'required',
        ]);

        $product = new Product;

        $product->name = $request->name;
        $product->stock_amount = $request->stock_amount;
        $product->price = $request->price;

        $product->save();

        return redirect('product/index');
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
        $product = Product::find($id);

        return view('products.edit', ['product' => $product]);
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
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                Rule::unique('products')->ignore($id),
                'max:255'
            ],
            'stock_amount' => 'required|numeric|min:1',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('product/edit/' . $id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $product = Product::find($id);

        $product->name = $request->name;
        $product->stock_amount = $request->stock_amount;
        $product->price = $request->price;

        $product->save();

        return redirect('product/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect('product/index');
    }

}
