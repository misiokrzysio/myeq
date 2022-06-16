<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Equipment;
use Auth;
use App\Models\Item;
use DB;

class EquipmentController extends Controller
{
  public function add($id){
    $equipment = new Equipment();
    $equipment->user()->associate(Auth::id());
    $equipment->item_id = $id;
    $equipment->state = 0;
    $equipment->save();

    error_log($equipment);

    return redirect('/items')->with('msg', 'Success, you added item.your item to database. to your equipment.');
  }

  public function my(){
    $equipment = Equipment::where('user_id', Auth::id())->get();
    error_log($equipment);
    return view('equipment.my', ['equipment' => $equipment]);
  }

  public function equip($id,$state){
    if($state == 1){
      $user_id = Auth::id();
      $checkOtherItems = Equipment::join('items', 'equipments.item_id', '=', 'items.id')->where([
        'equipments.user_id' => $user_id,
        'equipments.state' => 1,
        'items.category' => 'gsm'
      ]);
      if(!$checkOtherItems->exists()){
        Equipment::where('id', $id)->update(array('state' => $state));
        return redirect('./equipment');
      }
      else return redirect('./equipment')->with('msg', 'You have an item with this type on eq now.');
    } else {
      Equipment::where('id', $id)->update(array('state' => $state));
      return redirect('./equipment');
    }
  }
}
