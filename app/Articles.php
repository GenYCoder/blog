<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';

    protected $fillable = [
    	'title',
    	'content',
    	'user_id',
    	'published_at'
    ];

    public function scopePublished($query)
    {
    	$query->where('published_at','<',Carbon::now());
    }

    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>', Carbon::now());
    }


    public function setPublishedAtAttribute($date)
    {
    	$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    //note that if i use with the method it will give me hasmany object which will allow me
    //to continue chaining
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->toArray();
    }
}
