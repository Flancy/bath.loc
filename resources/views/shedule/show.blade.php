@extends('layouts.app')

@section('content')
    <div class="container children-show">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Просмотр абонемента - {{ $shedule->children->full_name }} (ID - {{  $shedule->id }})</h5></div>

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
                                        <td><b>ФИО ребенка</b></td>
                                        <td>{{ $shedule->children->full_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>ФИО тренера</b></td>
                                        <td>{{ $shedule->trainer->full_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Даты записей</b></td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control date_shedule_disabled" id="days" name="days" value="{{ implode(',', $shedule->days) }}">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Оплата</b></td>
                                        <td>{{ $shedule->pay }}</td>
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