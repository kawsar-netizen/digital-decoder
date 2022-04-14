<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $services = Service::latest()->paginate(10);

        return view('backend.pages.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.service.create');
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
            'title'         => 'required',
            'description'   => 'required',
            'icon'          => 'required'
        ];
        $this->validate($request,$rules);

        $service                = new Service();
        $service->title         = $request->input('title');
        $service->description   = $request->input('description');
        $service->icon          = $request->input('icon');
        $service->status        = $request->input('status') == true ? '1' : '0';
        $service->save();
        return redirect()->route('service.index')->with('status','Service Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serviceShow = Service::findOrFail($id);
        return view('backend.pages.service.show',compact('serviceShow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serviceEdit = Service::findOrFail($id);
        return view('backend.pages.service.edit',compact('serviceEdit'));
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
        $serviceUpdate                = Service::findOrFail($id);
        $serviceUpdate->title         = $request->input('title');
        $serviceUpdate->description   = $request->input('description');
        $serviceUpdate->icon          = $request->input('icon');
        $serviceUpdate->status        = $request->input('status') == true ? '1' : '0';
        $serviceUpdate->save();
        return redirect()->route('service.index')->with('status','Service Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serviceDelete = Service::findOrFail($id);
        $serviceDelete->delete();
        return redirect()->back()->with('destory','Service Deleted Successfully!');
    }
}
