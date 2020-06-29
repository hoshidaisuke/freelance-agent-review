<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = ['name', 'fee_id', 'welfare', 'remote', 'site', 'highprice', 'margin'];

    /*
     * このエージェントが所有する単価
    **/
    public function Fee()
    {
        return $this->belongsTo(Fee::class);
    }
}
