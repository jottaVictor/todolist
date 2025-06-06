<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Entrar</title>
        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="stylesheet" href="{{ asset('css/login/index.css') }}">
    </head>
    <body>
        <main>
            <div class="containter">
                <div class="buttons">
                    <button type="button" onclick="">ENTRAR</button>
                    <button type="button" onclick="">NOVA CONTA</button>
                </div>
                <form id="join" action="{{ route('login.join') }}">
                    <input type="text" name="user" id="user">
                    <input type="password" name="password" id="password">
                    <button type="submmit">ENTRAR</button>
                </form>
                <form id="create" action="{{ route('login.create') }}">
                    <input type="text" name="user" id="user">
                    <input type="password" name="password" id="password">
                    <button type="submmit">CRIAR CONTA</button>
                </form>
            </div>
        </main>
    </body>
</html>
