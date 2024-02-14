@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="mt-3 mb-3">
            <a href="{{ route('admin') }}" class="btn ufo_btn_round col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 d-block">Назад</a>
        </div>
        <div class="p-desktop-5">
            <div class="col-12 mx-auto h-100">
                <div class="mb-5">
                    <h3 class="text-center">Заказы</h3>
                </div>
                <div class="row">
                    <div class="col-xxl-8 col-xl-8 col-12 mb-5">
                        <div class="ufo_card">
                            <h3 class="text-center">Заказы готовятся</h3>
                            <div class="mt-3">
                                <div class="col-12">
                                    <table class="table table-warning table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Цена</th>
                                                <th scope="col">Детали</th>
                                                <th scope="col" class="mobile-none">Статус</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cooking as $item)
                                                <tr>
                                                    <th scope="row">{{ $item['id'] }}</th>
                                                    <th scope="row">{{ $item['price'] }}</th>
                                                    <th scope="row">
                                                        <ul>
                                                            @foreach ($item['values'] as $el)
                                                                <li class="mb-2">
                                                                    <div>
                                                                        <span>{{ $el['Title'] }} - {{ $el['Price'] }} р ({{ $el['Count'] }} шт)</span>
                                                                        @if (count($el['IngridientValue']) > 0)
                                                                            <div>
                                                                                <small>Ингридиенты:</small>
                                                                                <ol>
                                                                                    @foreach ($el['IngridientValue'] as $ingridient)
                                                                                        <li>
                                                                                            <small>{{ $ingridient['Title'] }} ({{ $ingridient['Count'] }} шт)</small>
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ol>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <hr>
                                                                </li>
                                                            @endforeach
                                                        </ul> 
                                                    </th>
                                                    <th scope="row" class="mobile-none">{{ $item['status'] }}</th>
                                                    <th scope="row">
                                                        <form action="{{ route('admin.query.status_change') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                                                            <input type="hidden" name="status" value="Курьер в пути">
                                                            <button type="submit" class="btn ufo_btn">Передан курьеру</button>
                                                        </form>
                                                    </th>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-12">
                        <div class="ufo_card">
                            <h3 class="text-center">Заказы в доставке</h3>
                            <div class="mt-3">
                                <table class="table table-warning table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Статус</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($delivered as $item)
                                            <tr>
                                                <th scope="row">{{ $item['id'] }}</th>
                                                <th scope="row">{{ $item['status'] }}</th>
                                                <th scope="row">
                                                    <form action="{{ route('admin.query.status_change') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                                                        <input type="hidden" name="status" value="Готово">
                                                        <button type="submit" class="btn ufo_btn">Заказ доставлен</button>
                                                    </form>
                                                </th>
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
    </div>
@endsection