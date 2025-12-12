<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
       public function index(){
        $user = User::all();

        return view('user',compact('user'));
    }

    public function destroy($id){
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('user')->with('success','Data berhasil dihapus');
    }
}
