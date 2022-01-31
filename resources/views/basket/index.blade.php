@extends('layouts.app', ['subtitle' => 'Список продуктов в корзине'])

@section('content')

    <div class="page_title">
        Список продуктов в корзине
    </div>

    @if ($products->count())
        @include('basket.partials.items')
    @else
        <div class="alert">
            Нет продуктов в корзине
        </div>
    @endif
@endsection
