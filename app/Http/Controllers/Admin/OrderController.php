<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App;
use App\Order;
use App\Order_detail;

use Illuminate\Http\Request;

class OrderController extends Controller
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
            $order = Order::with('user')
                ->where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('order_status', 'LIKE', "%$keyword%")
                ->orWhere('payment_mode', 'LIKE', "%$keyword%")
                ->orWhere('order_price', 'LIKE', "%$keyword%")
                ->orWhere('coupon', 'LIKE', "%$keyword%")
                ->orWhere('discount', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $order = Order::with('user')->latest()->paginate($perPage);
        }

        return view('admin.order.index', compact('order'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\View\View
    //  */
    // public function create()
    // {
    //     return view('admin.order.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param \Illuminate\Http\Request $request
    //  *
    //  * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    //  */
    // public function store(Request $request)
    // {
        
    //     $requestData = $request->all();
        
    //     Order::create($requestData);

    //     return redirect('admin/order')->with('flash_message', 'Order added!');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $order = Order::with('user', 'details', 'address')->findOrFail($id);

        return view('admin.order.show', compact('order'));
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
        $order = Order::findOrFail($id);

        return view('admin.order.edit', compact('order'));
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
        
        $requestData = $request->all();
        
        $order = Order::findOrFail($id);
        $order->update($requestData);

        /**
         * Event : OrderPlaced($order)
         * Listener Action : Send Order Placed Mail to Customer and Admin
         */
        event(new App\Events\OrderStatusChanged($order));

        return redirect('admin/order')->with('flash_message', 'Order updated!');
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

        Order::destroy($id);

        return redirect('admin/order')->with('flash_message', 'Order deleted!');
    }
}
