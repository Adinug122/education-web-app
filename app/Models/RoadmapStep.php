<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoadmapStep extends Model
{
        protected $table = 'roadmap_steps';

    protected $primaryKey = 'id';
    protected $fillable = ['id','title','order_number','description','roadmap_id'];

      public function resources()
    {
        return $this->hasMany(RoadmapResource::class, 'roadmap_steps_id');
    }
    function roadmap(){
        return $this->belongsTo(Roadmap::class,'roadmap_id');
    }
}
