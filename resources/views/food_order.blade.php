@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="mt-3 mb-3">
            <a href="{{ route('admin') }}" class="btn ufo_btn_round col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 d-block">Назад</a>
        </div>
        <div class="p-desktop-5">
            <div class="col-xxl-10 col-xl-8 col-lg-10 col-md-12 col-12 mx-auto h-100">
                <div class="mb-5">
                    <h3 class="text-center">История заказов</h3>
                </div>
                <div class="row">
                    <div class="ufo_card card_none">
                        <div class="mt-3 d-xxl-none d-xl-none d-lg-none d-md-none d-block">
                            @foreach ($purchases_history as $item)
                                <div class="ufo_card mt-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <p>Заказ № {{ $item['id'] }}</p>
                                        </div>
                                        <div class="col-4">
                                            <strong>{{ $item['status'] }}</strong>
                                        </div>
                                    </div>
                                    <p>Детали:</p>
                                    <ul>
                                        @foreach ($item['values'] as $el)
                                            <li class="mb-2">
                                                <div class="mb-4">
                                                    <span>
                                                        <b>{{ $el['Title'] }}</b> - {{ $el['Price'] }} р ({{ $el['Count'] }} шт)
                                                    </span>
                                                    @if (count($el['IngridientValue']) > 0)
                                                        <div class="p-2">
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
                                            </li>
                                        @endforeach
                                    </ul> 
                                    <hr>
                                    <p>{{ $item['users']['FirstName'] }} {{ $item['users']['LastName'] }}</p>
                                    <p>{{ $item['users']['Phone'] }}</p>
                                    <strong>Цена: {{ $item['price'] }}</strong>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-3 d-xxl-block d-xl-block d-lg-block d-md-block d-none">
                            <table class="table table-warning table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Цена</th>
                                        <th scope="col">Детали</th>
                                        <th scope="col">Клиент</th>
                                        <th scope="col">Статус</th>
                                        <th scope="col">Дата и время</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchases_history as $item)
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
                                            <th scope="row">{{ $item['users']['FirstName'] }} {{ $item['users']['LastName'] }} {{ $item['users']['Phone'] }}</th>
                                            <th scope="row">{{ $item['status'] }}</th>
                                            <th scope="row">{{ $item['set_date'] }} | {{ $item['set_time'] }}</th>
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