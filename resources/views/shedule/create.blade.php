@extends('layouts.app')

@section('content')
    <div class="container children-create">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Добавление нового абонемента</h5></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('partials.errors')
                        @include('partials.success')

                        <form class="form-row" method="POST" action="{{ route('shedule.store') }}">
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="children_id">Ребенок</label>
                                    <select class="form-control" id="children_id" name="children_id">
                                        @forelse($childrens as $children)
                                            <option value="{{ $children->id }}">{{ $children->full_name }}</option>
                                        @empty
                                            <option value="0">Сперва добавьте анкеты детей</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="trainer_id">Тренер</label>
                                    <select class="form-control" id="trainer_id" name="trainer_id">
                                        @forelse($trainers as $trainer)
                                            <option value="{{ $trainer->id }}">{{ $trainer->full_name }}</option>
                                        @empty
                                            <option value="0">Сперва добавьте тренеров</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="days">Дни абонемента</label>
                                    <input type="text" class="form-control date_shedule" id="days" name="days">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="pay">Оплата <span class="tooltip-form" data-toggle="tooltip" data-html="true" title="Пробное, разовое, на месяц, размер внесенной суммы">?</span></label>
                                    <input type="text" class="form-control" id="pay" name="pay" value="Пробное">
                                </div>
                            </div>
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary">Создать</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection