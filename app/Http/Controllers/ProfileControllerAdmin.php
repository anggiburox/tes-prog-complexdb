<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileControllerAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil data dari table 
        $pgw = User::fetchUserProfile(session()->get('user_id'));
        // mengirim data ke view index
        return view('pages/admin/profile', ['pgw' => $pgw]);
    }

    public function editprofile(Request $request)
    {
        $user = User::find($request->user_id);

        if ($user) {
            $email_lama = $user->email;
            $validatedData = $request->validate([
                'email' => $email_lama == $request->email ? '' : 'unique:users,Email',
            ], [
                'email.unique' => 'Email sudah terdaftar, silahkan masukkan email lain.',
            ]);


            // Hash password
            $hashedPassword = Hash::make($request->password);

            DB::table('users')->where('user_id', $request->user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' =>  $hashedPassword
            ]);
            // alihkan halaman
            return redirect('/admin/profile')->withSuccess('Data berhasil diperbaharui');
        }
        return redirect()->back()->withErrors(['user_id' => 'User tidak ditemukan']);
    }
}
