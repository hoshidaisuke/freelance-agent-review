<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = ['content'];

    /*
     * このエージェントが所有する単価
    **/
    public function Agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
