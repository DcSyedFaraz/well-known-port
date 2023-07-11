<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreShiftSummaryRequest;
// use App\Http\Requests\UpdateShiftSummaryRequest;
use App\Http\Resources\Admin\ShiftSummaryResource;
use App\ShiftSummary;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ShiftSummaryApiController extends Controller
{
    public function index()
    {
        // abort_if(Gate::denies('summary_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        abort_if(Gate::denies('rider_access'), response()->json(['message' => '403 Forbidden'], 403));

        return new ShiftSummaryResource(ShiftSummary::all());
    }

    public function store(StoreShiftSummaryRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return response()->json([
                'errors'    => $request->validator->errors()
            ], 400);
        }

        $shift_summary = ShiftSummary::create($request->all());

        return (new ShiftSummaryResource($shift_summary))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
