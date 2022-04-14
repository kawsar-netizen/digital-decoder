<?php

namespace App\Http\Controllers\Admin;


use App\Models\Admin\Quote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quote::latest()->paginate(10);
        return view('backend.pages.quote.index',compact('quotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.quote.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =[
            'title' => 'required',
            'description' =>'required'
        ];
        $this->validate($request,$rules);

        $quote_store = new Quote();
        $quote_store->title = $request->input('title');
        $quote_store->description = $request->input('description');
        $quote_store->save();
        return redirect()->route('quote.index')->with('status','Quote Added Succrssfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quote_view = Quote::findOrFail($id);
        return view('backend.pages.quote.show', compact('quote_view'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quote = Quote::findOrFail($id);
        return view('backend.pages.quote.edit',compact('quote'));
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
        $quote = Quote::findOrFail($id);
        $quote->title = $request->input('title');
        $quote->description = $request->input('description');
        $quote->save();
        return redirect()->route('quote.index')->with('status','Quote Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quote_destory = Quote::findOrFail($id);
        $quote_destory->delete();
        return redirect()->back()->with('destory','Quote Deleted Successfully!');
    }
}
