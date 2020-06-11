@extends('layouts.app')

@section('content')
    <div class="container children-index">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Анкеты <a href="{{ route('children.create') }}" class="btn btn-primary">Добавить анкету</a></h5></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('partials.errors')
                        @include('partials.success')

                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID пользователя в системе</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody>
	                                @forelse ($logs as $log)
	                                    <tr>
	                                        <td>{{ $log->causer_id }}</td>
	                                        <td>{{ $log->description }}</td>
	                                    </tr>
	                                @empty
	                                    <p>Логи отсутствуют</p>
	                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection