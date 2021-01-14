@extends('layouts.panel')

@section('content')

    <div id="page-wrapper">
        @include('partials.page-header', [
            'title' => trans('rooms.title'),
            'url' => route('rooms.index'),
            'search' => [
                'action' => route('rooms.search')
            ],
            'options' => [
                [
                    'option' => trans('common.options'),
                    'type' => 'dropdown',
                    'url' => [
                        [
                            'option' => 'Asignar',
                            'url' => '#'
                        ]
                    ]
                ],
                [
                    'option' => trans('common.back'),
                    'url' => url()->previous()
                ],
            ]
        ])

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-md-6">
                <h2>@lang('rooms.room') No. {{ $room->number }}</h2>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-md-6">
                <h2>@lang('common.price'):</h2>
                <p>{{ number_format($room->price, 2, ',', '.') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-md-6">
                <h3>@lang('common.description')</h3>
                <p>{{ $room->description }}</p>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-md-6">
                <h3>@lang('common.status')</h3>
                <p>@include('app.rooms.status', ['status' => $room->status])</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>@lang('assets.title')</h3>

                @include('partials.list', [
                    'data' => $room->assets,
                    'listHeading' => 'app.assets.list-heading',
                    'listRow' => 'app.assets.list-row',
                    'where' => null,
                ])
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>@lang('products.title')</h3>

                @include('partials.list', [
                    'data' => $room->assets,
                    'listHeading' => 'app.assets.list-heading',
                    'listRow' => 'app.assets.list-row',
                    'where' => null,
                ])
            </div>
        </div>

        @include('partials.modal-confirm')
    </div>

@endsection
