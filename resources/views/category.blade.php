@extends('master')

@section('content')
<div class="container">
  <h1>{{$name}}</h1>
  <small> товаров {{ $hmfound }}</small>
</div>
<div class="wrp_products">
  @foreach ($cat_products as $product)
  <x-product :product="$product" />
  @endforeach
</div>
@endsection