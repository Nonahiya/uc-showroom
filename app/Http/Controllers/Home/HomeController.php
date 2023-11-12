<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        
    }
    //
    public function home()
    {
        return view(
            'home.main',
            [
                "doc_title" => "Home",
                "page_title" => "UC Showroom"
            ]
        );
    }
}
