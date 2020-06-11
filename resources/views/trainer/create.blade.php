@extends('layouts.app')

@section('content')
    <div class="container children-create">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Добавление нового тренера</h5></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('partials.errors')
                        @include('partials.success')

                        <form class="form-row" method="POST" action="{{ route('trainer.store') }}">
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="full_name">ФИО</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" value="Trainer Trainer">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone_number">Номере телефона</label>
                                    <input type="phone" class="form-control" id="phone_number" name="phone_number" value="429-754-7329">
                                </div>
                            </div>
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary">Создать</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection