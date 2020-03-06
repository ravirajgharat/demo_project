<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use App\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
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
            $address = Address::where('address', 'LIKE', "%$keyword%")
                ->orWhere('city', 'LIKE', "%$keyword%")
                ->orWhere('state', 'LIKE', "%$keyword%")
                ->orWhere('pin_code', 'LIKE', "%$keyword%")
                ->orWhere('landmark', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $address = Address::latest()->paginate($perPage);
        }

        // $user = Auth::user()->addresses;
        // dd($user);
        $address = Auth::user()->addresses;

        return view('customer.address.index', compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('customer.address.create');
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
            'address' => 'bail|required|string|max:255|min:4',
            'city' => 'bail|required|string|max:255|min:4',
            'state' => 'bail|required|string|max:255|min:4',
            'pin_code' => 'bail|required|integer|digits:6',
            'landmark' => 'bail|required|string|max:255|min:4',
        ]);

        $address = new Address;
        $address->address = $request->address;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->pin_code = $request->pin_code;
        $address->landmark = $request->landmark;
        $address->user_id = Auth::user()->id;
        $address->save();

        return redirect('cust/address')->with('success', 'Address Added Successsfully.');
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
        $address = Address::findOrFail($id);

        return view('customer.address.show', compact('address'));
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
        $address = Address::findOrFail($id);

        return view('customer.address.edit', compact('address'));
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
            'address' => 'bail|required|string|max:255|min:4',
            'city' => 'bail|required|string|max:255|min:4',
            'state' => 'bail|required|string|max:255|min:4',
            'pin_code' => 'bail|required|integer|digits:6',
            'landmark' => 'bail|required|string|max:255|min:4',
        ]);

        $requestData = $request->all();
        $address = Address::findOrFail($id);
        $address->update($requestData);

        return redirect('cust/address')->with('success', 'Address Updated Successsfully.');
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
        Address::destroy($id);

        return redirect('cust/address')->with('success', 'Address Deleted Successsfully.');
    }
}