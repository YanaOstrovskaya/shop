<h4>Your order:</h4>
	<table class="table modal-dialog">
		<thead>
			<tr>
				<th>Название</th>
				<th>Цена</th>
				<th>Количество</th>
				
			</tr>
		</thead>
		<tbody>
		@foreach(Cart::content() as $product)
			<tr>
				<td>{{$product->name}}</td>
				<td>{{$product->price * $product->qty}}</td>
				<td>{{$product->qty}}</td>
				
				
			</tr>
			@endforeach
			<tr>
				<td colspan="3">Total Sum: {{Cart::subtotal()}} $</td>
			</tr>
		</tbody>
	</table>
	<p>Thanks for your order.</p>
	<p>We will contact you soon.</p>
