<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports_tables';

  
    protected $fillable = [
        'user_id',
        'roadmap_resource_id',
        'alasan',
        'description',
        'status',     
    ];

    public function resource()
    {
        return $this->belongsTo(RoadmapResource::class, 'roadmap_resource_id');
    }

    // 2. Relasi ke User (Siapa yang melapor?)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
