<?php

namespace App\Http\Controllers\Resource;

use App\Traits\ResourceModel;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use ResourceModel;

    /**
     * List resource.
     *
     * @return JsonReponse
     */
    public function __invoke()
    {
        return new JsonResponse($this->model::paginate(), 200);
    }
}
