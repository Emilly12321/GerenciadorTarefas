<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controlador;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controlador
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $tasks = Auth::user()->tasks()->get();

        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task = Auth::user()->tasks()->create($validated);

        return response()->json($task, 201);
    }

    public function update(Request $request, $id)
    {
        $task = Auth::user()->tasks()->find($id);

        if (! $task) {
            return response()->json(['error' => 'Task não encontrada ou acesso negado.'], 404);
        }

        $validated = $request->validate([
            'title' => 'string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean',
        ]);

        $task->update($validated);

        return response()->json($task);
    }

    public function destroy($id)
    {
        $task = Auth::user()->tasks()->find($id);

        if (! $task) {
            return response()->json(['error' => 'Task não encontrada'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task deletada com sucesso.']);
    }

    public function toggleComplete($id)
    {
        $task = Auth::user()->tasks()->find($id);

        if (! $task) {
            return response()->json(['error' => 'Task não encontrada'], 404);
        }

        $task->completed = ! $task->completed;
        $task->save();

        return response()->json($task);
    }
}
