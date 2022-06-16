<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Auth;
use DB;

class ReviewController extends Controller
{
  public function create(){
    return view('review.create');
  }

  public function all(){
    $reviews = Review::all();
    return view('review.all', ['reviews' => $reviews]);
  }

  public function my(){
    $reviews = Review::where('user_id', Auth::id())->get();
    return view('review.my', ['reviews' => $reviews]);
  }

  public function edit($review_id){
    error_log($review_id);
    Review::where('id', $review_id)->update(['text' => request('text')]);
    return redirect(route('reviews.my'))->with('msg', 'save');
  }

  public function add(){
    $review = new Review();
    $review->text = request('text');
    $review->user_id = Auth::id();
    $review->item_id = request('item_id');
    $review->state = 0;
    $review->save();

    error_log($review);

    return redirect(route('review.create'))->with('msg', 'Success, you added review. Please wait for mod, whose are going to accept your review to database.');
  }
}
