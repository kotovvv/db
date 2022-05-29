<div class="product">
    <img src="{{ $product->image}}" class="img" alt="{{ $product->product_name}}" loading="lazy">
    <p class="name"> {{ $product->product_name}}</p>
    <p class="price">Цена: <span>{{ $product->price}} грн.</span></p>
    <x-shops message='' :product="$product" />
    @if (strpos($product->same,"',")> 0)
    <x-minmax :same="$product->same" />
    @endif
    <a href="{{ url('/p/'.$product->id)}}"></a>
</div>