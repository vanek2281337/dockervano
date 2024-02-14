@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="mt-3 mb-3">
            <a href="{{ route('admin.menu') }}" class="btn ufo_btn_round col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 d-block">Назад</a>
        </div>
        <div class="col-12">
            <div class="col-xxl-10 col-xl-8 col-lg-10 col-md-12 col-12 mx-auto h-100">
                <div class="mt-5 mb-5">
                    <h3 class="text-center">Обновить информацию продукта</h3>
                </div>
                <div class="row">
                    <div class="ufo_card">
                        <div class="mt-3">
                            <div class="col-12 mx-auto">
                                <div class="d-flex justify-content-end align-content-center mt-2">
                                    <form action="{{ route('admin.query.menu.delete') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $menu['id'] }}">
                                        <button type="submit" class="btn btn-danger">Удалить</button>
                                    </form>
                                </div>
                                <form action="{{ route('admin.query.menu.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $menu['id'] }}">
                                    <div class="mb-3">
                                        <label class="form-label">Описание <b class="access">*</b></label>
                                        <select class="form-select" name="category_id" @error('category_id') is-invalid @enderror>
                                            @foreach ($category_list as $category)
                                                <option @if ($category->id == $menu['category_id']) checked @endif value="{{ $category->id }}">{{ $category->Title }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-center">@error('category_id') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Наименование <b class="access">*</b></label>
                                        <input 
                                            type="text" 
                                            name="title" 
                                            class="form-control"
                                            value="{{ $menu['title'] }}"
                                            @error('title') is-invalid @enderror>
                                        <span class="text-center">@error('title') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Описание <b class="access">*</b></label>
                                        <textarea
                                            name="description" 
                                            class="form-control"
                                            @error('description') is-invalid @enderror>{{ $menu['description'] }}</textarea>
                                        <span class="text-center">@error('description') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Изображение</label>
                                        <input type="hidden" name="image_old" value="{{ $menu['image'] }}">
                                        <div class="mb-3">
                                            <p>Текущее изображение:</p>
                                            <img src="{{ asset('/storage/'.$menu['image']) }}" alt="{{ $menu['title'] }}" class="img-fluid">
                                        </div>
                                        <input
                                            type="file"
                                            name="image" 
                                            class="form-control"
                                            @error('image') is-invalid @enderror>
                                        <span class="text-center">@error('image') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Цена <b class="access">*</b></label>
                                        <input
                                            type="text"
                                            name="price" 
                                            class="form-control w-32"
                                            value="{{ $menu['price'] }}"
                                            @error('price') is-invalid @enderror>
                                        <span class="text-center">@error('price') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="d-flex justify-content-end align-content-center">
                                        <button type="submit" class="btn ufo_btn">Обновить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection