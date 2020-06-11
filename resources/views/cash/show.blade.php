@extends('layouts.app')

@section('content')
    <div class="container children-show">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Просмотр платежки - (ID - {{  $cash->id }})</h5></div>

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
                                        <td><b>Сумма</b></td>
                                        <td>{{ $cash->price }} ₽</td>
                                    </tr>
                                    <tr>
                                        <td><b>Тип</b></td>
                                        <td>
                                            @if($cash->type_price === CashConstants::TYPE_PRICE_NON_CASH)
                                                <span class="badge badge-secondary">{{ $cash->type_price }}</span>
                                            @else
                                                <span class="badge badge-dark">{{ $cash->type_price }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Статус</b></td>
                                        <td>
                                            @if($cash->status === CashConstants::STATUS_COMING)
                                                <span class="badge badge-success">{{ $cash->status }}</span>
                                            @else
                                                <span class="badge badge-danger">{{ $cash->status }}</span>
                                            @endif
                                        </td>
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