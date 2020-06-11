@extends('layouts.app')

@section('content')
    <div class="container children-show">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Просмотр тренера - {{ $trainer->full_name }} (ID - {{ $trainer->id }})</h5></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('partials.errors')
                        @include('partials.success')

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <tbody>
                                    <tr>
                                        <td><b>ФИО</b></td>
                                        <td>{{ $trainer->full_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Номер телефона</b></td>
                                        <td>{{ $trainer->phone_number }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection