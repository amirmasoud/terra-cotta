<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    /**
     * Get current user.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \App\Http\Resources\User
     */
    public function user(Request $request)
    {
        return new UserResource($request->user());
    }
}
