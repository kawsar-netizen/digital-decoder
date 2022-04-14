<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutFeature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutfeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutFeature = AboutFeature::latest()->paginate(10);

        return view('backend.pages.about.feature.index', compact('aboutFeature'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.about.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required',
        ];
        $this->validate($request, $rules);
        $aboutFeature = new AboutFeature();
        $aboutFeature->title = $request->input('title');
        $aboutFeature->description = $request->input('description');
        $aboutFeature->icon = $request->input('icon');
        $aboutFeature->status = $request->input('status') == true ? '1' : '0';
        $aboutFeature->save();
        return redirect()->route('aboutfeature.index')->with('status', 'About Feature Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $featureShow = AboutFeature::findOrFail($id);
        return view('backend.pages.about.feature.show', compact('featureShow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $featureEdit = AboutFeature::findOrFail($id);

        return view('backend.pages.about.feature.edit', compact('featureEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
            $feature_updated = AboutFeature::findOrFail($id);
            $feature_updated->title = $request->input('title');
            $feature_updated->description = $request->input('description');
            $feature_updated->icon = $request->input('icon');
            $feature_updated->status = $request->input('status') == true ? '1' : '0';
            $feature_updated->save();
            return redirect()->route('aboutfeature.index')->with('status', 'About Feature Update Successfully!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aboutFeature = AboutFeature::findOrFail($id);
        $aboutFeature->delete();
        return redirect()->back()->with('destory', 'About Feature Deleted Successfully!');
    }
}
