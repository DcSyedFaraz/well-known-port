<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Task;
use App\Order;
use App\AssignTask;
use App\ShiftSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompleteTaskApiRequest;
use App\Http\Resources\Api\GetAssignTasksResource;

class AssignTaskApiController extends Controller
{

    public function getAssignTasks()
    {
        $tasks = AssignTask::with(['assignType', 'task', 'task.order'])
        ->whereHas('task', function($q) {
            return $q->where('is_complete', false);
        })
        ->where('rider_id', auth()->user()->rider->id)
        ->orderBy('sort_id', 'asc')
        ->get();
        
        return response()->json([
            'tasks' => GetAssignTasksResource::collection($tasks),
        ]);
    }

    public function getAssignTaskDetail($assign_id)
    {
        $assignTask = AssignTask::findOrFail($assign_id);

        $task = Task::with('order')->where("id", $assignTask->task_id)->first();

        return response()->json([
            'assign_id' => $assignTask->id,    
            'task' => $task,    
            // 'tasks' => GetAssignTasksResource::collection($task),
        ]);

    }

    // public function startTask(Request $request)
    public function completeTask(Request $request)
    {  
        //cod_amt, fare_amt, distance
        
        $assignTask = AssignTask::findOrFail($request->assign_id);
        
        $task = Task::with('order')->where("id", $assignTask->task_id)->first();

        $task->order->cod_amt_receive = $request->cod_amt;
        $task->order->fare_amt_receive = $request->fare_amt;

        DB::beginTransaction();
            $assignTask->update([ "is_complete" => true ]);     
            $task->order->update();   
            $task->update([ "distance" => $request->distance, "is_complete" => true ]);
        DB::commit();

        return response()->json([
            'status'    => 'success',
            'message'   => 'Task successfully completed.',
            'task'      => $task,
        ]);

    }

}
