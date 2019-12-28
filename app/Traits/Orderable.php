<?php 

namespace App\Traits;

trait Orderable 
{
	public function scopeByDesc($query) 
	{
		return $query->orderBy('created_at', 'desc');
	}

	public function scopeByAsc($query)
	{
		return $query->orderBy('created_at', 'asc');
	}
}