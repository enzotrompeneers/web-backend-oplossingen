<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $fillable = [ // mass assigned, those the user can change
		'title',
		'url',
		'userID' // temp
	];

	public function user() {
		return $this->belongsTo('App\User');
	}
}
