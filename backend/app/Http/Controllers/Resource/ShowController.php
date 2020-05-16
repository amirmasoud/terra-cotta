<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Traits\ResourceModel;
use Illuminate\Http\Request;
use ReflectionClass;
use ReflectionClassConstant;

class ShowController extends Controller
{
    use ResourceModel;

    public function __invoke(Request $request)
    {
        return ResourceModel::findOrFail($request->id)->first();
    }
}
