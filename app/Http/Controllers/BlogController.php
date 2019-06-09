<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
	public function index()
    {
    	// mengambil data dari table pegawai
    	$pegawai = DB::table('pegawai')->paginate(10);
 
    	// mengirim data pegawai ke view index
    	return view('index',['pegawai' => $pegawai]);
 
    }

    public function tambah()
    {
    	return view('tambah');
    }

    public function masuk(Request $request)
	{
		// insert data ke table pegawai
		DB::table('pegawai')->insert([
			'pegawai_nama' => $request->nama,
			'pegawai_jabatan' => $request->jabatan,
			'pegawai_umur' => $request->umur,
			'pegawai_alamat' => $request->alamat
		]);
		// alihkan halaman ke halaman pegawai
		return redirect('/blog');
	 
	}

		// method untuk edit data pegawai
	public function edit($id)
	{
		// mengambil data pegawai berdasarkan id yang dipilih
		$pegawai = DB::table('pegawai')->where('pegawai_id',$id)->get();
		// passing data pegawai yang didapat ke view edit.blade.php
		return view('edit',['pegawai' => $pegawai]);

	}

	public function hapus($id)
	{
		// mengambil data pegawai berdasarkan id yang dipilih
		$pegawai = DB::table('pegawai')->where('pegawai_id',$id)->delete();
		// passing data pegawai yang didapat ke view edit.blade.php
		return redirect('/blog');

	}

		// update data pegawai
	public function update(Request $request)
	{
		// update data pegawai
		DB::table('pegawai')->where('pegawai_id',$request->id)->update([
			'pegawai_nama' => $request->nama,
			'pegawai_jabatan' => $request->jabatan,
			'pegawai_umur' => $request->umur,
			'pegawai_alamat' => $request->alamat
		]);
		// alihkan halaman ke halaman pegawai
		return redirect('/blog');
	}

	public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$pegawai = DB::table('pegawai')
		->where('pegawai_nama','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('index',['pegawai' => $pegawai]);
 
	}
    
    public function home(){
		return view('home');
	}
 
	public function tentang(){
		return view('tentang');
	}
 
	public function kontak(){
		return view('kontak');
	}
}
