@extends('layouts.base')

@section('content')
    <div class="row wrapper">
        <div class="col-12">
            <div class="col-xxl-3 col-xl-5 col-lg-6 col-md-8 col-12 mx-auto h-100">
                <div class="ufo_card h-100 d-flex">
                    <div class="ufo-menu w-100 mb-5 mx-auto">
                       <div class="col-12">
                            <h4 class="text-center">Вход</h4>
                       </div>
                       <div class="col-12">
                        <form action="@if(empty($user_phone)) {{ route('admin.query.send_code') }} @else {{ route('admin.query.auth') }} @endif" method="post" class="mx-auto">
                            @csrf
                            @if(empty($user_phone))
                                <div class="mt-4 mb-4 alert alert-warning" role="alert">
                                    На указанный вами номер будет отправлено СМС уведомление с паролем для входа.
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Введите номер телефона <b class="access">*</b></label>
                                    <input 
                                        type="tel" 
                                        name="phone" 
                                        id="exampleInputTelephone" 
                                        class="form-control"
                                        @error('phone') is-invalid @enderror>
                                    <span class="text-center">@error('phone') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                </div>
                                <button type="submit" class="btn ufo_btn">Отправить код</button>
                            @else
                                <div class="mb-4">
                                    <label class="form-label">Ваш номер телефона <b class="access">*</b></label>
                                    <input 
                                        type="tel" 
                                        name="phone" 
                                        id="exampleInputTelephone"
                                        class="form-control" 
                                        value="{{ $user_phone }}"
                                        @error('phone') is-invalid @enderror>
                                    <span class="text-center">@error('phone') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Введите код подтверждения <b class="access">*</b></label>
                                    <input 
                                        type="text" 
                                        name="code" 
                                        class="form-control w-50"
                                        @error('code') is-invalid @enderror>
                                    <span class="text-center">@error('code') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                </div>
                                <button type="submit" class="btn ufo_btn">@if(empty($user_phone)) Отправить код @else Войти @endif</button>
                            @endif
                        </form>
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