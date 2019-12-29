<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
	protected $guarded = [];

	public function scopeByUserId($query, $id)
	{
		return $query->where('user_id', $id);
	}

    public function likeable() 
    {
    	return $this->morphTo();
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
