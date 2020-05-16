<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Traits\ResourceModel;
use Illuminate\Http\JsonResponse;

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
        return new JsonResponse(ResourceModel::paginate(), 200);
    }
}
