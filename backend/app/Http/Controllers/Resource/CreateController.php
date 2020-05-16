<?php

namespace App\Http\Controllers\Resource;

use Illuminate\Http\Request;
use App\Traits\ResourceModel;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    use ResourceModel;

    public function __invoke(Request $request)
    {
        $model = new ResourceModel();

        $model->save($request->all());

        $model->save();
    }
}
