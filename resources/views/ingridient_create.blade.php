@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="mt-3 mb-3">
            <a href="{{ route('admin.ingridients') }}" class="btn ufo_btn_round col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 d-block">Назад</a>
        </div>
        <div class="col-12">
            <div class="col-xxl-10 col-xl-8 col-lg-10 col-md-12 col-12 mx-auto h-100">
                <div class="mt-5 mb-5">
                    <h3 class="text-center">Добавить продукт</h3>
                </div>
                <div class="row">
                    <div class="ufo_card">
                        <div class="mt-3">
                            <div class="col-12 mx-auto">
                                <form action="{{ route('admin.query.ingridients.create') }}" method="post" >
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Категория <b class="access">*</b></label>
                                        <select class="form-select" name="category_id" @error('category_id') is-invalid @enderror>
                                            <option selected>Нажмите что бы выбрать категорию</option>
                                            @foreach ($category_list as $category)
                                                <option value="{{ $category->id }}">{{ $category->Title }}</option>
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
                                            @error('title') is-invalid @enderror>
                                        <span class="text-center">@error('title') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="d-flex justify-content-end align-content-center">
                                        <button type="submit" class="btn ufo_btn">Сохранить</button>
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