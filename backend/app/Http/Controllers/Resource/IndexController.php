<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Traits\ResourceModel;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    use ResourceModel;

    public function index(Request $request)
    {
        return ResourceModel::get();
    }
}
