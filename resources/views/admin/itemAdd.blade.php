@extends('master.admin')
@section('content')
<h2>Tambah Item</h2>
	<form action="/admin/store" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
		<input type="hidden" class="form-control" name="idItem" > <br/>
        <table class="table table-striped">
        <tr>
        <td>Nama</td>
        <td><input type="text" class="form-control" required="required" name="namaItem" ></td>
        </tr>
        <tr>
        <td>Asal</td>
        <td><input type="text" class="form-control" required="required" name="asal" ></td>  
         </tr>
        <tr>
        <td>Profil</td> 
        <td><select name="profil" required="require" class="form-control">
        @foreach($profil as $pro)
        <option value="{{ $pro->namaProfil }}">{{$pro->namaProfil}}</option>
        @endforeach
        </select></td></tr>
        <tr>
        <td>Kategori</td>
        <td>
        <select name="kategori" required="require" class="form-control">
        @foreach($kategori as $kat)
        <option value="{{ $kat->namaKategori }}">{{$kat->namaKategori}}</option>
        @endforeach
        </select></td></tr>
        <tr>
		<td>Notes</td> 
        <td><textarea required="required" class="form-control" name="deskripsi"></textarea></td>
       </tr>
        <tr>
		<td>Harga</td> 
        <td><input type="number" class="form-control" required="required" name="harga"></td>
        </tr> 
        <tr>
		<td>Gambar</td> 
        <td> 
            <input type="file" name="gambar" class="form-control"></td>
        
        </tr>
        <tr><td></td><td><input type="submit" value="Simpan Data" class="btn-success"></td></tr>
        </table>
	</form>
 @endsection