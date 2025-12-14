<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
       public function index(Request $request){
        $search = $request->input('search');
        $user = User::when($search,function($query) use ($search){
            $query->where('name','like','%'. $search .'%');
        })->get();
        return view('user',compact('user'));
    }

    public function destroy($id){
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('user')->with('success','Data berhasil dihapus');
    }
}
