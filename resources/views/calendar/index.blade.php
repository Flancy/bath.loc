@extends('layouts.app')

@section('content')
    <div class="container children-index">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Календарь занятий</h5></div>

                    <div class="card-body">
                        <calendar></calendar>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
