<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
   public function index(){
      return view('profile.index');
   }

   public function create(){
      return view('profile.register');
   }

   public function store(Request $request){
     Profile::create([
        'name' => $request->get('name'),
        'user_id' => auth()->user()->id
     ]);

     return redirect('/meus-perfis');
   }

}

