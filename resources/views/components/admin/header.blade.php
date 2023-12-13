<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">Курсы.РУ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Курсы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Записаться</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/signout">Выход</a>
                    </li>
                    <li class="nav-item">
                        @auth
                            {{Auth::user()->name}}
                        @endauth
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="admin/create-course.blade.php">Панель администратора</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Выход</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>