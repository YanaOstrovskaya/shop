@extends('layouts.site')

@section('header')
	@include('site.header')
@endsection

@section('content')
@if(isset($portfolio) && is_object($portfolio))
					<div class="entry-content">
							<div class="row">
								<div class="col-sm-6 col-md-4">
									<div class="product-images">
										<figure class="large-image">
											{!! Html::image($portfolio->images) !!}
										</figure>
									</div>
								</div>
								<div class="col-sm-6 col-md-8">
									<h2 class="entry-title">{{ $portfolio->name }}</h2>
									<small class="price">{{ $portfolio->price }} $</small>
									<div>{!! $portfolio->description !!}</div><br>
								<a href="{{route('cart.edit', $portfolio->id)}}" class="btn btn-success add">Add to cart</a> <i class="fas fa-check-circle"  style="font-size:24px; color: green; visibility: hidden;"></i><br><br>
								<a href="/#Shop" class="btn btn-danger">Back to Shop</a>
								</div>

								
							</div>
						</div>
@endif
@endsection

@section('contact')
	@include('site.contact')
@endsection