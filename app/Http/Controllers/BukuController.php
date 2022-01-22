<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request){
        $objek = \App\Buku::all();
        $data['objek'] = $objek;
        return view('buku_index',$data);
    }

    public function tambah()
    {
        $data['objek'] 		    =  new \App\Buku();
        $data['action'] 		= 'BukuController@simpan';
        $data['method'] 		= 'POST';
        $data['btn_submit'] 	= 'SIMPAN';
        return view('buku_form',$data);
    }

    public function simpan(Request $request)
    {
        $validasi = $this->validate($request,[
            'judul' => 'required',
            'pengarang' => 'required',
            ]);
        $objek = new \App\Buku();
        $objek->judul = $request->judul;
        $objek->pengarang = $request->pengarang;
        $objek->save();
        return redirect('admin/buku/index')->with('pesan', 'Data sudah disimpan!');
    }

    public function edit($id)
    {
        $data['objek'] 		    =  \App\Buku::findOrFail($id);
        $data['action'] 		= ['BukuController@update', $id];
        $data['method'] 		= 'PUT';
        $data['btn_submit'] 	= 'Update';
        return view('buku_form',$data);
    }

    public function update(Request $request, $id)
    {
        $validasi = $this->validate($request,[
            'judul' => 'required',
            'pengarang' => 'required',
            ]);
        $objek = \App\Buku::findOrFail($id);
        $objek->judul = $request->judul;
        $objek->pengarang = $request->pengarang;
        $objek->save();

        return redirect('admin/buku/index')->with('pesan', 'Data sudah di Update!');
    }

    public function hapus($id)
    {
        $Buku = \App\Buku::findOrFail($id);
        $Buku->delete();
        return redirect('admin/buku/index')->with('pesan', 	'Data sudah dihapus!');
    }

    // public function cari(Request $ambildata)
    // {
    //     $cari = $ambildata->get('search');
    //     $Buku = \App\Buku::all();
    //     $data['objek']= \App\Buku::join('kategoris','bukus.kategori_id','=','kategoris.id')
    //                                 ->join('penerbits','bukus.penerbit_id','=','penerbits.id')
    //                                 ->where('judul','LIKE','%'.$cari.'%')
    //                                 ->orwhere('namakat','LIKE','%'.$cari.'%')
    //                                 ->orwhere('namapen','LIKE','%'.$cari.'%')->paginate(5);
    //     return view('buku_index',$data);
    // }

    // public function detail($id)
    // {
    //     $buku = \App\Buku::findOrFail($id);
    //     $data['buku'] = $buku;
    //     return view('buku_detail',$data);
    // }

}
