<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PostsModel;

class DashboardAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::count();
        $posts = PostsModel::count();
        return view('pages/admin/dashboard', ['users' => $users, 'posts' => $posts]);
    }
}
