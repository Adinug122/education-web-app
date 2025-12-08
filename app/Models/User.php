<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\RoadmapStepProgres;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
  
public function completedSteps()
    {
        return $this->belongsToMany(
            RoadmapStep::class,    
            'roadmap_step_progres',  
            'users_id',              
            'roadmap_steps_id'       
        )
        ->withPivot('is_completed')  
        ->withTimestamps();          
    }
// Fungsi helper untuk cek status di Blade nanti
public function hasCompleted($stepId)
{
    return $this->completedSteps()->where('roadmap_steps_id', $stepId)->exists();
}
}
