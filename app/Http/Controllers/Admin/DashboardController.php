<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use App\Http\Controllers\Models\UserController as UserController;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->userController = new UserController();
    }
    public function get()
    {
        $user = $this->userController->getById(Auth::user()->id);
        return view('admin.dashboard', [
            "doc_title" => "Dashboard",
            "page_title" => "UC Showroom",
            "user" => $user,
        ]);
    }
    public function post() 
    {
        return redirect('/dashboard');
    }
}
