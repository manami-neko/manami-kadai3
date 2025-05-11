<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css')}}" />
    @livewireStyles
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo">
                PiGLy
            </a>
        </div>
        <div class="header__nav">
            <form class="form" action="/goal_setting" method="get">
                @csrf
                <button class="header-nav__button">目標体重設定</button>
            </form>
            <form class="form" action="/logout" method="post">
                @csrf
                <button class="header-nav__button">ログアウト</button>
            </form>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
    @livewireScripts
</body>

</html>