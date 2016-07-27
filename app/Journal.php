<?php

namespace Magnus;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Journal extends Model
{
    use SoftDeletes;

    protected $guarded = ['id','user_id'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function user()
    {
        return $this->belongsTo('Magnus\User');
    }

    public function comments()
    {
        return $this->morphMany('Magnus\Comment', 'commentable');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = substr(microtime(), 15).'-'.str_slug($value);;
    }
}
