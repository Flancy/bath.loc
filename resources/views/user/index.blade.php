@extends('layouts.app')

@section('content')
    <div class="container children-index">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Пользователи <a href="{{ route('user.create') }}" class="btn btn-primary">Добавить пользователя</a></h5></div>

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
                                    <th>ID</th>
                                    <th>Тип</th>
                                    <th>Имя</th>
                                    <th>Email</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <td>{{ $rank++ }}</td>
                                            <td>
                                                @if($user->role === UserConstants::USER_ADMIN)
                                                    <span class="badge badge-success">{{ $user->role }}</span>
                                                @else
                                                    <span class="badge badge-info">{{ $user->role }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="td_last">
                                                <div class="button-group d-flex justify-content-between align-items-center">
                                                    <a href="{{ route('user.edit', $user) }}" class="btn btn-sm btn-primary active">Изменить</a>

                                                    <a href="{{ route('user.show', $user) }}" class="btn btn-sm btn-primary active">Просмотр</a>

                                                    @if($user->role === UserConstants::USER_MANAGER)
                                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-sm btn-danger active">Удалить</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <p>Платежек нет. <a href="{{ route('user.create') }}" class="btn btn-primary">Добавить пользователя</a></p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer justify-content-center text-center">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
