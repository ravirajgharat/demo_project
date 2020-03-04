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
			if($total_row > 0)	{
				foreach($data as $row) {
					$output .= '<li>' . $row->product_name . '</li>';
				}
			}
			$data = array(
				'table_data'  => $output,
			);
			echo json_encode($data);
		}

    }
}
