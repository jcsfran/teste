<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | Elegan Docs</title>
</head>

<body>
    <form action="/api/docs" method="POST">
        <input name="_method" type="hidden" value="GET"></br>
        <label for="key">Chave do Elegan</label></br>
        <input type="password" name="key" id="key" required>

        @isset($_GET['message'])
            <div class="alert alert-danger">
                <span class="text-dark">{{ $_GET['message'] }}</span>
            </div>
        @endisset

        <br>
        Tentativas: {{ RateLimiter::remaining(Request::ip(), config('elegan.rate_limit')) }}
        <br>
        <button type="submit">Enviar</button>
    </form>
</body>

</html>
