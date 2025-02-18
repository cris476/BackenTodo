<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\taskresquest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class taskController extends Controller
{

    public function store(taskresquest $request)
    {

        $user = User::find(Auth::id());

        $user->tasks()->create($request->validated());
        $tasksUser =   $user->tasks;

        return response()->json([
            ["message" => "Usuario registrado", "validation" => true, "tasks" => $tasksUser]
        ], 201);
    }

    public function showAll()
    {
        $user = User::find(Auth::id());
        $tasks = $user->tasks;

        return response()->json(["tasks" =>  $tasks, "validation" => true]);
    }


    public function update(taskresquest $request, $id)
    {
        $user = User::find(Auth::id());

        $task = $user->tasks()->findOrFail($id);
        $task->update($request->validated());
        return response()->json(["validation" => true,], 200);
    }


    public function destroy($id)
    {
        $user = User::find(Auth::id());

        $task = $user->tasks()->findOrFail($id);
        $task->delete();
        $tasksUser = Auth()->user()->tasks;
        return response()->json(["validation" => true, "tasks" =>  $tasksUser], 200);
    }
}
