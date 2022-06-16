<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index(){
      $items = Item::all();

      return view('items.all', [
        'category' => request('category'),
        'producer' => request('producer'),
        'items' => $items
      ]);
    }

    public function show($id){
      $item = Item::findOrFail($id);
      return view('items.show', ['item' => $item]);
    }

    public function create(){
      return view('items.create');
    }

    public function add(){
      $item = new Item();
      $item->producer = request('producer');
      $item->name = request('name');
      $item->category = request('category');
      $item->save();

      error_log($item);

      return redirect('/item/'.$item->id)->with('msg', 'Success, you added item. Please wait for mod, whose are going to accept your item to database.');
    }

    public function destroy($id){
      $item = Item::findOrFail($id);
      $item->delete();

      return redirect('./items');
    }
}
