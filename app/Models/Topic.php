<?php

namespace App\Models;

use App\Models\Post;
use App\Traits\Orderable;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
	use Orderable;

	protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function posts()
    {
    	return $this->hasMany(Post::class);
    }
}
