@extends('layouts.site')

@section('header')
	@include('site.header')
@endsection

@section('content')
<div class="container">
	<div class="row">


<table class="table table-hover">
	<thead>
		<tr>
			<th>Name</th>
			<th>qty</th>
			<th>Price</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($cartItems as $cartItem)
		<tr>
			<td>{{$cartItem->name}}</td>
			<td>
{!! Form::open(['route'=>['cart.update', $cartItem->rowId], 'method'=>'PUT']) !!}
<input name="qty" type="text" value="{{$cartItem->qty}}" style="width: 40px; text-align: center;">
<input type="submit" class="btn btn-sm btn-danger" value="Ok">
{!! Form::close() !!}
			</td>
			<td>{{$cartItem->price * $cartItem->qty}}</td>

		<td>
			<form action="{{route('cart.destroy', $cartItem->rowId)}}" method="POST">
				{{csrf_field()}}
				{{method_field('DELETE')}}
				<input type="submit" class="btn btn-danger" value="Delete">
			</form>
		</td>

		</tr>
		@endforeach
		<tr>
			<td></td>
			<td>Items: {{Cart::count()}}</td>
			<td>Total Sum: {{Cart::subtotal()}} $</td>
			<td></td>
		</tr>
	</tbody>
</table>
<br><br>
<a href="" id="checkout" class="input-btn">Checkout</a>
<br><br>
</div>
</div>
@endsection

@section('contact')
<footer class="footer_wrapper" id="contact">
  <div class="container">
    <section class="page_section contact" id="contact">   	
<div class="container formorder">
<div class="row">
<h3 style="color: white; font-weight: 100; text-align: center;">For the order fill out the data</h3><br>

	        <div class="col-lg-8 col-md-offset-2 wow fadeInLeft delay-06s">
@if(session('success'))
<div class="alert alert-success">
{{session('success')}}
</div>
@endif
@if (count($errors) > 0)
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
          <div class="form">
          	{!! Form::model($cartItems, ['action'=>'CheckoutController@complete']) !!}
            <input class="input-text" type="text" name="name" placeholder="Your Name *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
            <input class="input-text" type="text" name="email" placeholder="Your E-mail *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
             <input class="input-text" type="text" name="phone" placeholder="Your Phone *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
             <input class="input-text" type="text" name="address" placeholder="Your Adress *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
            <input class="input-btn" type="submit" value="Submit">
						{!! Form::close() !!}
          
          </div>
        </div>
      </div>
      </div>
          </section>
  </div>
  <div class="container">
    <div class="footer_bottom"><span>Copyright © 2018,    Template by <a href="http://webthemez.com">WebThemez.com</a>. </span> </div>
  </div>
</footer>
@endsection
