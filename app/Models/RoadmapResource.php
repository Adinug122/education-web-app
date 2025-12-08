<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoadmapResource extends Model
{
    protected $table = 'roadmap_resource';

    protected $primaryKey = 'id';
    protected $fillable = ['id','title','url','type','roadmap_steps_id'];

    function step(){
        return $this->belongsTo(RoadmapStep::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class, 'roadmap_resource_id');
    }
}
