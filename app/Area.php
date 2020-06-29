<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    /**
     * この地域を対応するエージェント
     */
    public function agent()
    {
        return $this->belongsToMany(Agent::class, 'agent_areas', 'area_id', 'agent_id')->withTimestamps();
    }
    
}
