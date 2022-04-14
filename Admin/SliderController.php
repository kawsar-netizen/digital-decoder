<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->paginate(10);
        return view('backend.pages.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('backend.pages.slider.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title'         => 'required',
            'description'   => 'required',
            'slug'          =>'required',
            'image'         => 'image'
        ];

        $this->validate($request,$rules);

        $slider = new Slider();
        $slider->title = $request->input('title');
        $slider->description = $request->input('description');
        $slider->link = $request->input('link');
        $slider->link_name = $request->input('link_name');
        $slider->slug = $request->input('slug');
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/slider/', $filename);
            $slider->image = $filename;
        }
        $slider->status = $request->input('status') == true ? '1' : '0';
        $slider->save();
        return redirect()->route('home.slider')->with('status', 'Slider Added Successfully!');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.pages.slider.edit', compact('slider'));
    }

    public function view($id)
    {
        $slider_view = Slider::findOrFail($id);
        return view('backend.pages.slider.view', compact('slider_view'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $slider->title = $request->input('title');
        $slider->description = $request->input('description');
        $slider->link = $request->input('link');
        $slider->link_name = $request->input('link_name');
        $slider->slug = $request->input('slug');
        if ($request->hasfile('image')) {
            $destination = 'uploads/slider' . $slider->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/slider/', $filename);
            $slider->image = $filename;
        }
        $slider->status = $request->input('status') == true ? '1' : '0';
        $slider->save();
        return redirect()->route('home.slider')->with('status', 'Slider updated Successfully!');
    }

    public function destory($id)
    {
        $destory_slider = Slider::findOrFail($id);
        $destory_slider->delete();
        return redirect()->back()->with('destory', 'Slider Deleted Successfully!');
    }
}
