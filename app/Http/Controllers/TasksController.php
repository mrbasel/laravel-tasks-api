<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(Request $request) {
        $tasks = $request->user()->tasks;
        return TaskResource::collection($tasks);
    }

    public function store(StoreTaskRequest $request) {
        $validated = $request->validated();

        $task = new Task([
            'title' => $validated['title'],
            'is_completed' => false,
        ]);
        $request->user()->tasks()->save($task);
        return new TaskResource($task);
    }

    public function update(UpdateTaskRequest $request, string $id) {
        $validated = $request->validated();

        Task::where('id', $id)->where('user_id', $request->user()->id)->update($validated);
        $task = Task::find($id);
        return new TaskResource($task);
    }
}
