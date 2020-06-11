@extends('layouts.app')

@section('content')
    <div class="container children-show">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Просмотр анкет - {{ $children->full_name }} (ID - {{ $children->id }})</h5></div>

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
                                <tbody>
                                    <tr>
                                        <td><b>Дата записи</b></td>
                                        <td>{{ $children->recording_date }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>ФИО</b></td>
                                        <td>{{ $children->full_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Дата рождения</b></td>
                                        <td>{{ $children->birth_date }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Полных лет</b></td>
                                        <td>{{ $children->age }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Дата окончания действия справки</b></td>
                                        <td>{{ $children->certificate_date }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>ФИО родилей ребенка</b></td>
                                        <td>{{ $children->full_name_parents }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Телефон одного из родителей</b></td>
                                        <td>{{ $children->phone_number_parents }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Адрес</b></td>
                                        <td>{{ $children->address }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Сумма оплаты</b></td>
                                        <td>{{ $children->payment_summ }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Статус оплаты</b></td>
                                        <td>{{ $children->payment_status }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Тренер</b></td>
                                        <td>{{ $children->coach }}</td>
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