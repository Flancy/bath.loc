@extends('layouts.app')

@section('content')
    <div class="container children-index">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3">
                    <h4>
                        <a href="#" class="btn btn-primary btn-cash-date">
                            Просмотр кассы на состояние -
                            <input id="cash_date" />
                        </a>
                    </h4>
                </div>

                <div class="card">
                    <div class="card-header"><h5>Касса <b>(состояние на {{ $cash_date }})</b> <a href="{{ route('cash.create') }}" class="btn btn-primary">Добавить платежку</a></h5></div>

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
                                    <th>Тип</th>
                                    <th>Статус</th>
                                    <th>Сумма</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($cashes as $cash)
                                    <tr>
                                        <td>{{ $cash->id }}</td>
                                        <td>
                                            @if($cash->type_price === CashConstants::TYPE_PRICE_NON_CASH)
                                                <span class="badge badge-secondary">{{ $cash->type_price }}</span>
                                            @else
                                                <span class="badge badge-dark">{{ $cash->type_price }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($cash->status === CashConstants::STATUS_COMING)
                                                <span class="badge badge-success">{{ $cash->status }}</span>

                                                @php
                                                    $coming += (int) $cash->price;
                                                    $total += (int) $cash->price;
                                                @endphp
                                            @else
                                                <span class="badge badge-danger">{{ $cash->status }}</span>

                                                @php
                                                    $expend += (int) $cash->price;
                                                    $total -= (int) $cash->price;
                                                @endphp
                                            @endif
                                        </td>
                                        <td>{{ $cash->price }} ₽</td>
                                        <td class="td_last">
                                            <div class="button-group d-flex justify-content-between align-items-center">
                                                <a href="{{ route('cash.edit', $cash) }}" class="btn btn-primary active">Изменить</a>

                                                <a href="{{ route('cash.show', $cash) }}" class="btn btn-primary active">Просмотр</a>

                                                <form action="{{ route('cash.destroy', $cash->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger active">Удалить</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <p>Платежек нет. <a href="{{ route('cash.create') }}" class="btn btn-primary">Добавить платежку</a></p>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer justify-content-center text-center">
                        {{ $cashes->links() }}
                    </div>

                    <div class="card-footer justify-content-start text-left">
                        <h5>Приход за {{ $cash_date }} - <span class="badge badge-success">+ {{ $coming }} ₽</span></h5>
                        <h5>Расход за {{ $cash_date }} - <span class="badge badge-danger">- {{ $expend }} ₽</span></h5>
                        <h4>Итого за {{ $cash_date }} - <span class="badge badge-info">{{ $total }} ₽</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
