<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $coupon = Coupon::where('coupon_code', 'LIKE', "%$keyword%")
                ->orWhere('discount', 'LIKE', "%$keyword%")
                ->orWhere('format', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $coupon = Coupon::latest()->paginate($perPage);
        }

        return view('admin.coupon.index', compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.coupon.create');
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
        if($request->date == null && $request->time == null) {
            $request->session()->put('expires_at', 'The date and time fields are required.');
        } elseif($request->date == null) {
            $request->session()->put('expires_at', 'The date field is required.');
        } elseif($request->time == null) {
            $request->session()->put('expires_at', 'The time field is required.');
        } else {
            $timestamp = $request->date." ".$request->time;
            if(strtotime($timestamp) < time()) {
                $request->session()->put('expires_at', 'Expiration cannot be in past.');
            }
        }

        $request->validate([
            'coupon_code' => 'bail|required|alpha_num|max:50|min:4|unique:coupons',
            'discount' => 'bail|required|integer',
            'format' => 'required',
            'max_use' => 'bail|required|integer',
        ]);

        if($request->session()->get('expires_at')) {
            return back();
        }

        // $requestData = $request->all();
        
        // Coupon::create($requestData);

        $coupon_code = $request->coupon_code;
        $discount = $request->discount;
        $format = $request->format;
        $expires_at = $timestamp;
        $max_use = $request->max_use;

        DB::select( 'call generate_coupon(?,?,?,?,?)', [$coupon_code, $discount, $format, $expires_at, $max_use] );

        return redirect('admin/coupon')->with('flash_message', 'Coupon added!');
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
        $coupon = DB::select( 'call show_coupon(?)', [$id] )[0];
        //dd($coupon);

        //$coupon = Coupon::findOrFail($id);

        return view('admin.coupon.show', compact('coupon'));
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
        $coupon = Coupon::findOrFail($id);

        return view('admin.coupon.edit', compact('coupon'));
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
        if($request->date == null && $request->time == null) {
            $request->session()->put('expires_at', 'The date and time fields are required.');
        } elseif($request->date == null) {
            $request->session()->put('expires_at', 'The date field is required.');
        } elseif($request->time == null) {
            $request->session()->put('expires_at', 'The time field is required.');
        } else {
            $timestamp = $request->date." ".$request->time;
        }

        //dd($request->coupon_code); 
        $request->validate([
            'coupon_code' => 'bail|required|alpha_num|max:50|min:4|unique:coupons,coupon_code,' . $id,
            'discount' => 'bail|required|integer',
            'format' => 'required',
            'max_use' => 'bail|required|integer',
        ]);

        if($request->session()->get('expires_at')) {
            return back();
        }

        // $requestData = $request->all();
        
        // $coupon = Coupon::findOrFail($id);
        // $coupon->update($requestData);

        //dd($request->coupon_code);
        $coupon_code = $request->coupon_code;
        $discount = $request->discount;
        $format = $request->format;
        $expires_at = $timestamp;
        $max_use = $request->max_use;

        DB::select( 'call update_coupon(?,?,?,?,?,?)', [$coupon_code, $discount, $format, $expires_at, $max_use, $id] );

        return redirect('admin/coupon')->with('flash_message', 'Coupon updated!');
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
        //dd($id);
        DB::statement( 'call delete_coupon(?)', [$id] );

        return redirect('admin/coupon')->with('flash_message', 'Coupon deleted!');
    }
}
