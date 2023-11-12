<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use App\Http\Controllers\Models\UserController as UserController;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->userController = new UserController();
    }
    public function get() 
    {
        $user = $this->userController->getById(Auth::user()->id);
        return view('profile.profile', [
            "doc_title" => "Profile",
            "page_title" => "UC Showroom",
            "user" => $user,
        ]);
    }
    public function post() 
    {
        return redirect('/profile');
    }
}
