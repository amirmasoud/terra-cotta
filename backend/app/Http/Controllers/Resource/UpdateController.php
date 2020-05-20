<?php

namespace App\Http\Controllers\Resource;

use Illuminate\Http\Request;
use App\Traits\ResourceModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class UpdateController extends Controller
{
    use ResourceModel;

    public function __invoke(Request $request)
    {
        $model = new $this->model;
        $model = $this->model::findOrFail($request->id)->first();
        $model->forceFill($request->all())->save();
        return new JsonResponse([], 204);
    }
}
