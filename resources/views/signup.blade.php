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
        <h1>Регистрация</h1>
        <form method="POST" action="/signup">
          @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Введите почту</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                @error('email')
                    {{$message}}
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Введите имя</label>
                <input type="text" class="form-control" name="username" id="username">
                @error('username')
                    {{$message}}
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Введите пароль</label>
                <input type="password" class="form-control" name="password" id="password">
                @error('password')
                    {{$message}}
                @enderror
            </div>
            <div class="mb-3">
                <label for="confirm_pass" class="form-label">Повторите пароль</label>
                <input type="password" class="form-control" name="confirm_pass" id="confirm_pass">
                @error('confirm_pass')
                    {{$message}}
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Зарегестрироваться</button>
        </form>
    </div>
</body>
</html>