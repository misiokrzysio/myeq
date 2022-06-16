<?php

namespace App\Http\Controllers;

use App\Models\Observation;
use Illuminate\Http\Request;
use Auth;

class ObservationController extends Controller
{
  public function add($id){
    $observation = new Observation();
    $observation->follower_id = Auth::id();
    $observation->watched_id = $id;
    $observation->save();

    error_log($observation);

    return back()->with('msg', 'Success, you follow this profile.');
  }

  public function destroy($id){
    $observation = Observation::where([
      'follower_id' => Auth::id(),
      'watched_id' => $id
    ]);
    $observation->delete();

    return back()->with('msg', 'Success, you unfollow this profile.');
  }

  public function show(){
    $observations = Observation::where('follower_id', Auth::id())->get();

    return view('profile.observations', ['observation' => $observations];
  }
}
