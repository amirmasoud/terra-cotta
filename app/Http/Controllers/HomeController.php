<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function get()
    {
        $userCount = User::count();
        $safeCount = Safe::count();

    }
}
