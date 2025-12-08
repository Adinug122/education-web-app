<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prompt extends Model
{


    protected $table = 'prompt';

    protected $primaryKey = 'id';
    protected $fillable = ['id','prompt_text','timestamp','user_id'];

    function user(){
        return $this->belongsTo(User::class);
    }    

 }
