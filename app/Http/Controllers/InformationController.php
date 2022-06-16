<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use Auth;

class InformationController extends Controller
{
  public function edit(){
    $informations = Information::firstOrCreate([
      'user_id' => Auth::id()
    ])->get();

    return view('user.edit', ['informations' => $informations]);
  }
}
