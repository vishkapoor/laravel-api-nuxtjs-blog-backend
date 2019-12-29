<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Topic;
use App\Traits\Orderable;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	use Orderable;
	
    protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function topic()
    {
    	return $this->belongsTo(Topic::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
