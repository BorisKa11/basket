@extends('layouts.app', ['subtitle' => 'Список продуктов'])

@section('content')

    <div class="page_title">
        Список продуктов
    </div>

    @if ($products->count())
        @include('products.partials.items')
    @else
        <div class="alert">
            Нет продуктов для отображения
        </div>
    @endif
@endsection
