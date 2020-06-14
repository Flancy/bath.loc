@extends('layouts.app')

@section('content')
    <div class="container product-index">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Изменение анкеты - {{ $children->full_name }} (ID - {{ $children->id }})</h5></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('partials.errors')
                        @include('partials.success')

                        <form class="form-row" method="POST" action="{{ route('children.update', $children->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="recording_date">Дата записи</label>
                                    <input type="date" class="form-control" id="recording_date" name="recording_date" value="{{ $children->recording_date }}">
                                </div>
                                <div class="form-group">
                                    <label for="full_name">ФИО</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $children->full_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="birth_date">Дата рождения</label>
                                    <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $children->birth_date }}">
                                </div>
                                <div class="form-group">
                                    <label for="age">Полных лет</label>
                                    <input type="number" class="form-control" id="age" name="age" value="{{ $children->age }}">
                                </div>
                                <div class="form-group">
                                    <label for="certificate_date">Дата окончания действия справки</label>
                                    <input type="date" class="form-control" id="certificate_date" name="certificate_date" value="{{ $children->certificate_date }}">
                                </div>
                                <div class="form-group">
                                    <label for="full_name_parents">ФИО родителей ребенка <span class="tooltip-form" data-toggle="tooltip" data-html="true" title="В формате: <br><b>Отец: ФИО. Мать: ФИО">?</span></label>
                                    <textarea class="form-control" id="full_name_parents" name="full_name_parents" value="{{ $children->full_name_parents }}">{{ $children->full_name_parents }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone_number_parents">Телефон одного из родителей</label>
                                    <input type="phone" class="form-control" id="phone_number_parents" name="phone_number_parents" value="{{ $children->phone_number_parents }}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Адрес</label>
                                    <textarea class="form-control" id="address" name="address" value="{{ $children->address }}">{{ $children->address }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="trainer_id">Тренер</label>
                                    <select class="form-control" id="trainer_id" name="trainer_id">
                                        @forelse($trainers as $trainer)
                                            <option value="{{ $trainer->id }}"
                                                @if($trainer->id === $children->trainer_id)
                                                    selected="selected"
                                                @endif
                                                >{{ $trainer->full_name }}</option>
                                        @empty
                                            <option value="0">Сперва добавьте тренеров</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary">Обновить анкету</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
