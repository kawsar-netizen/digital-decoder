<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Servicefeature;

class ServicefeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_feature = Servicefeature::latest()->paginate(10);

        return view('backend.pages.servicefeature.index', compact('service_feature'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.servicefeature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $roles = [
            'tilte' => 'required',
            'description' => 'required',
        ];

        $feature_store = new Servicefeature();
        $feature_store->tilte = $request->input('tilte');
        $feature_store->description = $request->input('description');
        $feature_store->status = $request->input('status')== true ? '1' : '0';
        $feature_store->save();
        return redirect()->route('servicefeature.index')->with('status', 'Service Feature Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feature_show = Servicefeature::findOrFail($id);
        return view('backend.pages.servicefeature.show',compact('feature_show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feature_show = Servicefeature::findOrFail($id);
        return view('backend.pages.servicefeature.edit',compact('feature_show'));
        
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
        
        $feature_store = Servicefeature::findOrFail($id);
        $feature_store->tilte = $request->input('tilte');
        $feature_store->description = $request->input('description');
        $feature_store->status = $request->input('status')== true ? '1' : '0';
        $feature_store->save();
        return redirect()->route('servicefeature.index')->with('status', 'Service Feature Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature_destroy = Servicefeature::findOrFail($id);
        $feature_destroy->delete();
        return redirect()->back()->with('destory','Service Feature Deleted Successfully!');
    }
}
