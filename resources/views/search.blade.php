@extends('master')

@section('content')
<div class="container">
  <p>По запросу: <b>{{$s}}</b> найдено {{ $hmfound }} </p>
</div>
<div class="wrp_products">
  @foreach ($products as $product)
  <x-product :product="$product" />
  @endforeach
</div>
@endsection