<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PostsModel extends Model
{

    protected $table = 'posts';
    protected $fillable = ['id', 'title', 'body', 'user_id'];
    protected $primaryKey = 'id';

    // Definisikan hubungan many-to-one dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
