@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contact US</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form action="{{route('mes.store')}}" id="contactform" method="POST" enctype="multipart/form-data" class="validateform">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-4 field">
                                    <input type="text" style="width:400px;;" name="theme" placeholder="* Введите тему сообщения" required />
                                </div>

                                <div class="col-lg-12 margintop10 field">
                                    <textarea cols="45" rows="5" name="message" class="input-block-level" placeholder="* Ваше сообщение..." required></textarea>
                                    <input type="file" name="file" required/>
                                    <p>
                                        <button class="btn btn-theme margintop10 pull-left" type="submit">Отправить</button>
                                        <span class="pull-right margintop20">* Заполните, пожалуйста, все обязательные поля!</span>
                                    </p>
                                </div>

                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
