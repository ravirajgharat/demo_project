<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use App;
use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {   

        // $file = new Filesystem;
        // $file->cleanDirectory('storage/uploads');

        $keyword = $request->get('search');
        $perPage = 3;

        if (!empty($keyword)) {
            $banner = Banner::where('bannername', 'LIKE', "%$keyword%")
                ->orWhere('bannerimage', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $banner = Banner::latest()->paginate($perPage);
        }
        
        return view('admin.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $cats = App\Category::with('categories')->get();
        $categories = array();
        foreach ($cats as $cat) {
            if(! $cat->categories->count()) {
                $categories[] = $cat;
            }
        }

        return view('admin.banner.create', compact('categories'));
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
            'bannername' => 'bail|required|unique:banners|string|max:255|min:4',
            'bannerimage' => 'bail|required|image|max:2048',
            'categories' => 'required'
        ]);

        $requestData = $request->all();
        if ($request->hasFile('bannerimage')) {
            $requestData['bannerimage'] = $request->file('bannerimage')->store('uploads/banners', 'public');
        }
        Banner::create([
            'bannername' => $requestData['bannername'],
            'bannerimage' => $requestData['bannerimage'],
            'category_id' => $requestData['categories'],
        ]);

        return redirect('admin/banner')->with('flash_message', 'Banner added!');
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
        $banner = Banner::findOrFail($id);

        return view('admin.banner.show', compact('banner'));
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
        $banner = Banner::findOrFail($id);
        $cats = App\Category::with('categories')->get();
        $categories = array();
        foreach ($cats as $cat) {
            if(! $cat->categories->count()) {
                $categories[] = $cat;
            }
        }

        return view('admin.banner.edit', compact('banner', 'categories'));
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
            'bannername' => 'bail|required|string|max:255|min:4|unique:banners,bannername,' . $id,
            'bannerimage' => 'bail|image|max:2048',
            'categories' => 'required'
        ]);

        $requestData = $request->all();
        if ($request->hasFile('bannerimage')) {
            $requestData['bannerimage'] = $request->file('bannerimage')->store('uploads/banners', 'public');
        }
        $banner = Banner::findOrFail($id);
        if ($request->hasFile('bannerimage')) {
            Storage::delete('public/' . $banner->bannerimage);
            $banner->bannername = $request->bannername;
            $banner->bannerimage = $requestData['bannerimage'];
            $banner->category_id = $request->categories;
            $banner->save();
        } else {           
            $banner->bannername = $request->bannername;
            $banner->category_id = $request->categories;
            $banner->save();
        }

        return redirect('admin/banner')->with('flash_message', 'Banner updated!');
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
        $banner = Banner::findOrFail($id);
        Storage::delete('public/' . $banner->bannerimage);
        Banner::destroy($id);
        return redirect('admin/banner')->with('flash_message', 'Banner deleted!');
    }
}