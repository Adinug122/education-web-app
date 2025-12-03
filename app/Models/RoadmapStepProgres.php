<?php

namespace App\Models;

use App\Http\Controllers\UserController;
use Illuminate\Database\Eloquent\Model;

class RoadmapStepProgres extends Model
{
    protected $table = 'roadmap_step_progres';

    protected $id = 'id';
    protected $fillable = ['id','isCompleted','roadmap_steps_id','users_id'];

    function user(){
        $this->belongsTo(User::class);
    }

function roadmapStep(){
    $this->belongsTo(RoadmapStep::class);
}
}
