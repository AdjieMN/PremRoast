@extends('master.admin')
@section('content')

@foreach($detail as $d)
<table class="table table-bordered">
<tr>
<td><label>ID Order</label></td>
<td>
{{$d->idTransaksi}}
</td>
</tr>
<tr>
<td><label>Nama Customer</label></td>
<td>
{{$d->nama}}
</td>
</tr>
<tr>
<td><label>Alamat</label></td>
<td>
{{$d->alamat}}
</td>
</tr>
<tr>
<td><label>Nama Item</label></td>
<td>
{{$d->namaItem}}
</td>
</tr>
<tr>
<td><label>Jumlah Item</label></td>
<td>
{{$d->jumlah}}
</td>
</tr>
<tr>
<td><label>Harga Item</label></td>
<td>
Rp.{{$d->harga}}
</td>
</tr>
<tr>
<td><label>Total Harga</label></td>
<td>
Rp.{{$d->totalPrice}}
</td>
</tr>
</table>
@endforeach

@endsection