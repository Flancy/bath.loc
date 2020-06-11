@extends('layouts.app')

@section('content')
    <div class="container product-index">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Изменение анкеты тренера - {{ $trainer->full_name }} (ID - {{ $trainer->id }})</h5></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('partials.errors')
                        @include('partials.success')

                        <form class="form-row" method="POST" action="{{ route('trainer.update', $trainer->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="full_name">ФИО</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $trainer->full_name }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone_number_parents">Номер телефона</label>
                                    <input type="phone" class="form-control" id="phone_number" name="phone_number" value="{{ $trainer->phone_number }}">
                                </div>
                            </div>
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary">Обновить анкету</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection