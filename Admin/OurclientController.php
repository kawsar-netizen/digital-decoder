<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Ourclient;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class OurclientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client_index = Ourclient::latest()->paginate(10);
        return view('backend.pages.ourclient.index',compact('client_index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.ourclient.create');
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
            'image'         => 'required',
            
        ];

        $this->validate($request,$rules);

        $our_client = new Ourclient();
        $our_client->title = $request->input('title');
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/client/', $filename);
            $our_client->image = $filename;
        }
        $our_client->status = $request->input('status') == true ? '1' : '0';
        $our_client->save();
        return redirect()->route('ourclient.index')->with('status', 'Our Client Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client_show = Ourclient::findOrFail($id);
        return view('backend.pages.ourclient.show',compact('client_show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client_edit = Ourclient::findOrFail($id);
        return view('backend.pages.ourclient.edit',compact('client_edit'));
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
        $client_update = Ourclient::findOrFail($id);
        $client_update->title = $request->input('title');
        if ($request->hasfile('image')) {
            $destination = 'uploads/client' . $client_update->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/client/', $filename);
            $client_update->image = $filename;
        }
        $client_update->status = $request->input('status') == true ? '1' : '0';
        $client_update->save();
        return redirect()->route('ourclient.index')->with('status', 'Our Client updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client_destroy = Ourclient::findOrFail($id);
        $client_destroy->delete();
        return redirect()->back()->with('destory','Our Client Deleted Successfully!');
    }
}
