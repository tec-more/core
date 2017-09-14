@extends('tuke-theme::front._master')

@section('content')
    <article>
        {!! $object->content or '' !!}
    </article>
@endsection
