@extends('tuke-core::admin._master')

@section('css')

@endsection

@section('js')

@endsection

@section('js-init')

@endsection

@section('content')
    <div class="layout-1columns">
        <div class="column main">
            <h2 class="headline">500</h2>
            <h3>{{ trans('tuke-core::errors.' . Constants::ERROR_CODE . '.title') }}</h3>
            <p>{{ trans('tuke-core::errors.' . Constants::ERROR_CODE . '.message') }}</p>
            <p>{{ $exception->getMessage() or '' }}</p>
        </div>
    </div>
@endsection
