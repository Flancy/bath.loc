@extends('layouts.app')

@section('content')
    <div class="container children-create">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Добавление новой анкеты</h5></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('partials.errors')
                        @include('partials.success')

                        <form class="form-row" method="POST" action="{{ route('children.store') }}">
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="recording_date">Дата записи</label>
                                    <input type="date" class="form-control" id="recording_date" name="recording_date" value="2020-05-25">
                                </div>
                                <div class="form-group">
                                    <label for="full_name">ФИО</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" value="Test FIO">
                                </div>
                                <div class="form-group">
                                    <label for="birth_date">Дата рождения</label>
                                    <input type="date" class="form-control" id="birth_date" name="birth_date" value="2020-05-25">
                                </div>
                                <div class="form-group">
                                    <label for="age">Полных лет</label>
                                    <input type="number" class="form-control" id="age" name="age" value="24">
                                </div>
                                <div class="form-group">
                                    <label for="certificate_date">Дата окончания действия справки</label>
                                    <input type="date" class="form-control" id="certificate_date" name="certificate_date" value="2020-07-25">
                                </div>
                                <div class="form-group">
                                    <label for="full_name_parents">ФИО родилей ребенка <span class="tooltip-form" data-toggle="tooltip" data-html="true" title="В формате: <br><b>Отец: ФИО. Мать: ФИО">?</span></label>
                                    <textarea class="form-control" id="full_name_parents" name="full_name_parents">Мама: Kaya Haag. Папа: Lavinia Nienow</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone_number_parents">Телефон одного из родителей</label>
                                    <input type="phone" class="form-control" id="phone_number_parents" name="phone_number_parents" value="429-754-7329">
                                </div>
                                <div class="form-group">
                                    <label for="address">Адрес</label>
                                    <textarea class="form-control" id="address" name="address">Irvingchester 418 Letitia Flats</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="payment_summ">Сумма оплаты</label>
                                    <input type="number" class="form-control" id="payment_summ" name="payment_summ" value="1000">
                                </div>
                                <div class="form-group">
                                    <label for="payment_status">Статус оплаты</label>
                                    <select class="form-control" id="payment_status" name="payment_status">
                                        <option value="Оплата полностью" selected="selected">Оплата полностью</option>
                                        <option value="Оплата частично">Оплата частично</option>
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