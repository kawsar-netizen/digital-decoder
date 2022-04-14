<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $testimonial = Testimonial::latest()->paginate(10);

        return view('backend.pages.testimonial.index',compact('testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.testimonial.create');
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
            'name'          => 'required',
            'title'         => 'required',
            'designation'          => 'required',
            'email'         => 'required',
            'phone'          => 'required',
            'image'         => 'required'
        ];

        $this->validate($request,$rules);

        $testimonial_store = new Testimonial();
        $testimonial_store->title = $request->input('title');
        $testimonial_store->name = $request->input('name');
        $testimonial_store->designation = $request->input('designation');
        $testimonial_store->email = $request->input('email');
        $testimonial_store->phone = $request->input('phone');
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/testimonial/', $filename);
            $testimonial_store->image = $filename;
        }
        $testimonial_store->status = $request->input('status') == true ? '1' : '0';
        $testimonial_store->save();
        return redirect()->route('testimonial.index')->with('status', 'Testimonial Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimonial_Show = Testimonial::findOrFail($id);
        return view('backend.pages.testimonial.show',compact('testimonial_Show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial_edit = Testimonial::findOrFail($id);
        return view('backend.pages.testimonial.edit',compact('testimonial_edit'));
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
        $slider = Testimonial::findOrFail($id);
        $slider->name = $request->input('name');
        $slider->title = $request->input('title');
        $slider->designation = $request->input('designation');
        $slider->email = $request->input('email');
        $slider->phone = $request->input('phone');
        if ($request->hasfile('image')) {
            $destination = 'uploads/testimonial' . $slider->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/testimonial/', $filename);
            $slider->image = $filename;
        }
        $slider->status = $request->input('status') == true ? '1' : '0';
        $slider->save();
        return redirect()->route('testimonial.index')->with('status', 'Testimonial updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial_destroy = Testimonial::findOrFail($id);
        $testimonial_destroy->delete();
        return redirect()->back()->with('destory','Testimonial Deleted Successfully!');
    }
}
