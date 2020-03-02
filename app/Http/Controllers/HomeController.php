<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Carbon\Carbon;
use App\Charts\UserChart;
use App\Charts\OrderChart;
use App\Charts\SaleChart;
use App\Charts\CouponChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }

    public function dashboard()
    {
        $orders = App\Order::where('created_at', '>', Carbon::today()->subDays(30))->count();
        $users = App\User::where('created_at', '>', Carbon::today()->subDays(30))->count();
        $coupons = App\Order::where('created_at', '>', Carbon::today()->subDays(7))->where('discount', '!=', '0')->count();


        $sales1 = App\Order::where('created_at', '>', Carbon::today()->subDays(5))->sum('order_price');
        $sales2 = App\Order::where('created_at', '>', Carbon::today()->subDays(10))->sum('order_price') - $sales1;
        try {
            $sales = ($sales1 - $sales2) / $sales2 * 100;
            $sales = round($sales, 2);
        } catch(\Exception $e) {
            $sales = 0;
        }

        // User Chart - Bar
        $user = App\User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');


        $userChart = new UserChart;

        $userChart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);

        $userChart->dataset('New Users', 'bar', $user)->options([

            'fill' => 'true',
            'backgroundColor' => '#5cb85c',
            'borderColor' => '#5cb85c'

        ]);

        // Order Chart - Bar
        $order = App\Order::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');

                    
        $orderChart = new OrderChart;

        $orderChart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);

        $orderChart->dataset('Orders Placed', 'line', $order)->options([

            'fill' => 'true',
            'borderColor' => '#0275d8',
            'backgroundColor' => '#0275d8'

        ]);

        // Sales Chart - Line
        $sale = App\Order::select(\DB::raw("SUM(order_price) as sum"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('sum');


        $saleChart = new SaleChart;

        $saleChart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);

        $saleChart->dataset('Sales', 'line', $sale)->options([

            'fill' => 'true',
            'borderColor' => '#111111',
            'backgroundColor' => '#111111'

        ]);

        // Coupons Chart - Pie
        $coupon = App\order::select(\DB::raw("COUNT(*) as count"))
                    ->groupBy(\DB::raw("coupon"))
                    ->pluck('count');
        $l = App\Order::select('coupon')->distinct()->orderBy('coupon')->get();

        foreach($l as $item) {
            $list[] = $item->coupon;
        }

        $couponChart = new CouponChart;

        $couponChart->labels($list);

        $couponChart->dataset('Cuopons Used', 'pie', $coupon)->options([

            'backgroundColor' => [  
                '#52D726', '#FFEC00', '#FF7300', '#FF0000', '#ff00ff', '#007ED6', '#7CDDDD',
            ],
            'borderColor' => '#eee'

        ]);
                    
        return view('dashboard', compact('orders', 'sales', 'users', 'coupons', 'userChart', 'orderChart', 'saleChart', 'couponChart'));
    }

    public function unauthorized()
    {
        return view('customer.pages.not_found');
    }

}
