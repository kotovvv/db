<div class="product">
    <div class="wrp_img">
        <img src="{{ $product->image}}" class="img" alt="{{ $product->product_name}}" loading="lazy">
        <p class="name"> {{ $product->product_name}}</p>
    </div>
    <div>
        <p class="price">Цена: <span>{{ $product->price}} грн.</span></p>
        <x-shops message='' :product="$product" />
        @if (strpos($product->same,"',")> 0)
        <x-minmax :same="$product->same" />
        @else
        <p class="empty">&nbsp;</p>
        @endif
    </div>
    <a href="{{ url('/p/'.$product->id)}}"></a>
</div>