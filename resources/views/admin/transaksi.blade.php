@extends('master.admin')
@section('content')
<table class="table table-striped" >
		<thead>
		<tr>
			<th>ID Order</th>
			<th>ID Customer</th>
			<th>ID Item</th>
			<th>Order Date</th>
			<th>Price</th>
            <th>Status</th>
            <th>Action</th>
		</tr>
		</thead>
		@foreach($order as $p)
		<tbody>
		<tr>
			<td>{{ $p->idTransaksi }}</td>
            <td>{{ $p->idCustomer }}</td>
            <td>{{ $p->idItem }}</td>
            <td>{{ $p->deliveryDate }}</td>
            <td>Rp.{{ $p->totalPrice }}</td>
            <td>{{ $p->status }}</td>
			<td>
				<a class="btn btn-primary" href="/order/detail/{{ $p->idTransaksi }}">Detail</a>
				|
				<a class="btn btn-success" href="/order/confirm/{{ $p->idTransaksi }}">Confirm</a>
				|
				<a class="btn btn-danger" href="/order/delete/{{ $p->idTransaksi }}">Delete</a>
			</td>
		</tr>
		</tbody>
		@endforeach
	</table>
	{{ $order->links() }}
	</div>
 @endsection