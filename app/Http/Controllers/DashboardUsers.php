<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PostsModel;

class DashboardUsers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email = session()->get('email');
        $posts = PostsModel::where('users.email', $email)->join('users', 'posts.user_id', '=', 'users.user_id')->count();
        return view('pages/users/dashboard', ['posts' => $posts]);
    }
}
