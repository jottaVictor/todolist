@extends('tarefas.layout')

@section('content')
    <div class="container">
        <form class="form" action="{{ isset($tarefa) ? route('tarefas.update', $tarefa->id) : route('tarefas.store') }}" method="POST">
            @csrf
            @if (isset($tarefa))
                @method('PUT')
            @endif
            <div class="content">
                <label for="titulo">Titulo</label>
                <input placeholder="Digite o nome da tarefa" type="text" name="titulo" id="titulo" value="{{ old('titulo', $tarefa->titulo ?? '') }}">
                <label for="descricao">Descrição</label>
                <textarea placeholder="Digite a descrição da tarefa" name="descricao" id="descricao">{{ old('descricao', $tarefa->descricao ?? '')  }}</textarea>
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="pendente" {{ old('status', $tarefa->status ?? '') == 'pendente' ? 'selected' : '' }} >Pendente</option>
                    <option value="concluída" {{ old('status', $tarefa->status ?? '') == 'concluída' ? 'selected' : '' }} >Concluída</option>
                </select>
            </div>
            <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor"><path d="M840-680v480q0 33-23.5 56.5T760-120H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h480l160 160Zm-80 34L646-760H200v560h560v-446ZM480-240q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35ZM240-560h360v-160H240v160Zm-40-86v446-560 114Z"/></svg>
                <span>
                    {{isset($tarefa) ? "SALVAR EDIÇÃO" : "SALVAR TAREFA"}}
                </span>
            </button>
        </form>
    </div>
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('css/tarefas/form.css') }}">
@endpush