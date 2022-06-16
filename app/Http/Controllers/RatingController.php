<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Auth;

class RatingController extends Controller
{
  public function add($item_id){
    $rating = new Rating();
    $rating->grade = request('grade');
    $rating->item_id = $item_id;
    $rating->user_id = Auth::id();
    if(!is_null(request('description'))) {
      $rating->description = request('description');
    } else {
      $rating->description = '';
    }
    $rating->save();

    error_log($rating);

    return redirect('/equipment/')->with('msg', 'Success, you added rating. Please wait for mod, whose are going to accept your rating to database.');
  }
}
