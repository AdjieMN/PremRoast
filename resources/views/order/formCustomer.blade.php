@extends('master.dashboard')
@section('content')

@foreach($item as $p)
	<form action="/item/addCustomer" method="post">
		{{ csrf_field() }}
        <input type="hidden" name="idItem" value="{{ $p->idItem }}"> <br/>
        <table class="table table-striped">
        <tr>
        <td>Nama</td>
        <td><input type="text" required="required" name="namaCustomer" class="form-control"></td>
        </tr>
        <tr>
        <td>Alamat</td> 
        <td><textarea required="required" name="alamatCustomer" class="form-control"></textarea></td>
        </tr>
        <tr>
		<td>E-mail</td> 
        <td><input type="email" required="required" name="emailCustomer" class="form-control"></td>
        </tr>
        </table>
        <input type="submit" value="Selanjutnya">
	</form>
    @endforeach

 @endsection