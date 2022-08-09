<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =  Product::all();
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 'description' => 'required', 'image' => 'required|image|mimes:jpeg,png,svg|max:1024'
        ]);
        
        $products = new Product();

        if ($image = $request->file('image')){
            $storeImage = 'image/';
            $productImage = date('YmdHis').'.'.$image->getClientOriginalName();
            $image->move($storeImage, $productImage);
            $product['image'] = "$productImage";
        }

        $products->name = $request->get('name');
        $products->description = $request->get('description');
        $products->image = date('YmdHis').'.'.$request->image->getClientOriginalName();
        $products->save();

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show')->with('product', $product);
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
        return view('products.edit')->with('product',$product);
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

        $request->validate([
            'name' => 'required', 'description' => 'required'
        ]);

        $product = Product::find($id);

        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->image = $request->get('image');
        $product->save();

        return redirect('/products');
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
        $destination = 'image/'.$product->image;
        if(file_exists(public_path($destination))){
            unlink(public_path($destination));
            }else{
            echo('');
            }
        $product->delete();
        return redirect('products');
    }
}
