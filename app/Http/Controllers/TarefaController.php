<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTarefaRequest;

class TarefaController extends Controller
{
    public function index(Request $request)
    {
        $tarefas = isset($request->status) ? Tarefa::where('status', $request->status)->offset((($request->page ?? 1) -1) * 5)->limit(5)->get() : Tarefa::offset((($request->page ?? 1) -1) * 5)->limit(5)->get();
        $backButton = false;
        $count = isset($request->status) ? Tarefa::where('status', $request->status)->count() : Tarefa::count();
        $numPages = ceil($count / 5);
        $routeName = "tarefas.index";

        return view('tarefas.index', compact('tarefas', 'backButton', 'numPages', 'routeName'));
    }

    public function create()
    {
        $titulo = "Criar nova tarefa";
        $backButton = true;

        return view('tarefas.form', compact('titulo', 'backButton'));
    }

    public function store(StoreTarefaRequest $request)
    {
        $data = $request->validated();

        if (!isset($data['status']) || is_null($data['status'])) {
            $data['status'] = 'pendente';
        }

        Tarefa::create($data);

        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso!');
    }

    public function show(Tarefa $tarefa)
    {
        //método não utilizado
    }

    public function edit(Tarefa $tarefa)
    {
        $titulo = "Editar Tarefa " . $tarefa->titulo;
        $backButton = true;

        return view('tarefas.form', compact('tarefa', 'titulo', 'backButton'));
    }

    public function update(StoreTarefaRequest $request, Tarefa $tarefa)
    {
        $data = $request->validated();

        $data['status'] = isset($data['status']) ? 'concluída' : 'pendente';

        $tarefa->update($data);

        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso!');
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa deletada com sucesso!');
    }
}
