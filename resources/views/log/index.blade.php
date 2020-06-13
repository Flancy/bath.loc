@extends('layouts.app')

@section('content')
    <div class="container children-index">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Логи <a href="{{ route('log.clear') }}" class="btn btn-warning">Очистить логи</a></h5></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('partials.errors')
                        @include('partials.success')

                        @forelse ($logs as $log)
                            {!! $log->description !!}
                        @empty
                            <p>Логи отсутствуют</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
