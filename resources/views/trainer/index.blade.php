@extends('layouts.app')

@section('content')
    <div class="container children-index">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Тренера <a href="{{ route('trainer.create') }}" class="btn btn-primary">Добавить тренера</a></h5></div>

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
                                    <th>ФИО тренера</th>
                                    <th>Номер телефона</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($trainers as $trainer)
                                    <tr>
                                        <td>{{ $trainer->id }}</td>
                                        <td>
                                            <a href="{{ route('trainer.show', $trainer) }}">
                                                {{ $trainer->full_name }}
                                            </a>
                                        </td>
                                        <td>{{ $trainer->phone_number }}</td>
                                        <td class="td_last">
                                            <div class="button-group d-flex justify-content-between align-items-center">
                                                <a href="{{ route('trainer.edit', $trainer) }}" class="btn btn-primary active">Изменить</a>

                                                <a href="{{ route('trainer.show', $trainer) }}" class="btn btn-primary active">Просмотр</a>

                                                <form action="{{ route('trainer.destroy', $trainer->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger active">Удалить</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <p>Тренеров нет. <a href="{{ route('trainer.create') }}" class="btn btn-primary">Добавить тренера</a></p>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer justify-content-center text-center">
                        {{ $trainers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
