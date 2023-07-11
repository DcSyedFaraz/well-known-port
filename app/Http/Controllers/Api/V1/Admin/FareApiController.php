<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Fare;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FareApiController extends Controller
{
    public function index()
    {
        // abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return Fare::all();
    }
}
