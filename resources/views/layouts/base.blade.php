<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') </title>

    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/bootstrap/css/Posev_1.css">

</head>
<body>

<div class="container-fluid">
    <header class="blog-header py-3 ">
        <div class="row flex-nowrap justify-content-between align-items-center ">
            <div class="col-4 pt-1"></div>

            <div class="col-4 text-center">
                <label class="blog-header-logo text-dark">Информационный портал ООО "Агрофирма "КРиММ"</label>
                <a hidden class="blog-header-logo text-dark" href="#">Large</a>
            </div>
            @guest
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">Вход/Регистрация</a>
            </div>
            @endguest
            @auth
                <div class="col-3 d-flex justify-content-end align-items-center" >
                    <a class="btn btn-outline-info" href="{{route('profile.index')}}">Профиль</a>
                </div>
                <div class="col-1 d-flex justify-content-end align-items-center">
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                    {{ __('Выйти') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </div>
            @endauth

        </div>
    </header>
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="/" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Главная</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link align-middle px-0" href="/poliv_show" class="nav-link px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Полив</span></a>
                    </li>

                    <a href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                        <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Опрыскивание</span></a>
                    <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">

                        <li class="w-100">
                            <a href="/spraying" class="nav-link px-0"> <span class="d-none d-sm-inline">Опрыскивание</span></a>
                        </li>
                        @can('showAdd', 'App\Models\svyaz')
                            <li class="w-100">
                                <a href="/pole" class="nav-link px-0"> <span class="d-none d-sm-inline">Справочник - поля</span></a>
                            </li>
                            <li class="w-100">
                                <a href="/nomenklature" class="nav-link px-0"> <span class="d-none d-sm-inline">Справочник - Номенклатура</span></a>
                            </li>
                        @endcan
                    </ul>
                    </li>

                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Посевная - 2023</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">

                            <li class="w-100">
                                <a href="/otchet/1" class="nav-link px-0"> <span class="d-none d-sm-inline">Зерновые</span></a>
                            </li>
                            <li class="w-100">
                                <a href="/otchet/2" class="nav-link px-0"> <span class="d-none d-sm-inline">Картофель</span></a>
                            </li>
                            <li class="w-100">
                                <a href="/otchet/3" class="nav-link px-0"> <span class="d-none d-sm-inline">Овощи</span></a>
                            </li>
                            @can('showAdd', 'App\Models\svyaz')
                                <li class="w-100">
                                    <a href="/posev_add" class="nav-link px-0 link-info"> <span class="d-none d-sm-inline">Внести информацию</span></a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link align-middle px-0" href="/otchet/4" class="nav-link px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Торф</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link align-middle px-0" href="/limit_view" class="nav-link px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Детализация сотовой связи</span></a>
                    </li>


                    @can('destroy', 'App\Models\svyaz')
                    @auth
                    <li>
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Справочники</span> </a>
                        <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">

                            <li class="w-100">
                                <a href="/filial" class="nav-link px-0"> <span class="d-none d-sm-inline">Филиалы</span></a>
                            </li>
                            <li>
                                <a href="/agregat" class="nav-link px-0"> <span class="d-none d-sm-inline">Агрегат</span></a>
                            </li>
                            <li>
                                <a href="/fio" class="nav-link px-0"> <span class="d-none d-sm-inline">ФИО</span></a>
                            </li>
                            <li>
                                <a href="/sutki" class="nav-link px-0"> <span class="d-none d-sm-inline">Сутки</span></a>
                            </li>
                            <li>
                                <a href="/vidposeva" class="nav-link px-0"> <span class="d-none d-sm-inline">Вид посева</span></a>
                            </li>
                            <li>
                                <a href="/kultura" class="nav-link px-0"> <span class="d-none d-sm-inline">Культура</span></a>
                            </li>

                            <li>
                                <a href="/svyaz_add" class="nav-link px-0"> <span class="d-none d-sm-inline">Создание связок</span></a>
                            </li>


                            <li>
                                <a href="/posev_add" class="nav-link px-0"> <span class="d-none d-sm-inline">Внесите информациб о работах</span></a>
                            </li>

                                <li>
                                    <a href="/limit_add" class="nav-link px-0"> <span class="d-none d-sm-inline">Корп связь</span></a>
                                </li>

                            <li>
                                <a href="/post" class="nav-link px-0"> <span class="d-none d-sm-inline">Должность</span></a>
                            </li>
                            <li>
                                <a href="/activation" class="nav-link px-0"> <span class="d-none d-sm-inline">Активация пользователей</span></a>
                            </li>

                            <li>
                                <a href="/box" class="nav-link px-0"> <span class="d-none d-sm-inline">Склад</span></a>
                            </li>
                            <li>
                                <a href="/nomenklature" class="nav-link px-0"> <span class="d-none d-sm-inline">Номенклатура</span></a>
                            </li>
                            <li>
                                <a href="/szr" class="nav-link px-0"> <span class="d-none d-sm-inline">СЗР</span></a>
                            </li>
                            <li>
                                <a href="/box_filling" class="nav-link px-0"> <span class="d-none d-sm-inline">Продукция по боксам</span></a>
                            </li>
                            <li>
                                <a href="/pole" class="nav-link px-0"> <span class="d-none d-sm-inline">Поля</span></a>
                            </li>


                            @endcan
                        </ul>
                    </li>
                    @endauth

                </ul>

s
            </div>
        </div>
        <div class="col py-3">
            @yield('info')
            @yield('content')
        </div>
    </div>
</div>

@yield('script')
<script src="/bootstrap/js/bootstrap.js"></script>
</body>
</html>