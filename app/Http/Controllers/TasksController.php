<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TasksResource;
use App\Models\Task;
use App\Traits\HttpResponses;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return TasksResource::collection(
                Task::where('user_id', Auth::user()->id)->get()
            );
        } catch (Exception $e) {
            return $this->error(
                [],
                'Server Failed: ' . $e,
                500
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $storeRequest)
    {
        $storeRequest->validated($storeRequest->all());

        $task = Task::create([
            'user_id' => Auth::user()->id,
            'name' => $storeRequest->name,
            'description' => $storeRequest->description,
            'priority' => $storeRequest->priority
        ]);

        return new TasksResource($task);
    }

    /**
     * Show single Task
     *
     * @param Task $task
     *
     * @return JsonResponse
     */
    public function show(Task $task)
    {
        return $this->isNotAuthorized($task)
            ? $this->isNotAuthorized($task)
            : new TasksResource($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        Task $task
    ): JsonResponse {
        if (Auth::user()->id !== $task->user_id) {
            return $this->error(
                '',
                'You are not authorized to make this request',
                403
            );
        }
        $task->update($request->all());

        return new TasksResource($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //Directly pass delte method We will not send task resource
        return $this->isNotAuthorized($task) ? $this->isNotAuthorized($task) : $task->delete();
    }

    private function isNotAuthorized(Task $task)
    {
        if (Auth::user()->id !== $task->user_id) {
            return $this->error(
                '',
                'You are not authorized to make this request',
                403
            );
        }
    }
}