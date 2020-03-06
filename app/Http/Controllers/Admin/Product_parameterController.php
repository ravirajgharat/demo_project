<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Product_parameter;
use Illuminate\Http\Request;

class Product_parameterController extends Controller
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
            $product_parameter = Product_parameter::where('product_parameter', 'LIKE', "%$keyword%")
                ->orWhere('product_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $product_parameter = Product_parameter::latest()->paginate($perPage);
        }

        return view('admin.product_parameter.index', compact('product_parameter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.product_parameter.create');
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
            'product_parameter' => 'bail|required|unique:product_parameters|string|min:4',
        ]);

        $requestData = $request->all();
        Product_parameter::create($requestData);

        return redirect('admin/product_parameter')->with('flash_message', 'Product_parameter added!');
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
        $product_parameter = Product_parameter::findOrFail($id);

        return view('admin.product_parameter.show', compact('product_parameter'));
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
        $product_parameter = Product_parameter::findOrFail($id);

        return view('admin.product_parameter.edit', compact('product_parameter'));
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
        $request->validate([
            'product_parameter' => 'bail|required|string|max:255|min:4|unique:product_parameters,product_parameter,' . $id,
        ]);

        $requestData = $request->all();
        $product_parameter = Product_parameter::findOrFail($id);
        $product_parameter->update($requestData);

        return redirect('admin/product_parameter')->with('flash_message', 'Product_parameter updated!');
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
        Product_parameter::destroy($id);

        return redirect('admin/product_parameter')->with('flash_message', 'Product_parameter deleted!');
    }
}