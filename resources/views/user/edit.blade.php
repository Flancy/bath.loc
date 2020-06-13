@extends('layouts.app')

@section('content')
    <div class="container children-create">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Изменение пользователя - {{ $user->name }} (ID - {{ $user->id }}</h5></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('partials.errors')
                        @include('partials.success')

                        <form class="form-row" method="POST" action="{{ route('user.update', $user->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="role">Тип пользователя</label>
                                    <select class="form-control" id="role" name="role">
                                        <option value="{{ UserConstants::USER_MANAGER }}"
                                        @if($user->role === UserConstants::USER_MANAGER)
                                            selected="selected"
                                        @endif
                                        >{{ UserConstants::USER_MANAGER }}</option>
                                        <option value="{{ UserConstants::USER_ADMIN }}"
                                        @if($user->role === UserConstants::USER_ADMIN)
                                            selected="selected"
                                        @endif
                                        >{{ UserConstants::USER_ADMIN }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="password">Пароль</label>
                                    <input type="text" class="form-control" name="password" id="password">
                                </div>
                            </div>
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary">Обновить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
