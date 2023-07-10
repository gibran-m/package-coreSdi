<?php

namespace Bjbs\CoreSdi\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function hrdlive(){
        dd("yaya");

        $title = "DigiForSDI | Dashboard";

        return view('vendor.coreSdi.dashboard.index',compact('title'));
    }

}
