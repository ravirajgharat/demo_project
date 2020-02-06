<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App;
use App\Product;
use App\Product_image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $product = Product::where('product_name', 'LIKE', "%$keyword%")
                ->orWhere('product_description', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $product = Product::latest()->paginate($perPage);
        }

        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   
        $categories = App\Category::orderBy('categoryname')->get();
        $parameters = App\Product_parameter::distinct()->get(['product_parameter']);

        return view('admin.product.create', compact('categories', 'parameters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'product_name' => 'bail|required|string|max:255|min:4',
            'product_description' => 'bail|required|string|min:4',
            'price' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'product_brand' => 'bail|required|string|max:255|min:4',
            //'product_image' => 'bail|required|image|max:2048',
            'parameter' => 'required',
            'categories'=> 'required',
        ]);
        //dd($request->product_image);


        //dd($request->parameter);

        $product = new Product;
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->price = $request->price;
        $product->category_id = $request->categories;
        $product->save();
        
        // $img = [];
        // foreach($request->file('product_image') as $im) {
        //     $img[] = $im;
        // }
        
        // $product->categories()->attach($request->categories);
        // if ($request->hasFile('product_image')) {
        //     $product->images()->save(new App\Product_image($img));
        // }
        //$product->parameters()->save($request->parameters);

        if($request->hasFile('product_image')) {
            foreach($request->file('product_image') as $image) {
                // $destinationPath = storage_path() . '/products/images/';
                // $filename = $image->getClientOriginalName();
                // $image->move($destinationPath, $filename);
                
                $filename = $image->store('uploads/products/images', 'public');

                $image = new Product_image([
                    'product_image' => $filename,
                ]);
        
                $product->images()->save($image);
            }
        }

        foreach($request->parameter as $param) {
            $params = new App\Product_parameter([
                'product_parameter' => $param,
            ]);
            $product->images()->save($params);
        }

        return redirect('admin/product')->with('flash_message', 'Product added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        
        $product = Product::findOrFail($id);
        $categories = App\Category::orderBy('categoryname')->get();
        $parameters = App\Product_parameter::distinct()->get(['product_parameter']);

        return view('admin.product.edit', compact('product', 'categories', 'parameters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        //dd($request->product_image);

        $request->validate([
            'product_name' => 'bail|required|string|max:255|min:4',
            'product_description' => 'bail|required|string|min:4',
            'price' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'product_brand' => 'bail|required|string|max:255|min:4',
            //'product_image' => 'bail|image|max:2048',
            'categories' => 'required',
            'parameter' => 'required',
        ]);

        //dd($request->categories);
        $product = Product::findOrFail($id);
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->price = $request->price;
        $product->category_id = $request->categories;
        $product->save();

        // if($request->hasFile('product_image')) {
        //     //Product_image::where('product_id', $id)->delete();
        //     foreach($request->file('product_image') as $image) {
                
        //         $filename = $image->store('uploads/products/images', 'public');

        //         $image = new Product_image([
        //             'product_image' => $filename,
        //         ]);
        
        //         $product->images()->save($image);
        //     }
        // }

        if($request->hasFile('product_image')) {
            foreach($request->file('product_image') as $image) {
                
                $filename = $image->store('uploads/products/images', 'public');

                $image = new Product_image([
                    'product_image' => $filename,
                ]);
        
                $product->images()->save($image);
            }
        }

        //App\Product_parameter::where('product_id', $id)->delete();
        foreach($request->parameter as $param) {
            $params = new App\Product_parameter([
                'product_parameter' => $param,
            ]);
            $product->images()->save($params);
        }

        return redirect('admin/product')->with('flash_message', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Product::destroy($id);
        Product_image::where('product_id', $id)->delete();
        App\Product_parameter::where('product_id', $id)->delete();

        return redirect('admin/product')->with('flash_message', 'Product deleted!');
    }
}
