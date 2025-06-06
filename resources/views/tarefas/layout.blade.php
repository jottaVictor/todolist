<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $titulo ?? "TO DO LIST" }}</title>
        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="stylesheet" href="{{ asset('css/tarefas/tarefas.css') }}">
        @stack('styles')
    </head>
    <body>
        <header>
            @if($backButton)
                <button onclick="window.history.back()" class="button back">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg>
                </button>
            @endif
            <h1 class="title-page">{{ $h1_titulo ?? "TO DO LIST" }}</h1>
        </header>
        <main>
            @php
                $alerts = ["success", "error", "warning", "info"];
                $hasAlert = $errors->any() || !empty(array_filter($alerts, fn($alert) => session()->has($alert)));
            @endphp
            @if($hasAlert)
                <div class="alerts">
                    @foreach($alerts as $alert)
                        @if(session()->has($alert))
                            <span class="{{ $alert }}">{{ session($alert) }}</span>
                        @endif
                    @endforeach
                    @if($errors->any())
                        <ul class="errors">
                            @foreach($errors->all() as $error)
                                <li class="error">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endif
            <!--teste de estilos
                <div class="alerts">
                <span class="success">Tarefa criada com sucesso!</span>
                <span class="error">Erro inesperado ao salvar a tarefa.</span>
                <span class="warning">Atenção: verifique os dados antes de continuar.</span>
                <span class="info">Informação importante para o usuário.</span>

                <ul class="errors">
                    <li class="error">O campo título é obrigatório.</li>
                    <li class="error">O status deve ser "pendente" ou "concluída".</li>
                </ul>
            </div>
            -->
            @yield('content')
        </main>
        <footer>
            @yield('footer')
        </footer>
    </body>
</html>
