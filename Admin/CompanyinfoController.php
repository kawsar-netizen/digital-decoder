<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\CompanyInfo;
use App\Http\Controllers\Controller;

class CompanyinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyInfo = CompanyInfo::latest()->paginate(10);
        return view('backend.pages.companyInfo.index', compact('companyInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.companyInfo.create');
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
            'company_location' => 'required',
            'company_email' => 'required',
            'company_call' => 'required',
        ];
        $this->validate($request,$rules);

        $Info_store = new CompanyInfo();
        $Info_store->company_location   = $request->input('company_location');
        $Info_store->company_email      = $request->input('company_email');
        $Info_store->company_call       = $request->input('company_call');
        $Info_store->status             = $request->input('status') == true ? '1' : '0';
        $Info_store->save();
        return redirect()->route('companyInfo.index')->with('status', 'Company Information updated Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Info_edit = CompanyInfo::findOrFail($id);
        return view('backend.pages.companyInfo.edit', compact('Info_edit'));
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
        
        $Info_store = CompanyInfo::findOrFail($id);
        $Info_store->company_location   = $request->input('company_location');
        $Info_store->company_email      = $request->input('company_email');
        $Info_store->company_call       = $request->input('company_call');
        $Info_store->status             = $request->input('status') == true ? '1' : '0';
        $Info_store->save();
        return redirect()->route('companyInfo.index')->with('status', 'Company Information updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
