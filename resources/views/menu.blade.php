@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="mt-3 mb-3">
            <a href="{{ route('admin') }}" class="btn ufo_btn_round col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 d-block">Назад</a>
        </div>
        <div class="col-12">
            <div class="col-12 mx-auto h-100">
                <div class="mb-5">
                    <h3 class="text-center">Категории меню</h3>
                </div>
                <div class="row">
                    <div class="ufo_card">
                        @if (\Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {!! \Session::get('success') !!}
                            </div>
                        @endif
                        <div class="d-flex justify-content-end align-content-center mt-2">
                            <a href="{{ route('admin.menu.create') }}" class="btn ufo_btn">Добавить</a>
                        </div>
                        <div class="mt-3">
                            <table class="table table-warning table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col" class="mobile-none">Фото</th>
                                        <th scope="col">Категория</th>
                                        <th scope="col">Наименование</th>
                                        <th scope="col" class="mobile-none">Описание</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menu_list as $item)
                                        <tr>
                                            <th scope="row">{{ $item['id'] }}</th>
                                            <th scope="row" class="mobile-none">
                                                <img src="{{ asset('/storage/'.$item['image']) }}" alt="{{ $item['title'] }}" class="img-fluid">
                                            </th>
                                            <th scope="row">{{ $item['category']['Title'] }}</th>
                                            <th scope="row">{{ $item['title'] }}</th>
                                            <th scope="row" class="mobile-none">{{ mb_strimwidth($item['description'], 0, 180) }}...</th>
                                            <td>
                                                <a href="{{ route('admin.menu.update', ["id" => $item['id']]) }}" class="btn ufo_btn">Подробнее</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection