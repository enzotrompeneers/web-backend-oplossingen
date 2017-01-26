<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {
	protected $fillable = ['title', 'url', 'userID', 'username', 'points', 'amountComments'];

	public function user() {
		return $this->belongsTo('App\User');
	}
	public function comments() {
        return $this->hasMany('App\Comment',  'articleID');
    }
}
