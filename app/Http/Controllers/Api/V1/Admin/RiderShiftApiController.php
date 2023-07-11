<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShiftSummaryRequest;

use Illuminate\Http\Request;
use App\ShiftSummary;
use Carbon\Carbon;
use App\Helpers\Helper;

class RiderShiftApiController extends Controller
{

    public function shiftStart(Request $request)
    {
        $shift = ShiftSummary::where("rider_id", auth()->user()->rider->id)
                    ->whereDate("shift_start", Carbon::today())->first();

        if($shift){
            return response()->json([
                'message' => Helper::showDate($shift->shift_start). " shift already started.",
            ], 403);
        }

        $request->merge(['rider_id'=> auth()->user()->rider->id,'shift_start' => now()]);

        $shift_summary = ShiftSummary::create($request->all());
        
        return response()->json([
            'success' => 'New Shift has been started.',
            'date' => Helper::showDate($shift_summary->shift_start),
            'time' => Helper::showTime($shift_summary->shift_start),
        ], 201);

        return (new ShiftSummaryResource($shift_summary))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
  
    public function shiftEnds(Request $request)
    {        
        $shift = ShiftSummary::where(["rider_id" => auth()->user()->rider->id, "shift_end" => null])
                    ->whereDate("shift_start", Carbon::today())->first();

        if(!$shift){
            return response()->json([
                'message' => "Shift not started or already ended.",
            ], 403);
        }

        $request->merge(['rider_id'=> auth()->user()->rider->id,'shift_end' => now()]);
        
        return response()->json([
            'success' => 'Shift has been ended.',
            'shift' => $shift->update($request->all())
        ], 200);
    }
}
