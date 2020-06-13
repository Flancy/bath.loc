@extends('layouts.app')

@section('content')
    <div class="container children-show">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Просмотр пользователя - {{ $user->name }} (ID - {{  $user->id }})</h5></div>

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
                                        <td><b>Имя</b></td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Тип</b></td>
                                        <td>
                                            @if($user->role === UserConstants::USER_ADMIN)
                                                <span class="badge badge-success">{{ $user->role }}</span>
                                            @else
                                                <span class="badge badge-info">{{ $user->role }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td>{{ $user->email }}</td>
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
