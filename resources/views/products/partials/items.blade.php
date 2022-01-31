<div class="items">
    @each('products.partials.item', $products, 'product')
</div>

@if($products->lastPage() != 1)
    @include('shared.pagination', ['current' => $products->currentPage(), 'last' => $products->lastPage(), 'url' => route('home')])
@endif