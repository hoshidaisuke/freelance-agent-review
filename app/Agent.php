<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = ['name', 'fee_id', 'welfare', 'remote', 'site', 'highprice', 'margin'];

    /*
     * このエージェントが所有する単価
    **/
    public function fee()
    {
        return $this->belongsTo(Fee::class);
    }

    /**
     * このエージェントが対応する地域
     */
    public function area()
    {
        return $this->belongsToMany(Area::class, 'agent_areas', 'agent_id', 'area_id')->withTimestamps();
    }

    /**
     * このエージェントが所有する投稿
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
