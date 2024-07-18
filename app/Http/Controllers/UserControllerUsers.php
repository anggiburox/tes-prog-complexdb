<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserControllerUsers extends Controller
{

    public function index()
    {
        $user     = User::paginate(10);
        return view('pages/users/user/index', ['user' => $user]);
    }

    public function tambah()
    {
        return view('pages/users/user/tambah', []);
    }


    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6',
        ], [
            'email.unique' => 'Email sudah terdaftar, silahkan masukkan Email lain.',
        ]);


        // Cek apakah validasi gagal
        if ($validator->fails()) {
            // Kembalikan respons JSON jika validasi gagal
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Hash password
        $hashedPassword = Hash::make($request->password);

        // Simpan data ke dalam tabel users
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
        ]);


        // Jika data berhasil disimpan, kembalikan response 201
        return response()->json([
            'status' => 'success',
            'message' => 'Data user berhasil ditambahkan',
            'user' => $user->only(['user_id', 'name', 'email', 'created_at', 'updated_at']),
        ], 201);
    }

    public function storeweb(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6',
        ], [
            'email.unique' => 'Email sudah terdaftar, silahkan masukkan Email lain.',
        ]);

        // Cek apakah validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Hash password
        $hashedPassword = Hash::make($request->password);

        // Simpan data ke dalam tabel users
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
        ]);

        // Jika data berhasil disimpan, kembalikan response 201
        return response()->json([
            'status' => 'success',
            'message' => 'Data user berhasil ditambahkan',
            'user' => $user->only(['user_id', 'name', 'email', 'created_at', 'updated_at']),
        ], 201);

        return redirect('/users/user/')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
    {
        // mengambil data pangkat berdasarkan id yang dipilih
        $users = DB::table('users')->where('user_id', $id)->get();
        // passing data pangkat yang didapat ke view edit.blade.php
        return view('pages/users/user/edit', ['users' => $users]);
    }

    public function detail($id)
    {
        // mengambil data pangkat berdasarkan id yang dipilih
        $users = DB::table('users')->where('user_id', $id)->get();
        // passing data pangkat yang didapat ke view edit.blade.php
        return view('pages/users/user/detail', ['users' => $users]);
    }

    public function update(Request $request)
    {

        $mhs = User::find($request->user_id);

        if ($mhs && $mhs->email != $request->email) {
            $validatedData = $request->validate([
                'email' => 'unique:users,email|unique:users,email',
            ], [
                'email.unique' => 'Email sudah terdaftar, silahkan masukkan Email lain.',
            ]);
        }

        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|unique:users,email',
        //     'password' => 'required|string|min:6',
        // ], [
        //     'email.unique' => 'Email sudah terdaftar, silahkan masukkan Email lain.',
        // ]);

        // // Cek apakah validasi gagal
        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        // Hash password
        $hashedPassword = Hash::make($request->password);

        // update data 
        DB::table('users')->where('user_id', $request->user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
        ]);
        // alihkan halaman ke halaman mitra_industri
        return redirect('/users/user')->withSuccess('Data berhasil diperbaharui');
    }


    public function hapus($id)
    {
        // menghapus data berdasarkan id yang dipilih
        DB::table('users')->where('user_id', $id)->delete();

        // alihkan halaman ke halaman binaan
        return redirect('/users/user')->withDanger('Data berhasil dihapus');
    }
}
