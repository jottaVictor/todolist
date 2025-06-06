@extends('tarefas.layout')

@section('content')
    <div class="actions">
        <form action="{{ route('tarefas.index') }}" method="GET">
            <label for="status">Filtrar por status:</label>
            <select name="status" id="status">
                <option value="">Todos</option>
                <option value="pendente">Pendentes</option>
                <option value="concluída">Concluídas</option>
            </select>
            <button type="submmit" class="button search">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                <span>
                    BUSCAR
                </span>
            </button>
        </form>
        <button type="button" class="button create" onclick="window.location.href='{{ route('tarefas.create') }}'">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor"><path d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160Zm40 200q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
            <span>
                CRIAR TAREFA
            </span>
        </button>
    </div>
    <div class="container">
        <section class="list">
            @if(count($tarefas) == 0)
                <span>Sem registros encontrado</span>
            @endif
            @foreach ($tarefas as $tarefa)
                <details class="tarefa" id="{{'details_' . $tarefa->id}}">
                    <summary>
                        <span>{{ $tarefa->titulo }}</span>
                        <span class="status {{ Str::ascii($tarefa->status) }}">{{ $tarefa->status }}</span>
                        <span> {{ "Criado em: " . $tarefa->data_criacao }} </span>
                        <button class="button"  onclick="handleDetails({{ $tarefa->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>
                        </button>
                        <button class="button" onclick="window.location.href='{{ route('tarefas.edit', $tarefa->id) }}'">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
                        </button>
                        <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="button" type="submit" onclick="return confirm('Tem certeza que quer deletar essa tarefa?')">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                            </button>
                        </form>
                    </summary>
                    <p>Descrição: {{$tarefa->descricao}}</p>
                </details>
            @endforeach
        </section>
    </div>
    @include('tarefas.pagination')
    <script>
        function handleDetails(id) {
            const details = document.getElementById('details_' + id);
            details.open = !details.open;
        }
    </script>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/tarefas/index.css') }}">
@endpush