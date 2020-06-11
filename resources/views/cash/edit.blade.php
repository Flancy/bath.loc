@extends('layouts.app')

@section('content')
    <div class="container children-create">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Изменение платежки - (ID - {{ $cash->id }}</h5></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('partials.errors')
                        @include('partials.success')

                        <form class="form-row" method="POST" action="{{ route('cash.update', $cash->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="price">Сумма</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="price" id="price" value="{{ $cash->price }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">₽</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="type_price">Тип платежки</label>
                                    <select class="form-control" id="type_price" name="type_price">
                                        <option value="{{ CashConstants::TYPE_PRICE_NON_CASH }}"
                                            @if($cash->type_price === CashConstants::TYPE_PRICE_NON_CASH)
                                                selected="selected"
                                            @endif
                                            >{{ CashConstants::TYPE_PRICE_NON_CASH }}</option>
                                        <option value="{{ CashConstants::TYPE_PRICE_CASH }}"
                                            @if($cash->type_price === CashConstants::TYPE_PRICE_CASH)
                                                selected="selected"
                                            @endif
                                            >{{ CashConstants::TYPE_PRICE_CASH }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="status">Статус платежки</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="{{ CashConstants::STATUS_COMING }}"
                                            @if($cash->status === CashConstants::STATUS_COMING)
                                                selected="selected"
                                            @endif
                                            >{{ CashConstants::STATUS_COMING }}</option>
                                        <option value="{{ CashConstants::STATUS_EXPEND }}"
                                            @if($cash->status === CashConstants::STATUS_EXPEND)
                                                selected="selected"
                                            @endif
                                            >{{ CashConstants::STATUS_EXPEND }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary">Обновить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection