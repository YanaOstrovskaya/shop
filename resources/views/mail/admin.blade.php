<h1>New order {{$order->id}}</h1>
<p>
	Name: {{$order->name}} <br>
	Email: {{$order->email}} <br>
	Address: {{$order->address}} <br>
	Phone: {{$order->phone}} <br>
</p>
<hr>
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