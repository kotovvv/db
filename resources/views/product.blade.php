@extends('master')

@section('content')
<div class="container">
  <div class="wrp_product">
    <img src="{{ $product->image}}" class="img" alt="{{ $product->product_name}}" loading="lazy">
    <div>
      <h1 class="name"> {{ $product->product_name}}</h1>
      <p class="price">Цена: <span>{{ $product->price}} грн.</span></p>
      <x-shops message="(Перейти в магазин)" :product="$product" />
      @if (strpos($product->same,"',")> 0)
      <x-minmax :same="$product->same" />
      @endif
    </div>
  </div>
</div>


@isset ($same_products)
<p class="text-center text-lg">Похожие продукты</p>
<div class="wrp_products">
  @foreach ($same_products as $product)
  <x-product :product="$product" />
  @endforeach
</div>
@endisset
@endsection
<style>
  .wrp_product {
    display: flex;
    grid-gap: 3rem
  }

  .wrp_product .img {
    max-height: 300px
  }
</style>