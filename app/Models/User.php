<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostsModel;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
// class User extends Model
{

    use HasApiTokens, Notifiable;
    use HasFactory;

    protected $table = 'users';
    protected $fillable = ['user_id', 'name', 'email', 'password', 'id_user_roles'];
    protected $primaryKey = 'user_id';

    public function posts()
    {
        return $this->hasMany(PostsModel::class);
    }


    public static function fetchUserProfile($id)
    {
        $brng =  DB::table('users')
            ->where('users.user_id', $id)
            ->get();
        return $brng;
    }

    public static function fetchusers($id)
    {
        $brng =  DB::table('users')
            ->where('users.user_id', $id)
            ->first();
        return $brng;
    }
}
