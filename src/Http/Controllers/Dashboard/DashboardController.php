<?php

namespace Smpl\CoreSdi\http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function hrdlive(){

        $title = "DigiForSDI | Dashboard";

        return view('vendor.coresdi.index',compact('title'));
    }

}
