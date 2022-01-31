<div class="basket-rows" id="basket_rows_list">
    <div class="basket header_rows">
        <div class="basket--title">
            Название продукта
        </div>
        <div class="basket--bottom">
            <div class="basket--bottom--price">
                Цена
            </div>
            <div class="basket--bottom--buttons">

            </div>
        </div>
    </div>
    @each('basket.partials.item', $products, 'product')
</div>

@if($products->lastPage() != 1)
    @include('shared.pagination', ['current' => $products->currentPage(), 'last' => $products->lastPage(), 'url' => route('home')])
@endif