<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\Rating;
use App\Models\Review;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $latest_user = User::latest('id')->first();
      $latest_item = Item::latest('id')->first();
      $latest_rating = Rating::latest('id')->first();
      $reviews = Review::all();

      return view('home', ['latest_user' => $latest_user, 'latest_item' => $latest_item, 'latest_rating' => $latest_rating, 'reviews' => $reviews]);
    }
}
