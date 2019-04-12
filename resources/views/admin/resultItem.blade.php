@extends('master.admin')
@section('content')

<div class="container">	

<table class="table table-condensed">
    <tr>
    <td><a class="btn btn-primary" href="/admin/tambah"> + Tambah Item</a></td>
    <form action="{{route('post.search/item')}}" method="get" class="sidebar-form">
    <td><input type="text" name="q" class="form-control" placeholder="cari nama Item..."></td>
    <td><input type="submit" class="btn btn-info" value="Cari">
    </form>
    </td>
</tr>					
</table>




</table>
	<table class="table table-hover">
    <tHead>
		<tr>
			<th>Nama</th>
			<th>Asal</th>
			<th>Profil</th>
			<th>Kategori</th>
			<th>Notes</th>
            <th>Harga</th>
            <th>gambar</th>
            <th>Status</th>
            <th>action</th>
        </tr>
</tHead>
        @foreach($item as $p)
        <tBody>
		<tr>
			<td>{{ $p->namaItem }}</td>
            <td>{{ $p->asal }}</td>
            <td>{{ $p->profil }}</td>
            <td>{{ $p->kategori }}</td>
            <td>{{ $p->deskripsi }}</td>
            <td>{{ $p->harga }}</td>
            <td>@if (!empty($p->gambar))
            <img src="{{ Storage::url($p->gambar) }}" alt="{{ $p->gambar }}" width="50px" height="50px">
            @else
                <img src="http://via.placeholder.com/50x50" alt="{{ $p->namaItem }}">
            @endif</td>
           <td>{{ $p->status }}</td>
			
			<td>
            <a class="btn btn-success" href="/admin/edit/{{ $p->idItem }}">Edit</a>
			<a class="btn btn-danger" href="/admin/hapus/{{ $p->idItem }}">Hapus</a>
				
			</td>
        </tr>
</tBody>
	
		@endforeach
	</table>
	{{ $item->links() }}
</div>
 @endsection