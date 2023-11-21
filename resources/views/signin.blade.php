<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

</head>
<body>
    <x-header />
    <div class="container">
        <h1>Вход</h1>
        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @endif
        <form action="/signin" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Почта</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email"
                    value="{{ Session::get('old_email') }}">
                @error('email')
                    {{$message}}
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                    {{$message}}
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
</body>
</html>