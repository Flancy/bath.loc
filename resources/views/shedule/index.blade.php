@extends('layouts.app')

@section('content')
    <div class="container children-index">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Абонементы <a href="{{ route('shedule.create') }}" class="btn btn-primary">Добавить абонемент</a></h5></div>

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
                                    <th>ФИО ребенка</th>
                                    <th>ФИО тренера</th>
                                    <th>Дата окончания абонемена</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($shedulers as $shedule)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ route('children.show', $shedule->children) }}">
                                                {{ $shedule->children->full_name }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('trainer.show', $shedule->trainer) }}">
                                                {{ $shedule->trainer->full_name }}
                                            </a>
                                        </td>
                                        <td>{{ $shedule->end_date }}</td>
                                        <td class="td_last">
                                            <div class="button-group d-flex justify-content-between align-items-center">
                                                <a href="{{ route('shedule.edit', $shedule) }}" class="btn btn-primary active">Изменить</a>

                                                <a href="{{ route('shedule.show', $shedule) }}" class="btn btn-primary active">Просмотр</a>

                                                <form action="{{ route('shedule.destroy', $shedule->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger active">Удалить</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <p>Абонементов нет. <a href="{{ route('shedule.create') }}" class="btn btn-primary">Добавить абонемент</a></p>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer justify-content-center text-center">
                        {{ $shedulers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection