<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['agent_id', 'title', 'content', 'review'];

    /*
     * この投稿を所有するユーザ
    **/
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
