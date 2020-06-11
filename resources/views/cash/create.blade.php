@extends('layouts.app')

@section('content')
    <div class="container children-create">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Добавление новой платежки</h5></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('partials.errors')
                        @include('partials.success')

                        <form class="form-row" method="POST" action="{{ route('cash.store') }}">
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="price">Сумма</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="price" id="price">
                                        <div class="input-group-append">
                                            <div class="input-group-text">₽</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="type_price">Тип платежки</label>
                                    <select class="form-control" id="type_price" name="type_price">
                                        <option value="{{ CashConstants::TYPE_PRICE_NON_CASH }}">{{ CashConstants::TYPE_PRICE_NON_CASH }}</option>
                                        <option value="{{ CashConstants::TYPE_PRICE_CASH }}">{{ CashConstants::TYPE_PRICE_CASH }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="status">Статус платежки</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="{{ CashConstants::STATUS_COMING }}">{{ CashConstants::STATUS_COMING }}</option>
                                        <option value="{{ CashConstants::STATUS_EXPEND }}">{{ CashConstants::STATUS_EXPEND }}</option>
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