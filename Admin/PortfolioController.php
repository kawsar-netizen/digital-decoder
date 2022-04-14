<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Portfolio;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio = Portfolio::latest()->paginate(10);
        return view('backend.pages.portfolio.index', compact('portfolio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.portfolio.create')->with('status', 'Portfolio Added Successully!');
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
            'project_titel' => 'required',
            'project_type' => 'required',
            'project_link' => 'required',
            'project_image' => 'required',
        ];
        $this->validate($request,$rules);

        $portfolio_store = new Portfolio();
        $portfolio_store->project_titel = $request->input('project_titel');
        $portfolio_store->project_type = $request->input('project_type');
        $portfolio_store->project_link = $request->input('project_link');
        if ($request->hasfile('project_image')) {
            $file = $request->file('project_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/portfolio/', $filename);
            $portfolio_store->project_image = $filename;
        }
        $portfolio_store->project_status = $request->input('project_status') == true ? '1' : '0';
        $portfolio_store->save();
        return redirect()->route('company_portfolio.index')->with('status', 'Portfolio Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portfolio_show = Portfolio::findOrFail($id);
        return view('backend.pages.portfolio.show',compact('portfolio_show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolio_edit = Portfolio::findOrFail($id);
        return view('backend.pages.portfolio.edit',compact('portfolio_edit'))->with('status','Portfolio Updated Successfully!');
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
         $rules = [
            'project_titel' => 'required',
            'project_type' => 'required',
            'project_image' => 'required',
         ];
         $this->validate($request,$rules);
        
        $portfolio_store = Portfolio::findOrFail($id);
        $portfolio_store->project_titel = $request->input('project_titel');
        $portfolio_store->project_type = $request->input('project_type');
        $portfolio_store->project_link = $request->input('project_link');
        if ($request->hasfile('project_image')) {
            $destination = 'uploads/portfolio' . $portfolio_store->project_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('project_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/portfolio/', $filename);
            $portfolio_store->project_image = $filename;
        }
        $portfolio_store->project_status = $request->input('project_status') == true ? '1' : '0';
        $portfolio_store->update();
        return redirect()->route('company_portfolio.index')->with('status', 'Portfolio Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio_destroy = Portfolio::findOrFail($id);
        $portfolio_destroy->delete();
        return redirect()->back()->with('destory','Portfolio Deleted Successfully!');
    }
}
