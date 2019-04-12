<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelItem;
use App\ModelKategori;
use App\ModelProfil;
use App\ModelOrder;
use File;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function index(){
        $item = ModelItem::paginate(10);
       
        $data = ModelItem::first();
        $path = $data->gambar;
        $publicPath = \Storage::url($path);
      //  dd($data);
        return view('admin.item',compact('item'));
    }
    public function search(Request $request){
		$index = $request->get('q');
		$item = ModelItem::where('namaItem', 'LIKE', '%'.$index.'%')->paginate(7);
        return view('admin.resultItem', compact('item'));
    }
    public function add(){
        $kategori = ModelKategori::all();
        $profil = ModelProfil::all();
	    return view('admin.itemAdd',compact('kategori','profil'));    
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'gambar' => 'nullable|file|max:2000'
        ]);
        $uploadedFile = $request->file('gambar');
        if(!empty($uploadedFile)){
            $path = $uploadedFile->store('public/storage/files');
        }
        
        $status = "Ready";
        
       
            ModelItem::insert([
                'namaItem' => $request->namaItem,
                'asal' => $request->asal,
                'profil' => $request->profil,
                'kategori' => $request->kategori,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'status' => $status,
                'asal' => $request->asal,
                'gambar' => $path
            ]); 
        
        return redirect('/item');
         
    }
   
    public function edit($idItem)
    {
        $no = 1;
        $nom = $no++;
        $item=ModelItem::where('idItem',$idItem)->get();
        $kategori = ModelKategori::get();
        $profil = ModelProfil::get();
        $data = ModelItem::first();
        $path = $data->gambar;
        $publicPath = \Storage::url($path);
	    return view('Admin.itemEdit',compact('item','kategori','profil','nom'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'gambar' => 'nullable|file|max:2000'
        ]);
        $uploadedFile = $request->file('gambar');
        
        if(!empty($uploadedFile)){
           
             $path = $uploadedFile->store('public/storage/files');
            ModelItem::where('idItem',$request->idItem)->update([
                'namaItem' => $request->namaItem,
                'asal' => $request->asal,
                'profil' => $request->profil,
                'kategori' => $request->kategori,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'status' => $request->status,
                'gambar' => $path
        ]);
        }else{
            ModelItem::where('idItem',$request->idItem)->update([
                'namaItem' => $request->namaItem,
                'asal' => $request->asal,
                'profil' => $request->profil,
                'kategori' => $request->kategori,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'status' => $request->status
        ]);
        }
       
	return redirect('/item');
    }
    public function delete($idItem)
    {
        $destroy = ModelItem::where('idItem',$idItem)->first();
        Storage::delete('$destroy->gambar');
	    ModelItem::where('idItem',$idItem)->delete();	
	    return redirect('/item');
    }
    public function transaksi(){
        $order = ModelOrder::paginate(10);
        return view('admin.transaksi',compact('order'));
    }
    public function detailTransaksi($idTransaksi){
        $detail = ModelItem::join('transaksi','item.idItem', '=', 'transaksi.idItem')
        ->join('customer','transaksi.idCustomer','=','customer.idCustomer')
        ->select('transaksi.*','item.harga','item.namaItem','customer.nama','customer.alamat')
        ->where('transaksi.idTransaksi',$idTransaksi)
        ->get();

        return view('admin.transaksiDetail',compact('detail'));
    }
    public function confirmTransaksi($idTransaksi){
        $status = "Delive";
        ModelOrder::where('idTransaksi',$idTransaksi)->update([
            'status' => $status
        ]);
        return redirect('/transaksi');
    }
    public function deleteTransaksi($idTransaksi){
        ModelOrder::where('idTransaksi',$idTransaksi)->delete();
        return redirect('/transaksi');
    }
}
