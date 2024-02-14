@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="mt-3 mb-3">
            <a href="{{ route('admin') }}" class="btn ufo_btn_round col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 d-block">Назад</a>
        </div>
        <div class="col-12">
            <div class="col-xxl-10 col-xl-8 col-lg-10 col-md-12 col-12 mx-auto h-100">
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
                            <a href="{{ route('admin.menu_category_create') }}" class="btn ufo_btn">Добавить</a>
                        </div>
                        <div class="mt-3">
                            <table class="table table-warning table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Категория</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menu_category_list as $item)
                                        <tr>
                                            <th scope="row">{{ $item->id }}</th>
                                            <td>{{ $item->Title }}</td>
                                            <td class="d-flex justify-content-end">
                                                <form action="{{ route('admin.query.menu_category.delete') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                                </form>
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