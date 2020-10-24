<?php

namespace App\Http\Controllers\Berita;

use App\kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class KategoriController extends Controller
{
	public function create(){
		$berita_category = kategori::orderBy('category')->get();
		$datas = array(
			'berita_category' => $berita_category,
            'no'        => 1
        );

		$data = array('title'   => 'category');
		return view('kategori.create',$data,$datas);
	}
	public function store(){
		Kategori::create([

            'category'      => request('category'),
        ]);

        $notification = array(
            'message' => 'Kategori Berhasil Ditambahkan!',
            'alert-type' => 'success'
        );

		return redirect(route('inkubator.kategori.create'))->with($notification);
	}
	public function edit(kategori $kategori)
	{
		$data = array(
			'title'       => 'Kategori',
			'kategori'     => $kategori
		);
		return view('kategori.edit',$data);
	}

	public function update(kategori $kategori)
	{
		$kategori->update([
            'category'      => request('category'),
        ]);

        $notification = array(
            'message' => 'Kategori Berhasil Diedit!',
            'alert-type' => 'success'
        );

		return redirect(route('inkubator.kategori.create'))->with($notification);
	}

	public function destroy(kategori $kategori){
    	$kategori->delete([
        ]);

        $notification = array(
            'message' => 'Kategori Berhasil Dihapus!',
            'alert-type' => 'error'
        );

        return redirect(route('inkubator.kategori.create'))->with($notification);
	}
}

