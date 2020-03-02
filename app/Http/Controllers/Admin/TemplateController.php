<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
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
            $template = Template::where('template_name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $template = Template::latest()->paginate($perPage);
        }

        return view('admin.template.index', compact('template'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.template.create');
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
        
        // $requestData = $request->all();
        
        // Template::create($requestData);

        // Template::create([

        //     'template_name' => $request->template_name,
        //     'template' => $request->template,

        // ]);

        $template = new Template;
        $template->template_name = $request->template_name;
        $template->template = $request->template;
        $template->save();

        return redirect('admin/template')->with('flash_message', 'Template added!');
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
        $template = Template::findOrFail($id);

        return view('admin.template.show', compact('template'));
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
        $template = Template::findOrFail($id);

        return view('admin.template.edit', compact('template'));
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
        
        $template = Template::findOrFail($id);
        $template->template_name = $request->template_name;
        $template->template = $request->template;
        $template->save();

        return redirect('admin/template')->with('flash_message', 'Template updated!');
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
        Template::destroy($id);

        return redirect('admin/template')->with('flash_message', 'Template deleted!');
    }
}
