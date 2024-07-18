<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Auth extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/auth/login');
    }

    // public function forgot()
    // {  
    //     return view('pages/auth/lupa_password');
    // }

    // public function register()
    // {  
    // 	$kode = mahasiswaModel::kode();
    //     return view('pages/auth/register', ['kode'=>$kode]);
    // }

    // public function insertregister(Request $request){
    //     $validator = Validator::make($request->all(), [     
    // 		'username' => 'required|unique:users'
    // 	], [
    // 		'username.unique' => 'Username sudah terdaftar, silahkan masukkan username lain.'
    // 	]);
    // 	// Cek apakah validasi gagal
    // 	if ($validator->fails()) {
    // 		return redirect()->back()
    // 			->withErrors($validator)
    // 			->withInput();
    // 	}

    //     DB::table('mahasiswa')->insert([
    //         'ID_mahasiswa' => $request->id_mahasiswa,
    //         'Nama_mahasiswa' => $request->nama
    //     ]);
    //     DB::table('users')->insert([
    //         'ID_mahasiswa' => $request->id_mahasiswa,
    //         'Username' => $request->username,
    //         'Password' =>  bcrypt($request->input('password')),
    //         'ID_User_Roles' =>  $request->id_user_roles
    //     ]);

    // return redirect('/')->withSuccess('Data berhasil disimpan');
    // }

    // update data diskusi
    public function updatelupapassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();


        // Hash password
        $hashedPassword = Hash::make($request->password);

        if ($user) {
            // jika username ditemukan
            // update data users
            DB::table('users')->where('email', $request->email)->update([
                'password' =>  $hashedPassword,
                'id_user_roles' =>  2,
            ]);
            // alihkan halaman ke halaman lupa_password

            return redirect()->back()->with('success', 'Password berhasil diperbarui')->withInput()->with('register-form', true);
        } else {
            // jika username tidak ditemukan
            return redirect()->back()->withErrors(['email' => 'Email tidak ditemukan'])->withInput()->with('register-form', true);
        }
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     // Validasi input
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $user = User::where('email', $credentials['email'])->first();

    //     if ($user && Hash::check($credentials['password'], $user->password)) {
    //         $params = [
    //             'islogin' => true,
    //             'name' => $user->name,
    //             'email' => $user->email,
    //             'user_id' => $user->user_id,
    //             'id_user_roles' => $user->id_user_roles,
    //             // Tidak menyimpan password dalam session
    //         ];
    //         $request->session()->put($params);
    //         return redirect()->to('/admin/dashboard');
    //     } else {
    //         return redirect()->back()->with('error', 'Email atau password salah!');
    //     }
    // }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            $params = [
                'islogin' => true,
                'name' => $user->name,
                'email' => $user->email,
                'user_id' => $user->user_id,
                'id_user_roles' => $user->id_user_roles,
            ];
            $request->session()->put($params);

            if ($user->id_user_roles == 1) {
                return redirect()->to('/admin/dashboard');
            } elseif ($user->id_user_roles == 2) {
                return redirect()->to('/users/dashboard');
            } else {
                return redirect()->back()->with('error', 'Role tidak dikenali!');
            }
        } else {
            return redirect()->back()->with('error', 'Email atau password salah!');
        }
    }



    public function logout()
    {
        Session::forget('islogin');
        Session::forget('name');
        Session::forget('email');
        Session::forget('password');
        Session::forget('user_id');
        Session::forget('id_user_roles');
        Session::flush();
        return redirect()->to('/');
    }
}
