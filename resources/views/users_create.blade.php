@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="mt-3 mb-3">
            <a href="{{ route('admin.users_employee') }}" class="btn ufo_btn_round col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 d-block">Назад</a>
        </div>
        <div class="p-5">
            <div class="col-xxl-10 col-xl-8 col-lg-10 col-md-12 col-12 mx-auto h-100">
                <div class="mt-5 mb-5">
                    <h3 class="text-center">Добавить пользователя</h3>
                </div>
                <div class="row">
                    <div class="ufo_card">
                        <div class="mt-3">
                            @if (\Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {!! \Session::get('success') !!}
                                </div>
                            @endif
                            <div class="col-12 mx-auto">
                                <form action="{{ route('admin.query.users.create') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Имя</label>
                                        <input 
                                            type="text" 
                                            name="first_name" 
                                            class="form-control"
                                            @error('first_name') is-invalid @enderror>
                                        <span class="text-center">@error('first_name') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Фамилия</label>
                                        <input
                                            name="last_name" 
                                            class="form-control"
                                            @error('last_name') is-invalid @enderror>
                                        <span class="text-center">@error('last_name') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Номер телефона <b class="access">*</b></label>
                                        <input
                                            type="tel"
                                            name="phone" 
                                            id="exampleInputTelephone"
                                            class="form-control w-32"
                                            @error('phone') is-invalid @enderror>
                                        <span class="text-center">@error('phone') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Роль <b class="access">*</b></label>
                                        <select class="form-select" name="role" @error('role') is-invalid @enderror>
                                            <option value="Клиент">Клиент</option>
                                            <option value="Администратор">Администратор</option>
                                            <option value="Менеджер">Менеджер</option>
                                        </select>
                                        <span class="text-center">@error('role') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#exampleInputTelephone")
                .mask("+7 (999) 999-99-99");
        });
    </script>
@endsection