<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Front;
use App\Models\Service;
use App\Models\Admin\Quote;
use App\Models\AboutFeature;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use App\Models\Admin\Contact;
use App\Models\Admin\Portfolio;
use App\Models\Admin\CompanyInfo;
use App\Models\Admin\Ourclient;
use App\Models\Admin\Servicefeature;
use App\Models\Admin\Testimonial;

class FrontController extends Controller
{

    //Home Page Controller Here..........

    public function index()
    {
        $sliderItem  = Slider::where('status', 1)->latest()->get();

        $quoteItem   = Quote::latest()->first();

        $serviceItem = Service::where('status', 1)->limit(6)->latest()->get();

        $portfolioItem = Portfolio::where('project_status',1)->limit(6)->latest()->get();

        $ourclientItem = Ourclient::where('status',1)->limit(8)->latest()->get();

        return view('front.index', compact('sliderItem', 'quoteItem', 'serviceItem','portfolioItem','ourclientItem'));
    }

    public function showRead($slug)
    {

        $readSlug = Slider::where("slug", $slug)->first();

        $recentpost = Slider::where('status', 1)->limit(5)->latest()->get();

        return view('front.readmore', compact('readSlug', 'recentpost'));
    }

    //About Page Controller Here..........

    public function about()
    {
        $aboutItem = About::where('status', 1)->latest()->first();
        $featureItem = AboutFeature::where('status', 1)->limit(4)->latest()->get();
        return view('front.about', compact('aboutItem', 'featureItem'));
    }

    //Service Page Controller Here..........

    public function service()
    {
        $serviceItem = Service::where('status', 1)->limit(6)->latest()->get();
        $serviceFeature = Servicefeature::where('status',1)->first();

        return view('front.service',compact('serviceItem','serviceFeature'));
    }

    public function testimonial()
    {
        $testimonialItem = Testimonial::where('status',1)->limit(2)->latest()->get();
        
        return view('front.testimonial',compact('testimonialItem'));
    }

    public function portfolio()
    {
        $portfolioItem = Portfolio::where('project_status',1)->latest()->get();
        // return $portfolioItem;
        // $portfolioWeb = Portfolio::where('project_type','web')->latest()->get();
        // $portfolioApp = Portfolio::where('project_type','app')->latest()->get();
        return view('front.portfolio',compact('portfolioItem'));
    }

    public function contact()
    {
        $company_info = CompanyInfo::where('status',1)->latest()->first();
        // return $company_info;
        
        return view('front.contact',compact('company_info'));
    }

    // public function store(Request $request){

    //     $Info_store = new Contact();
    //     $Info_store->client_name = $request->input('client_name');
    //     $Info_store->client_email = $request->input('client_email');
    //     $Info_store->client_subject = $request->input('client_subject');
    //     $Info_store->client_message = $request->input('client_message');
    //     $Info_store->save();

    //     return redirect()->route('about');
    // }

    public function blog()
    {
        return view('front.blog');
    }
}
