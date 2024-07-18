<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostsModel;
use App\Models\User;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Session;



class PostsController extends Controller
{

    public function index()
    {
        // $email = session()->get('email');
        $posts     = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.user_id')
            // ->where('users.email', $email)
            ->paginate(10);
        return view('pages/admin/posts/index', ['posts' => $posts]);
    }

    public function tambah()
    {
        $users = User::all();
        return view('pages/admin/posts/tambah', ['users' => $users]);


        //  // Ambil email dari sesi
        //  $email = Session::get('email');

        //  // Ambil data pengguna berdasarkan email
        //  $user = User::where('email', $email)->first();

        //  // Ambil semua pengguna (opsional, jika masih diperlukan)
        //  $users = User::all();

        //  return view('pages/admin/posts/tambah', [
        //      'currentUser' => $user,
        //      'users' => $users
        //  ]);

    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'user_id' => 'required|integer',
        ]);

        // Simpan data ke dalam tabel users
        $user = PostsModel::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user_id,
        ]);

        // Jika data berhasil disimpan, kembalikan response 201
        return response()->json([
            'status' => 'success',
            'message' => 'Data Posts berhasil ditambahkan',
            'user' => $user->only(['id', 'title', 'body', 'user_id', 'created_at', 'updated_at']),
        ], 201);
    }

    public function storeweb(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'user_id' => 'required|integer',
        ]);

        // Simpan data ke dalam tabel users
        $user = PostsModel::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user_id,
        ]);

        return redirect('/admin/posts/')->withSuccess('Data berhasil disimpan');
    }

    public function mengembalikan(Request $request)
    {

        $pgw = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.user_id')
            ->where('users.user_id',  $request->id)->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Data Berhasil diambil',
            'post' => $pgw,
        ], 201);
    }

    public function edit($id)
    {
        // mengambil data pangkat berdasarkan id yang dipilih
        $posts = DB::table('posts')->where('id', $id)->get();
        $users = User::all();
        // passing data pangkat yang didapat ke view edit.blade.php
        return view('pages/admin/posts/edit', ['posts' => $posts, 'users' => $users]);
    }

    public function detail($id)
    {
        // mengambil data pangkat berdasarkan id yang dipilih
        $posts = DB::table('posts')->where('id', $id)->get();
        $users = User::all();
        // passing data pangkat yang didapat ke view edit.blade.php
        return view('pages/admin/posts/detail', ['posts' => $posts, 'users' => $users]);
    }


    public function update(Request $request)
    {
        // update data 
        DB::table('posts')->where('id', $request->id)->update([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user_id,
        ]);
        // alihkan halaman ke halaman mitra_industri
        return redirect('/admin/posts')->withSuccess('Data berhasil diperbaharui');
    }

    public function mengembalikansemua(Request $request)
    {

        $pgw = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.user_id')
            ->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Data Berhasil diambil',
            'post' => $pgw,
        ], 201);
    }

    public function hapus(Request $request)
    {

        $pgw = DB::table('posts')->where('id', $request->id)->delete();

        if ($pgw == 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 201);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'Data Berhasil dihapus',
            ], 201);
        }
    }

    public function hapusdata($id)
    {
        // menghapus data  berdasarkan id yang dipilih
        DB::table('posts')->where('id', $id)->delete();

        // alihkan halaman ke halaman mitra_industri
        return redirect('/admin/posts')->withDanger('Data berhasil dihapus');
    }
}
