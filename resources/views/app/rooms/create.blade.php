@extends('layouts.panel')

@section('breadcrumbs')
    {{ Breadcrumbs::render('rooms') }}
@endsection

@section('content')

    <div id="page-wrapper">
        @include('partials.page-header', [
            'title' => trans('rooms.title'),
            'url' => route('rooms.index'),
            'options' => [
                [
                    'option' => trans('common.back'),
                    'url' => url()->previous()
                ],
            ]
        ])

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2 class="text-center">@lang('common.creationOf') @lang('rooms.title')</h2>
                <form action="{{ route('rooms.store') }}" method="POST" id="room-form">
                    @csrf()

                    <div class="form-group{{ $errors->has('hotel') ? ' has-error' : '' }}">
                        <label for="hotel">Hotel:</label>
                        <select class="form-control selectpicker" title="{{ trans('hotels.choose') }}" name="hotel" id="hotel" required>
                            @foreach ($hotels as $hotel)
                                <option value="{{ id_encode($hotel->id) }}">{{ $hotel->business_name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('hotel'))
                            <span class="help-block">
                                <strong>{{ $errors->first('hotel') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('floor') ? ' has-error' : '' }}">
                        <label for="floor">@lang('common.floor'):</label>
                        <input type="number" class="form-control" name="floor" id="floor" value="{{ old('floor') }}" min="1" max="500" required>

                        @if ($errors->has('floor'))
                            <span class="help-block">
                                <strong>{{ $errors->first('floor') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                        <label for="number">@lang('common.number'):</label>
                        <input type="text" class="form-control" name="number" id="number" value="{{ old('number') }}" required>

                        @if ($errors->has('number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('number') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">@lang('common.description'):</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="4" maxlength="500" required>{{ old('description') }}</textarea>

                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('is_suite') ? ' has-error' : '' }}">
                        <label for="is_suite">@lang('rooms.type'):</label>
                        <select class="form-control selectpicker" title="{{ trans('rooms.type') }}" name="is_suite" id="is_suite" required>
                            <option value="0" selected>@lang('common.no')</option>
                            <option value="1">@lang('common.yes')</option>
                        </select>

                        @if ($errors->has('is_suite'))
                            <span class="help-block">
                                <strong>{{ $errors->first('is_suite') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="price">@lang('common.price'):</label>
                        <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}" min="1" max="999999" required>

                        @if ($errors->has('price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('min_price') ? ' has-error' : '' }}">
                        <label for="min_price">@lang('common.min_price'):</label>
                        <input type="number" class="form-control" name="min_price" id="min_price" value="{{ old('min_price') }}" min="1" max="999999" required>

                        @if ($errors->has('min_price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('min_price') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('capacity') ? ' has-error' : '' }}">
                        <label for="capacity">@lang('common.capacity'):</label>
                        <input type="number" class="form-control" name="capacity" id="capacity" value="{{ old('capacity') }}" min="1" max="12" placeholder="{{ trans('rooms.capacity') }}" required>

                        @if ($errors->has('capacity'))
                            <span class="help-block">
                                <strong>{{ $errors->first('capacity') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('tax_status') ? ' has-error' : '' }}">
                        <label for="pwd">@lang('common.tax.status'):</label>
                        <select class="form-control selectpicker" title="{{ trans('common.optional') }}" name="tax_status" id="tax_status">
                            <option value="0" selected>@lang('common.without.tax')</option>
                            <option value="1">@lang('common.with.tax')</option>
                        </select>

                        @if ($errors->has('tax_status'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tax_status') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('tax') ? ' has-error' : '' }}" style="display: none" id="tax-input">
                        <label for="tax">@lang('common.tax.title'):</label>
                        <input type="number" class="form-control" name="tax" id="tax" min="0.01" max="0.5" step="0.01">

                        @if ($errors->has('tax'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tax') }}</strong>
                            </span>
                        @endif
                    </div>

                    <button type="submit" id="room-store" class="btn btn-primary">
                        @lang('common.create')
                    </button>
                    <a href="{{ route('rooms.index') }}" class="btn btn-secondary">
                        @lang('common.back')
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection
