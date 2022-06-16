<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\User;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Observation;
use Auth;

class UserController extends Controller
{
  public function myProfile(){
    $equipment = Equipment::where([
      'user_id' => Auth::id(),
      'state' => 1
      ])->get();
    return view('user.myprofile', ['equipment' => $equipment]);
  }

  public function profile($id){
    $equipment = Equipment::where([
      'user_id' => $id,
      'state' => 1
      ])->get();
    $user = User::where('id', $id)->first();
    $ratings = Rating::where('user_id', $id)->paginate(5);
    $reviews = Rating::where('user_id', $id)->get();
    $observations = Observation::where('watched_id', $id)->get();
    return view('user.profile', ['equipment' => $equipment, 'user' => $user, 'ratings' => $ratings, 'reviews' => $reviews, 'observations' => $observations]);
  }
}
