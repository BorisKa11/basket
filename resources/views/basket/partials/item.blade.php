<div class="basket basket_row_color" id="row_item_{{ $product->id }}">
    <div class="basket--title">
        {{ $product->product->getColumn('title') }}
    </div>
    <div class="basket--bottom">
        <div class="basket--bottom--price">
            {{ $product->product->priceFormat }} <span class="rub"></span>
        </div>
        <div class="basket--bottom--buttons">
            <a href="#" data-route="{{ route('basket.increment') }}"
               class="plus_basket count_basket" data-id="{{ $product->id }}" title="Добавить ещё">
            </a>
            <span class="count_product">{{ $product->getColumn('count') }}</span>
            <a href="#" data-route="{{ route('basket.decrement') }}"
               class="minus_basket count_basket" data-id="{{ $product->id }}" title="Убрать один">
            </a>
            <a href="#" data-route="{{ route('basket.remove') }}"
               class="remove_basket" data-id="{{ $product->id }}" title="Удалить из корзины">
            </a>
        </div>
    </div>
</div>