<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display Wishlist
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $wishlist = Wishlist::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('product_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $wishlist = Wishlist::latest()->paginate($perPage);
        }

        $wishlist = Wishlist::where('user_id', Auth::user()->id)->distinct('product_id')->get();

        return view('customer.wishlist.index', compact('wishlist'));
    }

    /**
     * Add product to wishlist
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store($id)
    {
        Wishlist::create([
            'user_id' => Auth::User()->id,
            'product_id' => $id,
        ]);

        return redirect('cust/shop');
    }

    /**
     * Display the specified product.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return redirect('/cust/product/' . $id);
    }

    /**
     * Remove product from wishlist.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Wishlist::where('product_id', $id)->where('user_id', Auth::user()->id)->delete();

        return redirect('cust/wishlist');
    }
}