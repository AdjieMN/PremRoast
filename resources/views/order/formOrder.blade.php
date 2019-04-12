@extends('master.dashboard')
@section('content')

@foreach($customer as $c)

@foreach($item as $p)
	<form action="/item/addOrder" method="post">
		{{ csrf_field() }}
        <input type="hidden" name="idItem" value="{{ $p->idItem }}"> <br/>
        <input type="hidden" name="hargaItem" value="{{ $p->harga }}"> <br/>
        <input type="hidden" name="idCustomer" value="{{ $c->idCustomer }}"> <br/>
        <div class="form-group">
            <label for="jumlah">Jumlah :</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" required="require">
        </div>
        <div class="form-group">
            <label for="idDetailShipment">Pengiriman :</label>
            <select name="idDetailShipment" class="form-control" required="require">
            @foreach($ship as $s)
            <option value="{{$s->idShiping}}">{{$s->namaShipping}} - Rp.{{$s->hargaShipping}}</option>
            @endforeach
            </select>
        </div>
        <input type="submit" value="Selanjutnya">
	</form>
    @endforeach
    @endforeach
	
 @endsection