@extends('master.admin')
@section('content')
<h2>Edit Item</h2>
	@foreach($item as $p)
	<form action="/admin/update" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="hidden" class="form-control" name="idItem" value="{{ $p->idItem }}"> <br/>
        <table class="table table-hover">
        <tr>
        <td>Nama</td>
        <td><input type="text" class="form-control" required="required" name="namaItem" value="{{ $p->namaItem }}"></td>
        </tr>
        <tr>
        <td>Asal</td>
        <td><input type="text" class="form-control" required="required" name="asal" value="{{ $p->asal }}"></td>  
         </tr>
        <tr>
        <td>Profil</td> 
        <td><select name="profil" required="require" class="form-control">
        @foreach($profil as $pro)
        <option value="{{ $pro->namaProfil }}"{{ ( $p->profil == $pro->namaProfil ) ? 'selected' : '' }}>{{$pro->namaProfil}}</option>
        @endforeach
        </select></td></tr>
        <tr>
        <td>Kategori</td>
        <td>
        <select name="kategori" required="require" class="form-control">
        @foreach($kategori as $kat)
        <option value="{{ $kat->namaKategori }}"{{ ( $p->idKategori == $kat->namaKategori ) ? 'selected': '' }} >{{$kat->namaKategori}}</option>
        @endforeach
        </select></td></tr>
        <tr>
		<td>Notes</td> 
        <td><textarea required="required" class="form-control" name="deskripsi">{{ $p->deskripsi }}</textarea></td>
       </tr>
        <tr>
		<td>Harga</td> 
        <td><input type="number" class="form-control" required="required" name="harga" value="{{ $p->harga }}"></td>
        </tr>
        <tr> 
		<td>Status</td> 
        <td>
        <select name="status" required="require" class="form-control">
        <option value="Ready"{{ ( $p->status == "Ready" ) ? 'selected': '' }} >Ready</option>
        <option value="Empty"{{ ( $p->status == "Empty" ) ? 'selected': '' }} >Empty</option>
        </select></td>
         </tr>
        <tr>
		<td>Gambar</td> 
        <td><img src="{{ Storage::url($p->gambar) }}" width="50px" height="50px">
        <input type="file" name="gambar" class="form-control"></td>
        </td></tr>
        <tr><td></td><td><input type="submit" value="Simpan Data" class="btn-success"></td></tr>
        </table>
	</form>
	@endforeach
 @endsection