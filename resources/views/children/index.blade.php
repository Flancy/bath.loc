@extends('layouts.app')

@section('content')
    <div class="container children-index">
        <div class="row justify-content-center">
            <div class="col-md-9">
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
                                    <th>ID</th>
                                    <th>Дата записи</th>
                                    <th>ФИО ребенка</th>
                                    <th>Возраст</th>
                                    <th>Тренер</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($childrens as $children)
                                    <tr>
                                        <td>{{ $rank++ }}</td>
                                        <td>{{ $children->recording_date }}</td>
                                        <td>
                                            <a href="{{ route('children.show', $children) }}">
                                                {{ $children->full_name }}
                                            </a>
                                        </td>
                                        <td>{{ $children->age }} лет</td>
                                        <td>
                                            <a href="{{ route('trainer.show', $children->trainer_id) }}">
                                                {{ $children->trainer->full_name }}
                                            </a>
                                        </td>
                                        <td class="td_last">
                                            <div class="button-group d-flex justify-content-between align-items-center">
                                                <a href="{{ route('children.edit', $children) }}" class="btn btn-sm btn-primary active">Изменить</a>

                                                <a href="{{ route('children.show', $children) }}" class="btn btn-sm btn-primary active">Просмотр</a>

                                                <form action="{{ route('children.destroy', $children->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-sm btn-danger active">Удалить</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <p>Анкет нет. <a href="{{ route('children.create') }}" class="btn btn-primary">Добавить анкету</a></p>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer justify-content-center text-center">
                        {{ $childrens->links() }}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5>Истекающие справки:</h5>
                    </div>
                    <div class="card-body">
                        @forelse ($childrens as $children)
                            @if(Carbon\Carbon::parse($children->certificate_date)->diffInDays(now()) < 7)
                                <div class="alert alert-info">
                                    У ребенка №{{ $children->id }} истекает справка <a href="{{ route('children.show', $children) }}" class="btn btn-sm btn-info active">Просмотр</a>
                                </>
                            @endif
                        @empty

                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
