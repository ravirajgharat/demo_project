<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    /**
     * Search Products
     *
     * Search Input in Front end
     */
    public function searchProducts(Request $request) {
    	
    	if($request->ajax())
     	{
			$output = '';
			$total_row = 0;
			$search = $request->get('search');
			if($search != '') {
				$data = Product::where('product_name', 'like', '%'. $search .'%')->get();
				$total_row = $data->count();
			}
			$count = 0;
			if($total_row > 0)	{
				foreach($data as $row) {
					$url = 'http://localhost/demo_project/public/cust/product/' . $row->id;
					$name = $row->product_name;
					$output .= '<li><a class="pull-right" style="background:#F0F0E9;color: #666;" href="' . $url . '">' . $name . '</a></li>';
					if(++$count >= 4) {
						break;
					}
				}
			}
			$data = array(
				'table_data'  => $output,
			);
			echo json_encode($data);
		}

    }
}
