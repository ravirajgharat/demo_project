<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;

class ContactController extends Controller
{
    // Ask Query Form in Contact Us
    public function askQuery() {

        return view('customer.pages.ask_query');

    }

    // Store Query in Table
    public function storeQuery(Request $request) {

        $request->validate([

            'firstname' => 'bail|required|string|max:255|min:4',
            'lastname' => 'bail|required|string|max:255|min:4',
            'email' => 'bail|required|email|max:255|min:4',
            'contact' => 'bail|required|integer|digits:10',
            'query' => 'bail|required|string|min:4',

        ]);
        
        $requestdata = $request->all();
        App\Query::create($requestdata);

        return redirect('cust/contact')->with('success', 'Message Sent Successfully.');

    }

    // Display Queries in Admin
    public function displayQueries(Request $request) {

    $queries = App\Query::paginate(5);

    $keyword = $request->get('search');
    $perPage = 5;

    if (!empty($keyword)) {
        $query = App\Query::where('firstname', 'LIKE', "%$keyword%")
            ->orWhere('lastname', 'LIKE', "%$keyword%")
            ->orWhere('email', 'LIKE', "%$keyword%")
            ->orWhere('contact', 'LIKE', "%$keyword%")
            ->orWhere('query', 'LIKE', "%$keyword%")
            ->latest()->paginate($perPage);
    } else {
        $query = App\Query::latest()->paginate($perPage);
    }

    return view('admin.query.index', compact('query'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function showQuery($id)
    {
        $query = App\Query::findOrFail($id);

        return view('admin.query.show', compact('query'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyQuery($id)
    {
        App\Query::destroy($id);

        return redirect('admin/contact')->with('flash_message', 'Configuration deleted!');
    }

    /**
     * Admin Reply to Query
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function queryReply($id, Request $request)
    {
        $request->validate([

            'reply' => 'bail|required|string|min:4',

        ]);

        $query = App\Query::findOrFail($id);
        $query->reply = $request->reply;
        $query->save();

        return view('admin.query.show', compact('query'));
    }

}