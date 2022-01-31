<div class="item">
    <div class="item--title">
        {{ $product->getColumn('title') }}
    </div>
    <div class="item--description">
        {{ $product->shortDescription }}
    </div>
    <div class="item--bottom">
        <div class="item--bottom--price">
            {{ $product->priceFormat }} <span class="rub"></span>
        </div>
        <div class="item--bottom--basket">
            <a href="#" data-route="{{ route('basket.add') }}"
               class="add_basket" data-id="{{ $product->id }}" title="Добавить в корзину">
            </a>
        </div>
    </div>
</div>