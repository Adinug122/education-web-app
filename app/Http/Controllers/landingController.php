<?php

namespace App\Http\Controllers;

use App\Models\Roadmap;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class landingController extends Controller
{
       public function index()
    {
        $roadmaps = Roadmap::whereHas('prompt', function ($q) {
            $q->where('user_id', Auth::id());
        })->get();

        return view('welcome', compact('roadmaps'));
    }
}
