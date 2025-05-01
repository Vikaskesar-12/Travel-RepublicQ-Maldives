<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Tour;
// use App\Models\Booking;
// use App\Models\Enquiry;
use App\Models\WebsiteTraffic;

class DashboardController extends Controller
{
    public function index(){
        $totalBlogs = Blog::count();
        $totalTourPackages = Tour::count();
        // $totalBookings = Booking::count();
        // $totalEnquiries = Enquiry::count();

        return view('backend.admin.dashboard', compact('totalBlogs', 'totalTourPackages',));
    }



public function getWebsiteTraffic()
    {
        $trafficData = WebsiteTraffic::select('visitors as value', 'source as name')->get();
        return response()->json($trafficData);
    }

}
