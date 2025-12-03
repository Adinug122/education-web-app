<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roadmap extends Model
{
      protected $table = 'roadmaps';

    protected $primaryKey = 'id';
    protected $fillable = ['id','title','estimasi','prompt_id'];

    function prompt(){

        return $this->belongsTo(Prompt::class);
    }

    function steps(){
        return $this->hasMany(RoadmapStep::class,'roadmap_id');
    }

}
