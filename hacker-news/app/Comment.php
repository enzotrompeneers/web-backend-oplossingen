<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [ // mass assigned, those the user can change
		'comment',
	];

	public function article() {
		return $this->belongsTo('App\Article');
	}
}
