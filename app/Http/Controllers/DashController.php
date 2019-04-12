<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelItem;
use App\ModelCustomer;
use App\ModelShip;
use App\ModelOrder;
use Illuminate\Support\Facades\Storage;

class DashController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }
    public function search(Request $request){
		$index = $request->get('q');
		$item = ModelItem::where('namaItem', 'LIKE', '%'.$index.'%')->paginate(7);
        return view('dashboard.result', compact('item'));
    }
    public function store(){
        $item = ModelItem::paginate(10);
        $data = ModelItem::first();
        $path = $data->gambar;
        $publicPath = \Storage::url($path);
        return view('dashboard.store',compact('item'));
    }
    public function order($idItem){
        $item =ModelItem::where('idItem',$idItem)->get();
	    return view('order.formCustomer',compact('item'));
    }
    public function addCustomer(Request $request){
        $idItem = $request->idItem;
        $namaCustomer = $request->get('namaCustomer');
        ModelCustomer::insert([
	    	'nama' => $request->namaCustomer,
	    	'alamat' => $request->alamatCustomer,
            'email' => $request->emailCustomer
        ]);
        
        $item = ModelItem::where('idItem',$idItem)->get();
        $customer = ModelCustomer::where('nama',$namaCustomer)
            ->orderBy('idCustomer','desc')
            ->take(1)
            ->get();
        $ship = ModelShip::all();
        return view('order.formOrder',compact('item','customer','ship'));
    }
    public function addOrder(Request $request){
        
        $idDetailShipment = $request->idDetailShipment;
        
        $j = $request->jumlah;
        $idItem = $request->idItem;
        $idDetailShipment = $request->idDetailShipment;
        $ldate = date('Y-m-d');
        $item = ModelItem::where('idItem',$idItem)->get();
        $ship = ModelShip::where('idShiping',$idDetailShipment)->first();
        $harga = $request->hargaItem;
        
        $h = $j*$harga;
        $hs = $ship->hargaShipping;
        $total = $hs + $h;
        $status = "Delay";
        ModelOrder::insert([
	    	'idCustomer' => $request->idCustomer,
	    	'idItem' => $request->idItem,
	    	'jumlah' => $request->jumlah,
            'price' => $harga,
            'idShiping' => $idDetailShipment,
            'deliveryDate' => $ldate,
            'totalPrice' => $total,
            'status' => $status
            ]);
	    return redirect('/dashboard');
    }
}
