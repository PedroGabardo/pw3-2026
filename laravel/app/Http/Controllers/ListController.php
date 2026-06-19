<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('list/index', [
            'tasks' => $tasks,
        ]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $dados = $request->validate([
                'task' => 'required|min:5|max:255',
                'feita' => $request->booelan(''),
                'cor' => 'required',
                'imagem' => 'nullable|image'
            ]);

            if ($request->hasFile('imagem')) {
                $dados['imagem'] = $request->file('imagem')->store('imagens', 'public');
            }

            Task::create($dados);
            return redirect()->route('list.index')->with('mensagem', 'Task criada com sucesso.');
        }

        return view('list/create');
    }

    public function edit(Request $request, Task $task)
    {
        if ($request->isMethod('put')) {

            $dados = $request->validate([
                'task' => 'required|min:5|max:255',
                'feita' => $request->boolean(''),
                'cor' => 'required',
                'imagem' => 'nullable|image|max:2048'
            ]);

            // Verifica se tem arquivo e grava
            if ($request->hasFile('imagem')) {
                // Apaga a imagem antiga
                if ($task->imagem) {
                    \Storage::disk('public')->delete($task->imagem);
                }
                $dados['imagem'] = $request->file('imagem')->store('imagens', 'public');
            }

            $task->update($dados);
            return redirect()->route('task.index')->with('mensagem', 'Task atualizada com sucesso.');
        }
        return view('list.create', [
            'task' => $task,
        ]);
    }

    public function delete(Task $task)
    {
        if (request()->isMethod('delete')) {
            $task->delete();

            return redirect()->route('list.index')->with('mensagem', 'Task excluída com sucesso.');
        }

        return view('task.delete', [
            'task' => $task,
        ]);
    }

    public function trash()
    {
        $tasks = Task::onlyTrashed()->get();

        return view('list.trash', [
            'tasks' => $tasks,
        ]);
    }

    public function restore(Task $task)
    {
        $task->restore();

        return redirect()->route('list.index')->with('mensagem', 'Task restaurada com sucesso.');
    }
}