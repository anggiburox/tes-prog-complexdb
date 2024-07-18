<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserPostController extends Controller
{
    public function getUserPosts($id)
    {
        // Cari pengguna berdasarkan ID
        $user = User::find($id);

        // Jika pengguna tidak ditemukan
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
            ], 404);
        }

        // Ambil semua postingan milik pengguna
        $posts = $user->posts;

        // Jika pengguna tidak memiliki postingan
        if ($posts->isEmpty()) {
            return response()->json([
                'status' => 'success',
                'message' => 'No posts found for this user',
                'posts' => [],
            ], 200);
        }

        // Kembalikan response dengan data postingan
        return response()->json([
            'status' => 'success',
            'message' => 'Posts retrieved successfully',
            'posts' => $posts,
        ], 200);
    }
}
