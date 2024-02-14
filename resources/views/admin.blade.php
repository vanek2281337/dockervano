@extends('layouts.base')

@section('content')
    <div class="row wrapper">
        <div class="col-12">
            <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-6 col-12 mx-auto h-100">
                <div class="ufo_card h-100 d-flex">
                    <div class="ufo-menu mb-5 mx-auto">
                        <img src="{{ asset('logo.png') }}" class="img-fluid mx-auto d-block" alt="UFOFOOD">
                        <div class="mb-5"></div>
                        <div class="mt-3 d-flex align-items-center justify-content-center">
                            <div class="row">
                                <div class="w-100">
                                    <a href="{{ route('admin.menu_category') }}" class="btn ufo_btn d-block mx-auto w-90 mb-3">Меню категории</a>
                                </div>
                                <div class="w-100">
                                    <a href="{{ route('admin.ingridients') }}" class="btn ufo_btn d-block mx-auto w-90 mb-3">Ингридиенты</a>
                                </div>
                                <div class="w-100">
                                    <a href="{{ route('admin.menu') }}" class="btn ufo_btn d-block mx-auto w-90 mb-3">Меню</a>
                                </div>
                                <div class="w-100">
                                    <a href="{{ route('admin.users_client') }}" class="btn ufo_btn d-block mx-auto w-90 mb-3">Клиенты</a>
                                </div>
                                <div class="w-100">
                                    <a href="{{ route('admin.users_employee') }}" class="btn ufo_btn d-block mx-auto w-90 mb-3">Сотрудники</a>
                                </div>
                                <div class="w-100">
                                    <a href="{{ route('admin.orders') }}" class="btn ufo_btn d-block mx-auto w-90 mb-3">Заказы</a>
                                </div>
                                <div class="w-100">
                                    <a href="{{ route('admin.food_order') }}" class="btn ufo_btn d-block mx-auto w-90 mb-3">История заказов</a>
                                </div>
                                <div class="w-100">
                                    <a href="#" class="btn ufo_btn d-block mx-auto w-90 mb-3">Игра</a>
                                </div>
                                <div class="w-100 mt-5">
                                    <form action="{{ route('admin.logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger d-block mx-auto w-90 mb-3">Выход</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection