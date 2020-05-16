<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Traits\ResourceModel;

class ShowController extends Controller
{
    use ResourceModel;

    public function index()
    {
        return ResourceModel::paginate();
    }
}
